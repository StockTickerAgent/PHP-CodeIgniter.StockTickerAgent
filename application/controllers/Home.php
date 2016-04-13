<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  //grab data from model and pass to view
  function index()
  {
    $this->load->model("StockModel");
    $this->load->model("PortfolioModel");
    $this->load->model("UsersModel");
    $stockQuery = $this->StockModel->getAllStock();
    $playerQuery = $this->PortfolioModel->getAllPortfolio();
    $userQuery = $this->UsersModel->getUsers();

    $stockList = array();
    foreach ($stockQuery->result() as $row) {
      $stockList[] = $row;
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
