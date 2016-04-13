<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class playerManagement extends MY_Controller
{

  //load specific portfolio data from model into
  //a session variable and redirect to display the info
  function index()
  {
    $this->data['pagebody'] = 'PlayerManagement';
    $this->data['playerList'] = $this->populatePlayers();
    $this->render();
  }
  
  function deletePlayer($playerName){
      $this->load->model("PortfolioModel");
      $playerQuery = $this->PortfolioModel->getPlayer($playerName);
      
      foreach($playerQuery->result() as $row){
        $player[] = $row;    
      }
      
      $this->data['pagebody'] = 'DeletePlayer';
      $this->data['player'] = $player;
      $this->render();
  }
  
  function deletePlayerProcess(){
      $this->load->model("PortfolioModel");
      $this->PortfolioModel->deletePlayer($_POST["playerName"]);
      
        $this->data['pagebody'] = 'PlayerManagement';
        $this->data['playerList'] = $this->populatePlayers();
        $this->render();
      
  }
  
  function populatePlayers(){
    $this->load->model("PortfolioModel");
    $this->load->model("UsersModel");
    $playerQuery = $this->PortfolioModel->getAllPortfolio();
    $userQuery = $this->UsersModel->getUsers();
    
   
    foreach ($playerQuery->result() as $playerRow) {
        foreach($userQuery->result() as $userRow){
            
            if($userRow->Player == $playerRow->Player){
                $playerRow->Avatar = $userRow->avatar;
                $playerList[] = $playerRow;
                break;
            }
            
        }
    }
    
    return $playerList;
  }
  
  function editPlayer($playerName){
      $this->load->model("PortfolioModel");
      $playerQuery = $this->PortfolioModel->getPlayer($playerName);
      
      foreach($playerQuery->result() as $row){
        $player[] = $row;    
      }
      
      $this->data['pagebody'] = 'EditPlayer';
      $this->data["ErrorMessage"] = "";
      $this->data['player'] = $player;
      $this->render();
  }
  
  function editPlayerProcess(){
      $this->load->model("PortfolioModel");
      $this->load->model("UsersModel");
      $playerName = $_POST["playerName"];
      $proceed = true;
      
      if($playerName != $_POST["prevPlayerName"])
        $proceed = !$this->PortfolioModel->isValid($playerName);
      
      if($proceed){
          $playersData = array(
               'Player' => $playerName,
            );
          if(file_exists($_FILES['avatar']['tmp_name']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {
                // file uploaded
                $config['upload_path'] = './data/avatar/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '1000';
                $config['file_name'] = $this->generateRandomString();

                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('avatar')) {
                    // Get the error
                    $error = array('error' => $this->upload->display_errors());
                    $proceed = false;
                    
                    //Redirecting
                    $this->data['pagebody'] = 'EditPlayer';
                    $this->data['ErrorMessage'] = $error["error"];
                    $this->render();
                } else {
                    // Get the data
                    $data = array('upload_data' => $this->upload->data());
                    
                    // Adding The Users to Database
                    //$this->UsersModel->addUser($_POST['username'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['role'],$data["upload_data"]["file_name"]);
                    //$this->PortfolioModel->addPlayer($_POST['username']);
                    
                    $usersData = array(
                      'avatar' => $data["upload_data"]["file_name"]
                    );
                    
                    $this->UsersModel->updateAvatar($_POST["prevPlayerName"],$usersData);
                    
                    // Redirecting
                }
          } 
          
        $this->PortfolioModel->updateName($_POST["prevPlayerName"],$playersData);
        $this->UsersModel->updateName($_POST["prevPlayerName"],$playersData);
        
        $this->data['pagebody'] = 'PlayerManagement';
        $this->data['playerList'] = $this->populatePlayers();
        $this->render();
      } else {
          $this->data["ErrorMessage"] = "Player Name Is Already In The Database";
          $this->data['pagebody'] = 'EditPlayer';
          $this->render();
      }
      
  }
  
 

}