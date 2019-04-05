<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Search_model');
    }

    public function index()
    {
        $data['activeFriends'] = $this->User_model->activeFriends();
        $data['page'] = 'user/dashboard';
        $this->load->view('templates/content', $data);
    }
    public function login()
    {
        $this->load->view('user/login/login');
    }

    public function register()
    {
        $this->load->view('user/login/register');
    }

    function add_user()
    {
        //Registration function
        // Checks the passwords to be equal
        if ($this->input->post('pw1') == $this->input->post('pw2')) {
            //hash the password and send the information to the database
                $hashedPassword = password_hash($this->input->post('pw1'), PASSWORD_DEFAULT);
                $insert_data = array(
                    "username" => $this->input->post('un'),
                    "email" => $this->input->post('em'),
                    "passwd" => $hashedPassword
                );
                $result = $this->User_model->add_user($insert_data);
                if ($result == 1) {
                    $data['message'] = "Registration passed succesful";
                    $this->load->view('user/login/login', $data);
                } else {
                //checks if the username is unique, but for this we have to change row "username" in db to be unique
                    $data['message'] = "This username is used already";
                    $this->load->view('user/login/register', $data);
                }
            } else {
            $data['message'] = "You entered the different passwords";
            $this->load->view('user/login/register', $data);
        }
    }

    function log_in_procedure()
    {
    //function for entering the system
        $givenUsername = $this->input->post('username');
        $givenPassword = $this->input->post('password');
        $db_password = $this->User_model->getPassword($givenUsername);
        //verify the password
        if (password_verify($givenPassword, $db_password)) {
            //session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $givenUsername;
            $_SESSION['image']=$this->User_model->getPictureName($_SESSION['username']);
            $data['message'] = "Succesful";

            $data['page'] = 'user/dashboard';
            $data['activeFriends'] = $this->User_model->activeFriends();
            $this->load->view('templates/content', $data);


        } else {
            $_SESSION['logged_in'] = false;
            $data['messagePassword']="Wrong password or username";
            $this->load->view('user/login/login', $data);
        }

        // $data['page']='users/';
        // $this->load->view('templates/content',$data);
    }

   

    public function chat($username){
        $data['username'] = $username;
        $currentUser = $_SESSION['username'];
        $data['idChat'] = $this->User_model->openConvo($currentUser, $username);
        $this->load->view('user/chat/chat_screen', $data);
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
            $_SESSION['time'] = $this->User_model->getDate($_SESSION['username']);
            $this->load->view('user/profile/profile');
        }
        else{
            echo "You are not registred";
        }


    }
    # Search engine

    public function search()
    {
        $this->load->view('user/profile/headerProfile');
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
