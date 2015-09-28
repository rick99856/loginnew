<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funct1 extends CI_Controller {

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
		$this->text();
		
		
	}
	public function text($text){
		// print_r($text);
		$this->load->helper('url');
		switch ($text) {
				case '1':
					header("Location:".base_url()."register" );
				// echo 
					break;

				case '2':
					$this->load->view('edit');
					break;
				
				case '3':
					$this->load->view('delete');
					break;
				default:
					break;
			}	
		
	}
}
