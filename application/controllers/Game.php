<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 4/17/16
 * Time: 1:46 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Games extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->restrict(array(USER));
        $this->load->model('GameModel');
        $this->load->library('session');
    }

    public function buy(){
        $status = $this->GameModel->getServerStatus();
        if($status == 3) {
            $this->session->set_flashdata('item', 'Stock Purchase Successful');
            $this->session->set_flashdata('flag', 'alert-success');
            $stockCode = $this->input->post('code');
            $quantity = $this->input->post('quantity');
            $this->GameModel->buy($stockCode, $quantity);
        }else{
            $this->session->set_flashdata('item', 'Game is not active at the moment');
            $this->session->set_flashdata('flag', 'alert-danger');
        }
        redirect('/game');
    }

}