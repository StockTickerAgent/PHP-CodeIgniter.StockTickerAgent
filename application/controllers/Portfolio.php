<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MY_Controller {

	public function index()
	{
    $this->data['pagebody'] = 'portfolio_all';
    $this->render();
	}

  public function getPortfolio($person){
    $this->load->model("PortfolioModel");
    $data['query'] = $this->PortfolioModel->getResult($person);

    $this->data['pagebody'] = 'portfolio_single';
    $this->render();
  }

}
