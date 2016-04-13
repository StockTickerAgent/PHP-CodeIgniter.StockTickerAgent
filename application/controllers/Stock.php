<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

    //load data from model and display all detail
	public function index()
	{
    $stockUrl = "http://bsx.jlparry.com/data/stocks";
    $movementUrl = "http://bsx.jlparry.com/data/movement";
    $stockData = $this->parseURL($stockUrl);
    $movementData = $this->parseURL($movementUrl);
    $this->load->model("StockModel");

    $stockList = $this->StockModel->getAllStock($stockData);
    foreach($stockList as $row)
    {
      $stockListResult[] = $row;
    }
    $stockRecent = $this->StockModel->getRecentMovement($movementData);
    foreach ($stockRecent as $row)
    {
      $stockRecentResult[] = $row;
    }
    //$row = $stockRecentResult[count($stockRecentResult) - 1];
    //$this->getSpecificPortfolio($row->Code);
  }

  //get specific data for a certain player
  public function getSpecificPortfolio($stock)
  {
    $this->load->model("StockModel");

    $result = $this->checkValid("stock",$stock);
    if(!$result){
      $this->output->set_status_header('404'); // setting header to 404
      $this->data['pagebody'] = 'Error_404';
      $this->render();
    } else {
      $query = $this->StockModel->getSpecificStockMovements($stock);

      $stockMovements = array();
      foreach($query->result() as $row){
        $stockMovements[] = $row;
      }

      $query = $this->StockModel->getSpecificStockTrans($stock);
      $stockTrans = array();
      foreach($query->result() as $row){
        $stockTrans[] = $row;
      }

      $stockList = $this->StockModel->getAllStock();
      foreach($stockList->result() as $row){
        $stockListResult[] = $row;
      }

      $this->data['pagetitle'] = $stock . ' - ' . $this->data['pagetitle'];
      $this->data['title'] = $stock;
      $this->data['stockMovements'] = $stockMovements;
      $this->data['stockTrans'] = $stockTrans;
      $this->data['stockList'] = $stockListResult;
      $this->data['pagebody'] = 'Stock_Single';
      $this->render();
    }
  }

  //get stockChoice from the form
  public function formSpecificStock()
  {
    $stock = $this->input->get('stockChoice');
    redirect("stocks/$stock");
  }
}
