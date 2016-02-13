<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  function index()
  {

    $this->load->model("StockModel");
    $this->load->model("PortfolioModel");
    $stockQuery = $this->StockModel->getAllStock();
    $playerQuery = $this->PortfolioModel->getAllPortfolio();

    $stockList = array();
    foreach($stockQuery->result() as $row){
            $stockList[] = $row;
    }
    
    $playerList = array();
    foreach($playerQuery->result() as $row){
            $playerList[] = $row;
    }
    
    $this->data['stockList'] = $stockList;
    $this->data['playerList'] = $playerList;
  }

}