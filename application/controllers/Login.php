<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function index(){
        $this->load->model("PortfolioModel");

        $playerList = $this->PortfolioModel->getAllPortfolio();

        $playerListResult = array();
        foreach($playerList->result() as $row){
            $playerListResult[] = $row;
        }

        foreach($playerListResult as $row){
            if($row->Player == $_POST['']){
                $array =
                $this->session->set_userdata($array);
            }
        }
        var_dump($playerListResult);
     //   $this->data['pagebody'] = 'portfolio_all';
      //  $this->data['playerList'] = $playerListResult;
       // $this->render();

    }

}