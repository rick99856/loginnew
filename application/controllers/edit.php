<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
            parent::__construct();
            session_start();
    }
	public function index()
	{
		$this->load->database();
		$this->load->model('name_model');
		// session_start();
		// $this->load->view('abc');
		$da = $this->name_model->edit_pr($_SESSION['username']);


		// print_r($da);
		$data['passwd'] = $da->result_array()[0]['passwd'];
		$data['tel'] = $da->result_array()[0]['tel'];
		$data['adds'] = $da->result_array()[0]['adds'];
		$data['other'] = $da->result_array()[0]['other'];
		$data['email'] = $da->result_array()[0]['email'];
		print_r($_SESSION['username']);
		print_r($da->result_array()[0]['username']);
		$this->load->view('edit',$data);
		// $this->text();

	}
	public function text(){
		echo "123456";
	}
}
