<?php

class StockModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //grab all stock information from database
    public function getAllStock($url)
    {
       /*$this->db->select('*');
       $query = $this->db->get('stocks');
       return $query;*/
    }

    //grab specific stock info from database
   public function getSpecificStockMovements($stock)
   {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('stocks');
        $this->db->join('movements','movements.Code = stocks.Code');
        $this->db->where('stocks.Name', $stock);
        $query = $this->db->get();
        return $query;
   }

   //grab specific stock transaction info from database
   public function getSpecificStockTrans($stock)
   {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('stocks');
        $this->db->join('transactions','transactions.Stock = stocks.Code');
        $this->db->where('stocks.Name', $stock);
        $query = $this->db->get();
        return $query;
   }

   //grab transaction info from database
   public function totalMovementAmount($stock)
   {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('movements');
        $this->db->where('movements.Code', $stock);
        $query = $this->db->get();
        return $query;
   }

    //grab recent transcation info from database
    public function getRecentMovement()
    {
         $this->load->database();
         $this->db->select('*');
         $this->db->from('movements');
         $query = $this->db->get();
         return $query;
    }

   //validate stock with database
   function isValid($stock)
   {
        $listStock = $this->getAllStock();
        foreach($listStock->result() as $row)
        {
            if($row->Name == $stock || $row->Code == $stock)
            {
              return true;
            }
        }
        return false;
   }
}