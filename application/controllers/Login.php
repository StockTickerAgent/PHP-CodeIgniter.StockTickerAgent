<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{

  //load specific portfolio data from model into
  //a session variable and redirect to display the info
  function index()
  {
    if ($this->input->method(TRUE) == "POST") {
      $this->load->model("UsersModel");
        $usersList = $this->UsersModel->getUsers();
        $found = false;
        $role = "";
        $id = "";

        //search users table for matching username & password
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
            $this->data['ErrorMessage'] = 'Invalid Username And Password Combination';
        }
    }

    $this->data['pagebody'] = 'LogIn';
    $this->render();
  }

}