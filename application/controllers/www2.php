<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class www2 extends CI_Controller {

	public function __construct()
    {
    		
            parent::__construct();
            session_start();
    }
	public function index()
	{
		$this->load->database();
			if(isset($_POST['id']) && isset($_POST['pwd']) ){
				$this->load->model('name_model');
				if($this->name_model->check($_POST['id'],$_POST['pwd'])->num_rows()>0){
					$_SESSION['username'] = $_POST['id'];
					echo '登入成功';
					echo '<meta http-equiv="refresh" CONTENT="1; url=member">';
				}
				else{
					echo "pwd error";
					echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
				}
			}
			else{
				echo '<script>alert("不得為空值") </script>';
				// echo '<meta http-equiv="refresh" CONTENT="1; url=../index.php">';
			}
}

}
