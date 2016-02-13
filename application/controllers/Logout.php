<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    function index()
    {
        $this->session->unset_userdata('playername');
        $this->session->sess_destroy();
        redirect('logout');
    }

}