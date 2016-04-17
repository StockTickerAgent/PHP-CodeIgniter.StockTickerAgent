<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class MY_Controller extends CI_Controller {

    protected $data = array();    // parameters for view components
    protected $id;                // identifier for our content

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model("PortfolioModel");

        $playerList = $this->PortfolioModel->getAllPortfolio();

        $playerListResult = array();
        foreach($playerList->result() as $row){
            $playerListResult[] = $row;
        }

        $this->data = array();
        $this->data['pagetitle'] = 'Stocks Game';
        $this->data['playerList'] = $playerListResult;

        // Send the user session
        $session_id = $this->session->userdata('playername');

        if ($session_id) {
            $this->data['username'] = $session_id;
        }
    }

    /**
     * Render this page
     */
    function render()
    {
        // Load the header authentication section
        if (isset($this->data['username'])) {
            $this->data["id"] = $this->session->userdata('id');
            if($this->session->userdata('role') == "guest"){
                $this->data['authenticate'] = $this->parser->parse('base/_header-guest', $this->data, true);
            } else if($this->session->userdata('role') == "admin"){
                $this->data['authenticate'] = $this->parser->parse('base/_header-admin', $this->data, true);
            }
        } else {
            $this->data['authenticate'] = $this->parser->parse('base/_header-annoymous', $this->data, true);
        }

        // Load header and footer templates into base
        $this->updateBsxStatus();
        $this->data['gameStatus'] = $this->parser->parse('base/_gamestatus', $this->data['bsxData'], true);
        $this->data['header'] = $this->parser->parse('base/_header', $this->data, true);
        $this->data['footer'] = $this->parser->parse('base/_footer', $this->data, true);

        // Load pagebody view into base template
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;

        //echo $this->session->userdata('id');


        $this->parser->parse('base/_template', $this->data);
    }

    //validate input
    function checkValid($temp_model,$item)
    {
      $model = "";

      if($temp_model == "stock")
      {
        $model = "StockModel";
      } else {
        $model = "PortfolioModel";
      }

      $this->load->model($model);
      $valid = $this->$model->isValidId($item);

      return $valid;
    }

    // Used to check if we can render a game view
    // Returns true if we can render a game view, false if we need to display an error page
    function updateBsxStatus()
    {
      $data = $this->GameModel->getServerStatus();
      if ($data) {
        $this->parseServerStatus($data);
        $this->data['bsxData'] = $data;
      }
    }

    // Displays BSX server status
    // Returns true if there is a round currently in progress on BSX
    function parseServerStatus($data)
    {
      $statusType = array();
      switch($data->state) {
        case 0:
        case 4:
          $data->addChild('statusType', 'danger');
          break;
        case 1:
        case 2:
          $data->addChild('statusType', 'warning');
          break;
        default:
          $data->addChild('statusType', 'info');
          break;
      }

      // Make sure we're registered for the round
      if ($data->state == 2 || $data->state == 3) {
        $storedRound = $this->GameModel->getCurrentRound()['round'];

        // Only update the database if we haven't already registered
        if ($storedRound != $data->round) {
          $registration = $this->GameModel->registerAgent();

          if ($registration && $registration->team != null) {
            $this->GameModel->updateRound($registration->team, $data->round, $registration->token);
          }
        }
      }
    }

    public function parseURL($url)
    {
        $test = array();
        $row = 1;
        if (($handle = fopen($url, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                //echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                $test2 = array();
                for ($c=0; $c < $num; $c++) {
                    //echo $data[$c] . "<br />\n";
                    $test2[] = $data[$c];
                }
                $test[] = $test2;
            }
            fclose($handle);
        }
        return $test;
    }

    function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 15; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
