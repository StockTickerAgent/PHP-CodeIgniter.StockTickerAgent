<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller
{
  function index()
  {
    if ($this->input->method(TRUE) == "POST") {
        $this->load->model("UsersModel");
        $this->load->model('PortfolioModel');
        $usersList = $this->UsersModel->getUsers();
        $proceed = true;

        $config['upload_path'] = './data/avatar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['file_name'] = $this->generateRandomString();

        $this->load->library('upload', $config);

        //error handling for user registration
        if (empty($_POST['password'])
            && empty($_POST['confirmPassword'])
            && empty($_POST['username'])
            && !$this->upload->do_upload('avatar')) {
            $this->data['ErrorMessage'] = 'Please fill out all fields';
        } else if (empty($_POST['password']) || empty($_POST['confirmPassword'])){
            $this->data['ErrorMessage'] = 'Passwords fields cannot be empty';
        }
        else if($_POST['password'] !== $_POST['confirmPassword']){
            $this->data['ErrorMessage'] = 'Passwords Do Not Match';
        }
        else {
            foreach ($usersList->result() as $row) {
                if(strtolower($row->username) == strtolower($_POST['username'])){
                    $this->data['ErrorMessage'] = 'The username is already in use';
                    $proceed = false;
                    break;
                }
            }

            if($proceed){
                if ( ! $this->upload->do_upload('avatar')) {
                    // Get the error
                    $error = array('error' => $this->upload->display_errors());
                    $proceed = false;

                    //Redirecting
                    $this->data['ErrorMessage'] = $error["error"];
                } else {
                    // Get the data
                    $data = array('upload_data' => $this->upload->data());

                    // Adding The Users to Database
                    $this->UsersModel->addUser($_POST['username'],password_hash($_POST['password'],PASSWORD_DEFAULT), "guest", $data["upload_data"]["file_name"]);
                    $this->PortfolioModel->addPlayer($_POST['username']);

                    // Redirecting
                    $this->session->set_flashdata('success', 'You Have Been Registered, You Can Now Log In');
                    redirect("/login");
                }
            }
        }
    }
    $this->data['pagebody'] = 'Register';
    $this->render();
  }
}