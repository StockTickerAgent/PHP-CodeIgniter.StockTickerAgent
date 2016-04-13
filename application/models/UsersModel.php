<?php

class UsersModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
     
    function getUsers(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('users');
        
        $query = $this->db->get();
        return $query;
    }
    
    function addUser($username,$password,$role,$fileName){
        $this->load->database();
        
        $data = array(
            'username'      => $username ,
            'password'      => $password ,
            'role'          => $role ,
            'avatar'        => $fileName , 
            'Player'    => $username
        );

        $this->db->insert('users', $data); 
    }
    
    function updateAvatar($prevPlayerName, $usersData){
        $this->db->where('Player', $prevPlayerName);
        $this->db->update('users', $usersData); 
    }
    
    function updateName($prevPlayerName, $playersData){
        $this->db->where('Player', $prevPlayerName);
        $this->db->update('users', $playersData); 
    }
}