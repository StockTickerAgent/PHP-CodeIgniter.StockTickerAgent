<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  //grab data from model and pass to view
  function index()
  {
      /*
    if (!$this->isBsxRunning()) {
      return;
    }
    */
    $this->load->model("StockModel");
    $this->load->model("PortfolioModel");
    $this->load->model("UsersModel");
    
    $playerQuery = $this->PortfolioModel->getAllPortfolio();
    $userQuery = $this->UsersModel->getUsers();
     
    $stockList = $this->StockModel->getAllStocks();  
    $movementsList = $this->StockModel->getRecentMovements();
    $transactionList = $this->StockModel->getRecentTransaction();

    $playerList = array();
    foreach ($playerQuery->result() as $playerRow) {
        foreach($userQuery->result() as $userRow){
            if($userRow->Player == $playerRow->Player){
                $playerRow->Avatar = $userRow->avatar;
                $playerRow->Id = $userRow->id;
                $playerList[] = $playerRow;
                break;
            }
        }
    }
    
    $this->data['pagetitle'] = 'Welcome to the Stocks Game';
    $this->data['stockList'] = $stockList;
    $this->data['playerList'] = $playerList;
    $this->data['movementsList'] = $movementsList;
    $this->data['transactionList'] = $transactionList;
    $this->data['pagebody'] = 'Home';

    $this->render();
  }
}
