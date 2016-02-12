<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

	public function index()
	{
            $this->data['pagebody'] = 'stock';
            $this->render();
    }       
        

}
