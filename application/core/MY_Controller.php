<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class MY_Controller extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;      // identifier for our content

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
            if($this->session->userdata('role') == "guest"){
                $this->data['authenticate'] = $this->parser->parse('base/_header-guest', $this->data, true);
            } else if($this->session->userdata('role') == "admin"){
                $this->data['authenticate'] = $this->parser->parse('base/_header-admin', $this->data, true);
            }
        } else {
            $this->data['authenticate'] = $this->parser->parse('base/_header-annoymous', $this->data, true);
        }

        // Load header and footer templates into base
        $this->data['header'] = $this->parser->parse('base/_header', $this->data, true);
        $this->data['footer'] = $this->parser->parse('base/_footer', $this->data, true);

        // Load pagebody view into base template
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;

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
      $valid = $this->$model->isValid($item);
      
      return $valid;
    }
    
    function error404()
    {
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
