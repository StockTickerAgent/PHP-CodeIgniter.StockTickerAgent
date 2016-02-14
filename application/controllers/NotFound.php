<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotFound extends MY_Controller {

  //grab data from model and pass to view
  function index()
  {
    $this->output->set_status_header('404'); // setting header to 404

    $this->data['pagebody'] = 'error_404';
    $this->data['error'] = "Hello";
    $this->render();
  }

}
