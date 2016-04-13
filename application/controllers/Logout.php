<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller
{
  //destroy the session variable and redirect to home page
  function index()
  {
    $this->session->unset_userdata('playername');
    $this->session->unset_userdata('role');
    $this->session->sess_destroy();
    redirect('/home');
  }
}