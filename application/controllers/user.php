<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index(){
        $data['activeFriends'] = $this->User_model->activeFriends();
        $this->load->view('dashboard/dashboard', $data);
    }
    public function profile($currentUser){
        // if ($currentUser === $logIn){
        //     //if the user is opening his/her own page, load page with all the content
        // }else{
        //     //if not, open the same page but hide some personal content
        // }
        $user = $this->User_model->profile($currentUser);
        $data['username'] = $user['username'];
        $data['dateOfEntry'] = $user['DoR'];
        $this->load->view('profile/profileHeader', $data);
    }
}