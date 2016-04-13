<?php

class StockModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //grab all stock information from database
    public function getAllStock()
    {
       /*$this->db->select('*');
       $query = $this->db->get('stocks');
       return $query;*/
       /*
        echo("----------Stocks-------------");
        var_dump($stockData);
        return $stockData;
        */
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
   public function getSpecificStockTrans($data)
   {
        echo("----------Transactions-------------");
        var_dump($data);
        return $data;
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
    public function getRecentMovement($movementData)
    {
         /*$this->load->database();
         $this->db->select('*');
         $this->db->from('movements');
         $query = $this->db->get();
         return $query;*/
        echo("----------Movements-------------");
        var_dump($movementData);
        return $movementData;
    }

   //validate stock with database
   function isValid($stock)
   {
       $test = array();
       $row = 1;
       if (($handle = fopen("http://bsx.jlparry.com/data/stocks", "r")) !== FALSE) {
           while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
               $num = count($data);
               //echo "<p> $num fields in line $row: <br /></p>\n";
               $row++;
               $test2 = array();
               for ($c=0; $c < $num; $c++) {
                   //echo $data[$c] . "<br />\n";
                   $test2[] = $data[$c];
               }
               $test[] = $test2;
           }
           fclose($handle);
       }
       $listStock = $this->getAllStock($data);

       foreach($listStock as $row)
        {
            if($row->Name == $stock || $row->Code == $stock)
            {
              return true;
            }
        }
        return false;
   }
}