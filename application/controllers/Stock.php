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
        
        $this->data['stockList'] = $stockListResult;
        $this->data['pagebody'] = 'Stock_All';
        $this->render();
    }     
    
    public function getSpecificStock(){
        $this->load->model("StockModel");
        
        $stock = $this->input->post('stockChoice');
        
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
        
        $this->data['stockMovements'] = $stockMovements;
        $this->data['stockTrans'] = $stockTrans;
        $this->data['pagebody'] = 'Stock_Single';
        $this->render();
        
    }    
            
        

}
