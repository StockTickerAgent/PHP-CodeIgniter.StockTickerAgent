<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MY_Controller {

    //get general data from model display
	public function index()
    {
        $this->load->model("PortfolioModel");

        $playerList = $this->PortfolioModel->getAllPortfolio();

        $playerListResult = array();
        foreach($playerList->result() as $row){
            $playerListResult[] = $row;
        }

        $this->data['pagetitle'] = 'Choose a Portfolio - ' . $this->data['pagetitle'];
        $this->data['pagebody'] = 'portfolio_all';
        $this->data['playerList'] = $playerListResult;
        $this->render();
	}

  //get specific data about certain player from model
  public function getSpecificPortfolio($name)
  {
    $this->load->model("PortfolioModel");
    $result = $this->checkValid("portfolio",$name);

    if(!$result){
      $this->output->set_status_header('404'); // setting header to 404
      $this->data['pagebody'] = 'Error_404';
      $this->render();
    } else {


    $query = $this->PortfolioModel->getSpecificPortfolio($name);

    // Outputs all records to array for easier use
    $stockResult = array();
    $currentHoldings = array();

    foreach ($query->result() as $row) {
        $stockResult[] = $row;
        // Pass the result to the view
        $playerCash = 0;
        $this->data['stocks'] = $stockResult;
        $this->data['currentHoldings'] = $currentHoldings;
        if(count($stockResult) != 0){
            $playerCash = $stockResult[0]->Cash;
        } else {
            $queryPerson = $this->PortfolioModel->getPlayer($name);
            $person = $queryPerson->result()[0];
            $playerCash = $person->Cash;
        }
        $this->data['cash'] = $playerCash;
        $this->data['pagebody'] = 'portfolio_single';
        $this->data['name'] = $name;
        if ($row->Trans == "buy") {
            if (array_key_exists($row->Stock, $currentHoldings)) {
                $currentHoldings[$row->Stock]->Quantity += $row->Quantity;
            } else {
                $currentHoldings[$row->Stock] = clone $row;
            }
        } else {
            if (array_key_exists($row->Stock, $currentHoldings)) {
                $currentHoldings[$row->Stock]->Quantity -= $row->Quantity;
            } else {
                $currentHoldings[$row->Stock] = clone $row;
                $currentHoldings[$row->Stock]->Quantity *= -1;
            }
        }
    }

    // Pass the result to the view
    $this->data['pagetitle'] = $name . '\'s Portfolio - ' . $this->data['pagetitle'];
    $this->data['stocks'] = $stockResult;
    $this->data['currentHoldings'] = $currentHoldings;
    if(count($stockResult) != 0){
       $playerCash = $stockResult[0]->Cash;
    } else {
        $queryPerson = $this->PortfolioModel->getPlayer($name);
        $person = $queryPerson->result()[0];
        $playerCash = $person->Cash;
    }
    $this->data['cash'] = $playerCash;
    $this->data['pagebody'] = 'portfolio_single';
    $this->data['name'] = $name;

    $this->render();
    }
  }

  //get playerchoice from the form
  public function formSpecificPortfolio()
  {
    $player = $this->input->get('playerChoice');
    redirect("/portfolio/$player");
  }
}