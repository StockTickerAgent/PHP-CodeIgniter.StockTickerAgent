<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MY_Controller {

	public function index() {
   	    $this->data['pagebody'] = 'portfolio_all';
        $this->render();
	}

  public function getPortfolio($person){
    $this->load->model("PortfolioModel");
    $query = $this->PortfolioModel->getSpecificPortfolio($person);

    // Outputs all records to array for easier use
    $result = array();
    foreach($query->result() as $row){
      $result[] = $row;
    }

    // Pass the result to the view
    $this->data['stocks'] = $result;
    $this->data['pagebody'] = 'portfolio_single';
    $this->render();
  }

}
