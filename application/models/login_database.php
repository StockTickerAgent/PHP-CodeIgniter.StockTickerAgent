<?php

Class Login_Database extends CI_Model {


// Read data using username and password
    public function login($data) {

        $this->db->select('players.Player');
        $this->db->from('players');
        $this->db->where('players.Player',$data['username']);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}

?>