<?php

class PortfolioModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    //grab player portfolio data from database
    function getSpecificPortfolio($person)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('players');
        $this->db->join('transactions','transactions.Player = players.Player');
        $this->db->join('users','users.Player = players.Player');
        $this->db->where('users.id', $person);
        $query = $this->db->get();
        return $query;
    }

    //grab all portfolio info from database
    function getAllPortfolio()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('players');
        $this->db->join('users','users.Player = players.Player');
        $query = $this->db->get();
        return $query;
    }

    //validate player's name with database
    function isValid($playerName)
    {
      $listPeople = $this->getAllPortfolio();
      foreach($listPeople->result() as $row){
        if($row->Player == $playerName){
          return true;
        }
      }
      return false;
    }
    
    function addPlayer($username){
        $this->load->database();
        
        $data = array(
            'Player'    => $username ,
            'Cash'      => 1000 ,
            'Equity'    => 1000 , 
            'Username' => $username
        );

        $this->db->insert('players', $data); 
    }
    
    function getPlayer($playerId){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('players');
        $this->db->join('users','users.Player = players.Player');
        $this->db->where('users.id',$playerId);
        $query = $this->db->get();
        return $query;
    }
    
    function deletePlayer($name){
        $this->db->where('Player', $name);
        $this->db->delete('players'); 
    }
    
    function updateName($prevPlayerName, $playersData){
        $this->db->where('Player', $prevPlayerName);
        $this->db->update('players', $playersData); 
    }
    
    function isValidId($playerId)
    {
      $listPeople = $this->getAllPortfolio();
      foreach($listPeople->result() as $row){
        if($row->id == $playerId){
          return true;
        }
      }
      return false;
    }
}