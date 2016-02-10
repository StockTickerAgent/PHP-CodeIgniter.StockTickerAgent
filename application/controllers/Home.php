<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  function index()
  {
    $this->load->model('stocks');
    $stock= $this->stocks->get_stock();

    foreach($stock->result() AS $row){
      echo $row->Name;
    }

    $this->data['pagebody'] = 'home';
    $this->render();
  }

}