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
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $givenUsername;
            $data['message'] = "Succesful";
            // $this->load->view('user/profile');
            header('location:profile');
        } else {
            $_SESSION['logged_in'] = false;
            echo "Something went wrong";
        }

        // $data['page']='users/';
        // $this->load->view('templates/content',$data);
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
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true ){

            $this->load->view('user/profile/profile');
        }
        else{
            echo "You are not registred";
        }

    }


    public function getConvos()
    { }

    public function chat($username){
        $data['username'] = $username;
        $this->load->view('user/chat/chat_screen', $data);
    }

    # Search engine
    public function search()
    {
        $this->load->view('user/search/search');
        $data['cari'] = $this->Search_model->cariTest();
        $this->load->view('user/search/searchresult', $data);
    }
}
