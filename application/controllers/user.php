<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Search_model');
        if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
      } else{
        //   $this->load->view("user/login/login"); 
        // redirect("main_page");
        header('location:access_denied');
        }
    }
function access_denied(){
    redirect("LoginRegistration/login");
}
    public function index()
    {
        $data['activeFriends'] = $this->User_model->activeFriends();
        $data['page'] = 'user/dashboard';
        $this->load->view('templates/content', $data);
    }
   

    public function profile()
    {
        // if ($currentUser === $logIn){
        //     //if the user is opening his/her own page, load page with all the content
        // }else{
        //     //if not, open the same page but hide some personal content
        // }
        // $user = $this->User_model->profile();
        // $data['username'] = $user['username'];
        // $data['dateOfEntry'] = $user['DoR'];
        // print_r($_SESSION);
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
            $_SESSION['time'] = $this->User_model->getDate($_SESSION['username']);
            $this->load->view('user/profile/profile');
        }
        else{
        }


    }
    public function chat($username){
        $data['username'] = $username;
        //$this->load->view('user/chat/chat_screen', $data);
        
    }


    # Search engine

    public function search()
    {
        $this->load->view('user/search/search');
        $data['cari'] = $this->Search_model->cariTest();
        $this->load->view('user/search/searchresult', $data);
    }

    function settings(){
        $this -> load -> view ('user/profile/headerProfile');
        $this -> load -> view("settings/settings");
        $this -> load -> view ('user/profile/footerProfile');
    }
    public function do_upload()
    {
            $config['upload_path']          = './images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;
            $config['max_width']            = 2024;
            $config['max_height']           = 2024;

            $this->load->library('upload', $config);
            echo($this->upload->data('file_name'));

            if ( $this->upload->do_upload('userfile') )
            {
                  echo "success!";
                  $_SESSION['image']=$this->User_model->setUpPicture($_SESSION['username'],$this->upload->data('file_name'));
                redirect('user/profile/profile');
            }
            else
            {
               $data['messageSettings']="The file is too big";
               $this -> load -> view ('user/profile/headerProfile');
               $this -> load -> view("settings/settings",$data);
               $this -> load -> view ('user/profile/footerProfile');

            }
    }
    function logout(){
        $_SESSION['logged_in']=false;
        redirect(site_url("main_page"));
    }
}
