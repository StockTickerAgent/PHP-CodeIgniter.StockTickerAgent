<?php

class PortfolioModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getResult($person){
        $this->load->database();
        
        /*
        $query = $this->db->query("SELECT * FROM players
                                   INNER JOIN transactions
                                     WHERE transactions.Player = players.Player;");
        */
        
        $this->db->select('*');
        $this->db->from('players');
        $this->db->where('players.Player', $person);
        $query = $this->db->get();
        
        /*
       foreach ($query->result() as $row) {
            echo $row->DateTime . " " ;
            echo $row->Quantity . "<br />";
        }
        */
        
        return $query;
        
    }
    

}