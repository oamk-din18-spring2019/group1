<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_page extends CI_Controller {

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
		$data['page'] = 'mainpage';
		$this->load->view('templates/content', $data);
	}

	public function login()
	{
		$data['page'] = 'user/login/login';
		$this->load->view('templates/content', $data);
	}
	public function register() {
		$data['page'] = 'user/login/register';
		$this->load->view('templates/content', $data);
	}
}
