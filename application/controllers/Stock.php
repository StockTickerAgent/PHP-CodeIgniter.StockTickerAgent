<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

    //load data from model and display all detail
    public function index()
	{
        $this->load->model("StockModel");
        $stockList = $this->StockModel->getAllStocks();
        $this->data['pagebody'] = 'Stock_All';
        $this->data['stockList'] = $stockList;
        $this->render();
    }

  //get specific data for a certain player
  public function getSpecificStock($stock)
  {
      $this->load->model("StockModel");
      $stockInfo = $this->StockModel->getStock($stock);
      $movementList = $this->StockModel->getMovementStock($stock);
      $this->data['pagetitle'] = $stockInfo["Name"] . ' - ' . $this->data['pagetitle'];
      $this->data['title'] = $stockInfo["Name"];
      $this->data['stockMovements'] = $movementList;
      $this->data['pagebody'] = 'Stock_Single';
      $this->render();
  }

  //get stockChoice from the form
  function formSpecificStock()
  {
    $stock = $this->input->get('stockChoice');
    redirect("stocks/$stock");
  }
}
