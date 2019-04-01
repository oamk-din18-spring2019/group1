<?php
class App extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('App_model');
    }

    public function aboutUs(){
		$data['page'] = 'app/aboutUs';
		$this->load->view('templates/content',$data);
    }
    
    public function addMotion(){

    }
}