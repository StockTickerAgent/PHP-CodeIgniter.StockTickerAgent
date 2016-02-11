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
    
    foreach($query->result() as $row){
        echo $row->DateTime . " " . $row->Player . " " . $row->Stock . " " . $row->Trans . " " . $row->Quantity;
        echo "<br />";
        $data[] = $row;
    }
                

    $this->data['pagebody'] = 'portfolio_single';
    $this->render();
  }

}
