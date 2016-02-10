<?php

class Home extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
       $this->load->model('stocks');
       $stock= $this->stocks->get_stock();

       foreach($stock->result() AS $row){
          echo $row->Name;
       }

     //  $data['Code'] = $stock['Code'];
     //  $data['Name'] = $stock['Name'];
     //  $data['Category'] = $stock['Category'];
     //  $data['Value'] = $stock['Value'];
     //  $this->load->view('home',$stock);
    }
}