<?php

class StockModel extends MY_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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

    //grab recent transaction info from database
    public function getRecentMovement($movementData)
    {
        echo("----------Movements-------------");
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
               $row++;
               $test2 = array();
               for ($c=0; $c < $num; $c++) {
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

   // Get movements of the stock (PARAM: STOCK CODE)
   function getMovementStock($stock){
        $stockMovements = $this->parseURL("http://bsx.jlparry.com/data/Movement");
        $stockMovementList = array();

        // -1 because the latest one is never complete when pulling pulling data from server
        for($i = count($stockMovements) - 1; $i >= 0; $i--){

            if($stockMovements[$i][2] == $stock){
                $tempStockList = array();

                $tempStockList["Datetime"] = $stockMovements[$i][1];
                $tempStockList["Code"] = $stockMovements[$i][2];
                $tempStockList["Action"] = $stockMovements[$i][3];
                $tempStockList["Amount"] = $stockMovements[$i][4];

                array_push($stockMovementList,$tempStockList);
            }
        }
        return $stockMovementList;
   }

   function getRecentMovements(){
       $stockMovements = $this->parseURL("http://bsx.jlparry.com/data/Movement");
       $stockMovementList = array();

        // -1 because the latest one is never complete when pulling pulling data from server
       for($i = count($stockMovements) - 1; $i >= 0; $i--){
            if(count($stockMovementList) >= 5){
                break;
            }
            $tempStockList = array();

            $tempStockList["Datetime"] = $stockMovements[$i][1];
            $tempStockList["Code"] = $stockMovements[$i][2];
            $tempStockList["Action"] = $stockMovements[$i][3];
            $tempStockList["Amount"] = $stockMovements[$i][4];

            array_push($stockMovementList,$tempStockList);
       }
       return $stockMovementList;
   }

   function getStock($stock){
        $stockData = $this->parseURL("http://bsx.jlparry.com/data/stocks");
        $stockInfo = array();

        for($i = 1; $i < count($stockData); $i++){
            if($stockData[$i][0] == $stock){
                $stockInfo["Name"] = $stockData[$i][1];
                $stockInfo["Code"] = $stockData[$i][0];
                $stockInfo["Value"] = $stockData[$i][3];
                break;
            }
        }
        return $stockInfo;
   }

   function getAllStocks(){
       $stockData = $this->parseURL("http://bsx.jlparry.com/data/stocks");

       $stockList = array();
       for($i = 1; $i < count($stockData); $i++){
            $stockInfo = array();

            $stockInfo["Code"] = $stockData[$i][0];
            $stockInfo["Name"] = $stockData[$i][1];
            $stockInfo["Value"] = $stockData[$i][3];

            array_push($stockList,$stockInfo);
        }
        return $stockList;
    }

   function getRecentTransaction(){
       $stockTransactions = $this->parseURL("http://bsx.jlparry.com/data/transactions");
       $transactionList = array();
       // -1 because the latest one is never complete when pulling pulling data from server
       for($i = count($stockTransactions) - 1; $i > 0; $i--){
           if(count($transactionList) >= 5){
               break;
           }

           $tempTransactionList = array();

           $tempTransactionList["Datetime"] = $stockTransactions[$i][1];
           $tempTransactionList["Agent"] = $stockTransactions[$i][2];
           $tempTransactionList["Player"] = $stockTransactions[$i][3];
           $tempTransactionList["Stock"] = $stockTransactions[$i][4];
           $tempTransactionList["Trans"] = $stockTransactions[$i][5];
           $tempTransactionList["Quantity"] = $stockTransactions[$i][6];

           array_push($transactionList,$tempTransactionList);
       }

       $tempTransactionList["Datetime"] = "June";
       $tempTransactionList["Agent"] = "Kobe";
       $tempTransactionList["Player"] = "Bryant";
       $tempTransactionList["Stock"] = "Lakers";
       $tempTransactionList["Trans"] = "81";
       $tempTransactionList["Quantity"] = "2016";
       array_push($transactionList,$tempTransactionList);

       return $transactionList;
    }
}