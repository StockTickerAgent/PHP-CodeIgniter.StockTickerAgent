<?php
class GameModel extends CI_Model
{

    public $team = 'S34';
    public $name = 'Kool-Kids';
    public $password = 'tuesday';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // Checks the BSX server status
    // Returns false is something goes wrong, or array if it succeeds
    function getServerStatus()
    {
      if (($response_xml_data = file_get_contents('http://bsx.jlparry.com/status'))===false){
          // Darn... server error
          return false;
      } else {
         $data = simplexml_load_string($response_xml_data);
         if (!$data) {
             echo "Error loading XML\n";
             foreach(libxml_get_errors() as $error) {
                 echo "\t", $error->message;
             }
         } else {
            return $data;
         }
      }
      return false;
    }

    // Returns the highest round that the agent has participated in
    function getCurrentRound() {
        $this->db->select('round, token');
        $this->db->select_max('round');
        $query = $this->db->get('rounds');

        $data = $query->result()[0];
        $result = array(
            'round' => $data->round,
            'token' => $data->token
            );
        return $result;
    }

    // Updates the database with the current round data returned from the BSX
    function updateRound($team, $round, $token){
        $data = array(
            'team'      => $team ,
            'round'     => $round ,
            'token'     => $token ,
        );

        $this->db->insert('rounds', $data);
    }

    // Sends a POST request to the BSX server to try and register agent
    function registerAgent() {
        $url = 'http://bsx.jlparry.com/register';
        $data = array(
            'team' => $this->team,
            'name' => $this->name,
            'password' => $this->password
        );

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
            return false;
        }

        // Convert XML response to a simpleXML object
        $data = simplexml_load_string($result);
        if (!$data) {
            echo "Error loading XML\n";
            foreach(libxml_get_errors() as $error) {
                echo "\t", $error->message;
            }
            return false;
        }
        return $data;
    }

    function buyStock($code,$quantity,$token){
        $this->load->library('session');
        $buyRequest = array(
            'team' => $this->team,
            'token'=> $token,
            'player'=>$this->session->userdata('username'),
            'stock' => $code,
            'quantity'=>$quantity
        );
        $response = $this->sendPost(BSX.'buy',$buyRequest);
        $receive = simplexml_load_string($response);
        $this->UserModel->addHolding($receive);
    }

    private function sendPost($url, $fields){
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL,$url);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($handle);
        curl_close ($handle);
        return $response;
    }
}