<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_page extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('cookie');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		//check the cookie first
		//if it matches with the one stored in the server, load the dashboard
		$currentUser = get_cookie('username');
		$key = get_cookie('verification');
		if ($this->User_model->verifyCookie($currentUser, $key)){
			//do the log in procedure
			$_SESSION['logged_in'] = true;
            $_SESSION['username'] = $currentUser;
            $_SESSION['time']= $this->User_model->getDate($currentUser);
            $_SESSION['image']=$this->User_model->getPictureName($_SESSION['username']);
			$_SESSION['idUser']=$this->User_model->getIdUser($currentUser);
			
			$data['page'] = 'user/dashboard';
		}
		else{
            //if not, load the main page
            $data['page'] = 'user/mainpage';
		}
		$this->load->view('templates/content', $data);
	}
}
