<?php

class PortfolioModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getSpecificPortfolio($person){
        $this->load->database();
        
        $this->db->select('*');
        $this->db->from('players');
        $this->db->join('transactions','transactions.Player = players.Player');
        $this->db->where('players.Player', $person);
        $query = $this->db->get();
        
        return $query;
    }
    
    function getAllPortfolio(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('players');
        
        $query = $this->db->get();
        
        return $query;
    }
    
    function isValid($playerName){
      $listPeople = $this->getAllPortfolio();
      foreach($listPeople->result() as $row){
        if($row->Player == $playerName){
          return true;
        }
      }
      return false;
    }
    

}