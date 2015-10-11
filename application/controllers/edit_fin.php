<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_fin extends CI_Controller {

	public function __construct()
    {
    		
            parent::__construct();
            session_start();
    }
	public function index()
	{
		$this->load->database();

		if($_POST['pw'] == $_POST['pw2']){
			
			$data['passwd'] = md5($_POST['pw']);
			$data['tel'] = $_POST['telephone'];
			$data['adds'] = $_POST['address'];
			$data['other'] = $_POST['other'];
			$data['email'] = $_POST['email'];
			$this->load->model('name_model');
			// $arr = array($_POST['id'],$POST['pw'],$_POST['pw2'],
			// 				$_POST['telephone'],$_POST['address'],
			// 				$_POST['other']);
			if($this->name_model->edit_info($data)){
				echo '修改成功';
				echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
			}
			else{
				echo '修改失敗';
			}
		}
			
			
			
}

}
