<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  function index()
  {
/*
    $this->load->model('stockmodel');
    $stock= $this->stockmodel->getAllStock();

    $this->data['stock'] = $stock;
*/

    $this->data['pagebody'] = 'Home';
    $this->render();
    
  }

}