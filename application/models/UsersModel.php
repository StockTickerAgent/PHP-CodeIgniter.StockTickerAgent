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
    
    function addUser($username,$password){
        $this->load->database();
        
        $data = array(
            'username' => $username ,
            'password' => $password 
        );

        $this->db->insert('users', $data); 
    }
}