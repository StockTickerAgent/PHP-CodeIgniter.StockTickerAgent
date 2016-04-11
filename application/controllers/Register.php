<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller
{

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

    $this->data['pagebody'] = 'Register';
    $this->data['ErrorMessage'] = '';
    $this->render();
  }
  
  function register_process(){
        $this->load->model("UsersModel");
        $this->load->model('PortfolioModel');
        $usersList = $this->UsersModel->getUsers();
        $proceed = true;
        
        if($_POST['password'] !== $_POST['confirmPassword']){
            $this->data['pagebody'] = 'Register';
            $this->data['ErrorMessage'] = 'Passwords Do Not Match';
            $proceed = false;
            $this->render();
        }
        
        foreach ($usersList->result() as $row) {
            if(strtolower($row->username) == strtolower($_POST['username'])){
                $proceed = false;
                break;         
            }
        }

        if(!$proceed){
            $this->data['pagebody'] = 'Register';
            $this->data['ErrorMessage'] = 'Username Already in the Database';
            $this->render();
        }
        
        if($proceed){
            $this->UsersModel->addUser($_POST['username'],password_hash($_POST['password'],PASSWORD_DEFAULT));
            $this->PortfolioModel->addPlayer($_POST['username']);
            $this->data['pagebody'] = 'LogIn';
            $this->data['ErrorMessage'] = 'You Have Been Registered, You Can Now Log In';
            $this->render();
        }
        
  }

}