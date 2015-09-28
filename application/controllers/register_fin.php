<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_fin extends CI_Controller {

	public function __construct()
    {
    		
            parent::__construct();
            session_start();
    }
	public function index()
	{
		$this->load->database();
			$this->load->model('name_model');
			// $arr = array($_POST['id'],$POST['pw'],$_POST['pw2'],
			// 				$_POST['telephone'],$_POST['address'],
			// 				$_POST['other']);
			$arr= $_POST;
			if($this->name_model->checkpwd($arr)){
			
				if($this->name_model->register($arr)){
					echo '註冊成功';
					echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
				}
				else{
					echo "error";
					
				}
				
			}
			else{
				echo '內容輸入有誤';
				// echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
			}
			
}

}
