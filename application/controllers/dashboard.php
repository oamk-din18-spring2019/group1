<?php
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index(){
        $data['activeFriends'] = $this->User_model->activeFriends();
        $this->load->view('dashboard/dashboard', $data);
    }
}