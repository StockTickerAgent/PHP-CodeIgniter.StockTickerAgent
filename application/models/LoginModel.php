<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 2/12/16
 * Time: 4:26 PM
*/
class LoginModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function login($person)
    {
        $this->load->database();

        $this->db->select('players.Player');
        $this->db->from('players');
        $this->db->where('players.Player', $person);
        $query = $this->db->get();

        return $query;
    }
}