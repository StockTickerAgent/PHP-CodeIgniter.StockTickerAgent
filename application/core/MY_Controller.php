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
    }

    /**
     * Render this page
     */
    function render()
    {
        // Load header and footer templates into base
        $this->data['header'] = $this->parser->parse('base/_header', $this->data, true);
        $this->data['footer'] = $this->parser->parse('base/_footer', $this->data, true);

        // Load pagebody view into base template
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;

        $this->parser->parse('base/_template', $this->data);
    }

}
