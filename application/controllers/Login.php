<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{

  //load specific portfolio data from model into
  //a session variable and redirect to display the info
  function index()
  {
      /*
    $this->load->model("PortfolioModel");
    $player = $_POST['playername'];
    $playerList = $this->PortfolioModel->getAllPortfolio();

    $playerListResult = array();
    foreach ($playerList->result() as $row) {
      $playerListResult[] = $row;
    }

    foreach ($playerListResult as $row) {
      if ($row->Player == $_POST['playername']) {
        $this->session->set_userdata('playername', $_POST['playername']);
      }
    }

    redirect("/portfolio/$player");
    */

    $this->data['pagebody'] = 'LogIn';
    $this->data['ErrorMessage'] = '';
    $this->render();
  }
  
  function login_process(){
      
        $this->load->model("UsersModel");
        $usersList = $this->UsersModel->getUsers();
        $found = false;
        $role = "";
        $id = "";
        
        foreach ($usersList->result() as $row) {
            if($row->username == $_POST['username'] && password_verify($_POST['password'],$row->password)){
                $found = true;
                $role = $row->role;
                $id = $row->id;
                break;         
            }
        }
        
        if($found){
            $this->session->set_userdata('playername', $_POST['username']);
            $this->session->set_userdata('role', $role);
            $this->session->set_userdata('id', $id);
            redirect("/portfolio/$player");
            
        } else {
            $this->data['pagebody'] = 'LogIn';
            $this->data['ErrorMessage'] = 'Username And Password Combination Not Valid';
            $this->render();
        }
  }

}