<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 2/12/16
 * Time: 3:36 PM
 */
session_start();

Class User_Authentication extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('login_database');
    }

    // Show login page
    public function index() {
        $this->load->view('login_form');
    }

    public function user_login_process(){
        $this->form_validation->ser_rules('username','Username','trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            if(isset($this->session->userdata['logged_in'])){
                $this->load->view('admin_page');
            }else{
                $this->load->view('login_form');
            }
        } else {
            $data = array(
                $username = $this->input->post('username')
            );
            $result = $this->db->login($data);
            if($result == TRUE){
                $username = $this->input->post('username');
                $result = $this->db->read_user_information($username);
                if(result != false){
                    $session_data = array('username'=> $result[0]->user_name);
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('admin_page');
                }
            } else {
                $data = array('error_message' => 'Invalid Username');
                $this->load->view('login_form',$data);
            }
        }
    }

    public function logout(){
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in',$sess_array);
        $data['message_display'] = 'Logout successful';
        $this->load->view('login_form',$data);
    }

}