<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_fin extends CI_Controller {

	public function __construct()
    {
    		
            parent::__construct();
            session_start();
    }
	public function index()
	{
		$this->load->database();
			$this->load->model('name_model');

			$arr= $_POST;
			if($this->name_model->delete($_POST['id'])){
			
				
					echo '刪除成功';
					echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
				
				
			}
			else{
				echo 'error';
				echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
			}
			
}

}
