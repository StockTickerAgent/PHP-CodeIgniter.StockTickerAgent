<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MY_Controller {

	public function index() {
        $this->load->model("PortfolioModel");

        $playerList = $this->PortfolioModel->getAllPortfolio();

        $playerListResult = array();
        foreach($playerList->result() as $row){
            $playerListResult[] = $row;
        }

        $this->data['pagebody'] = 'portfolio_all';
        $this->data['playerList'] = $playerListResult;
        $this->render();
	}

    public function getSpecificPortfolio($name){
      	    $this->load->model("PortfolioModel");
            $result = $this->checkValid("portfolio",$name);
 
            if(!$result){
              $this->data['pagebody'] = 'Error';
              $this->data['title'] = 'Player Not Found!';
              $this->render();  
            } else {
            
              $query = $this->PortfolioModel->getSpecificPortfolio($name);

            // Outputs all records to array for easier use
            $stockResult = array();
            $currentHoldings = array();

            foreach ($query->result() as $row) {
                $stockResult[] = $row;

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
            $this->data['stocks'] = $stockResult;
            $this->data['currentHoldings'] = $currentHoldings;
            $this->data['cash'] = $stockResult[0]->Cash;
            $this->data['pagebody'] = 'portfolio_single';
            $this->data['name'] = $name;

            $this->render();
            }
    }

    public function formSpecificPortfolio(){
        //$this->getSpecificPortfolio($this->input->get('playerChoice'));
        //echo "HI";
        $player = $this->input->get('playerChoice');
        redirect("/portfolio/$player");
    }
}