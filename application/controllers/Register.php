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
        
        $config['upload_path'] = './data/avatar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
        $config['file_name'] = $this->generateRandomString();

		$this->load->library('upload', $config);
        
        if($_POST['password'] == "" || $_POST['confirmPassword'] == ""){
            $this->data['pagebody'] = 'Register';
            $this->data['ErrorMessage'] = 'Passwords fields cannot be empty';
            $proceed = false;
            $this->render();
        }
        
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
            if ( ! $this->upload->do_upload('avatar')) {
                // Get the error
			    $error = array('error' => $this->upload->display_errors());
                $proceed = false;
                
                //Redirecting
                $this->data['pagebody'] = 'Register';
                $this->data['ErrorMessage'] = $error["error"];
                $this->render();
		    } else {
                // Get the data
			    $data = array('upload_data' => $this->upload->data());
                
                // Adding The Users to Database
                $this->UsersModel->addUser($_POST['username'],password_hash($_POST['password'],PASSWORD_DEFAULT), "guest", $data["upload_data"]["file_name"]);
                $this->PortfolioModel->addPlayer($_POST['username']);
                
                // Redirecting
                $this->data['pagebody'] = 'LogIn';
                $this->data['ErrorMessage'] = 'You Have Been Registered, You Can Now Log In';
                $this->render();
		    }
        }
        
  }
 

}