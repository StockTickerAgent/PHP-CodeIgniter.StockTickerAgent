<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 2/9/16
 * Time: 4:18 PM
 */
class Stocks extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

   public function get_stock(){
       $this->db->select('*');
       $query = $this->db->get('stocks');
       return $query;
   }


}