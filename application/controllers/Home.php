<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  //grab data from model and pass to view
  function index()
  {
      
    if (!$this->isBsxRunning()) {
      return;
    }
    
    $this->load->model("StockModel");
    $this->load->model("PortfolioModel");
    $this->load->model("UsersModel");
    
    $stockQuery = $this->StockModel->getAllStock();
    $stockData = $this->parseURL("http://bsx.jlparry.com/data/stocks");
    
    $playerQuery = $this->PortfolioModel->getAllPortfolio();
    $userQuery = $this->UsersModel->getUsers();

    
    $stockList = array();
    for($i = 1; $i < count($stockData); $i++){
        $stockInfo = array();
        
        $stockInfo["Name"] = $stockData[$i][1];
        $stockInfo["Value"] = $stockData[$i][3];
        
        array_push($stockList,$stockInfo);
    }    


    $playerList = array();
    foreach ($playerQuery->result() as $playerRow) {
        foreach($userQuery->result() as $userRow){
            if($userRow->Player == $playerRow->Player){
                $playerRow->Avatar = $userRow->avatar;
                $playerList[] = $playerRow;
                break;
            }
        }
    }

    $this->data['pagetitle'] = 'Welcome to the Stocks Game';
    $this->data['stockList'] = $stockList;
    $this->data['playerList'] = $playerList;
    $this->data['pagebody'] = 'Home';



    $this->render();
  }
}
