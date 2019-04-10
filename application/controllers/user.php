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
        $data["preferredCategories"] = $this->User_model->getPreferredCategories($_SESSION['idUser']);
        $data["categories"] = $this->User_model->getCategories();
        $this->load->view('templates/content', $data);
       
        // $this->load->view('User/index', $data);
    }

    public function chat($username){
        $data['username'] = $username;
        $currentUser = $_SESSION['username'];
        $data['idChat'] = $this->User_model->openConvo($currentUser, $username);
        $this->load->view('user/chat/chat_screen', $data);
    }

     # Search engine

    public function search()
    {
        $this->load->view('user/profile/headerProfile');
        $this->load->view('user/search/search');
        $data['cari'] = $this->Search_model->cariTest();
        $this->load->view('user/search/searchresult', $data);
        $this->load->view('user/profile/footerProfile');
    }

    function settings(){
        $this -> load -> view ('user/profile/headerProfile');
        $this -> load -> view("settings/settings");
        $this -> load -> view ('user/profile/footerProfile');
    }

    public function changePassword() {
      $this -> load -> view ('user/profile/headerProfile');
      $this -> load -> view('settings/changePassword');
      $this -> load -> view ('user/profile/footerProfile');
    }

    public function ch_Passwd() {
        if ($this->input->post('new_password')==$this->input->post('confirm_password')){
          $hashedPassword = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
          $update_data = array(
            "passwd" => $hashedPassword
          );
        $this->db->update('users',$update_data);
        redirect('user/profile');
      }
      else {redirect('user/profile');}
    }

    function profile() {
      $this -> load -> view ('user/profile/headerProfile');
      $this -> load -> view('user/profile/profile');
      $this -> load -> view ('user/profile/footerProfile');
    }


    function others_profile() {
      $this -> load -> view ('user/profile/headerProfile');
      $this -> load -> view('user/others_profile');
      $this -> load -> view ('user/profile/footerProfile');
    }


    public function getCategories()
    {
        $data["categories"] = $this->User_model->getCategories();
        $this->load->view("user/login/questionnaire", $data);
    }

    public function chooseCategories()
    {
        //$preferredCategories = getPreferredCategories($_SESSION['idUser']);
        //$filteredCategories = array_filter($preferredCategories, NULL);
        // if ( $preferredCategories )
        // {
          $insert_data = array(
            'idUser' => $_SESSION['idUser'],
            'culture'=> $this->input->post('culture'),
            'science'=> $this->input->post('science'),
            'technology'=> $this->input->post('technology'),
            'fashion'=> $this->input->post('fashion'),
            'lifestyle'=> $this->input->post('lifestyle'),
            'politics'=> $this->input->post('politics'),
            'art'=> $this->input->post('art'),
            'culinary'=> $this->input->post('culinary'),
            'education'=> $this->input->post('education'),
            'history'=> $this->input->post('history')
          );
        // }
        $this->User_model->addPreferredCategories($insert_data);
        redirect('User/index');
    }
    public function showPreferredCategories()
    {
        $data["preferredCategories"] = $this->User_model->getPreferredCategories($_SESSION['idUser']);
        $data["categories"] = $this->User_model->getCategories();
        $this->load->view('User/index', $data);
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

    public function admin() {
      $this -> load -> view ('user/admin/adminHeader');
      $this -> load -> view('user/admin/admin');
      $this -> load -> view ('user/admin/adminFooter');
    }

    public function ban() {
      $this -> load -> view ('user/admin/adminHeader');
      $this -> load -> view('user/admin/ban');
      $this -> load -> view ('user/admin/adminFooter');
    }
}
