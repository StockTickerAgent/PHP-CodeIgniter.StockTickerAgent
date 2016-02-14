<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

	public function index()
	{
        $this->load->model("StockModel");
        
        $stockList = $this->StockModel->getAllStock();
         foreach($stockList->result() as $row){
            $stockListResult[] = $row;
        }
        $stockRecent = $this->StockModel->getRecentMovement();
        foreach ($stockRecent->result() as $row) {
          $stockRecentResult[] = $row;
        }

        $row = $stockRecentResult[count($stockRecentResult) - 1];
        $this->getSpecificPortfolio($row->Code);
  } 	    
    
    public function getSpecificPortfolio($stock){
        $this->load->model("StockModel");
        
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
        
        $this->data['title'] = $stock;
        $this->data['stockMovements'] = $stockMovements;
        $this->data['stockTrans'] = $stockTrans;
        $this->data['stockList'] = $stockListResult;
        $this->data['pagebody'] = 'Stock_Single';
        $this->render();      
    }

  public function formSpecificStock()
  {
    $stock = $this->input->get('stockChoice');
    redirect("stocks/$stock");
  }


}
