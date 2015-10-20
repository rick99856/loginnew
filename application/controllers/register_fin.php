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
			
				if($this->sendmail($arr['id'],$arr['email'])){

					$this->name_model->register($arr);

					echo '註冊成功但是必須開通喔';
					echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
				}
				else{
					echo "error";
										echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
			
				}
				
			}
			else{
				echo '內容輸入有誤';
				// echo '<meta http-equiv="refresh" CONTENT="1; url=www">';
			}
			
}
function sendmail($id,$mail){
		$key = md5($id.$mail);
        $this->load->library("email");
        $config["protocol"]     = "smtp";                     //郵件協定
        $config["smtp_host"]    = "ssl://smtp.googlemail.com";//SMTP 伺服器地址 
        $config["smtp_port"]    = "465";                      //SMTP 端口
        $config["smtp_timeout"] = "7";                        //SMTP 超時設置
        $config["smtp_user"]    = "s13113241@stu.edu.tw";   //SMTP 帳號 
        $config["smtp_pass"]    = "zx0956950105";              //SMTP 密碼
        $config["charset"]      = "utf-8";
        $config["newline"]      = "\r\n";                     // 换行(使用 "\r\n" to 以遵守RFC 822).
        $config["mailtype"]     = "text";                     // text 或 html
        $config["validation"]   = TRUE;                       // 是否驗證郵件位址      
        $this->email->initialize($config);
        $this->email->from("s13113241@stu.edu.tw", "Administrator");
        // $list = array('cheemaxgame@gmail.com', 's11113127@stu.edu.tw');
        // $this->email->to($list); 
        $this->email->to($mail); 
        $this->email->subject("註冊認證");
        $this->email->set_mailtype("html");
        $web = '<a href="10.200.96.30/loginnew">首頁</a>';
        $web2 = "localhost/loginnew/authenticate/auth/".$key;

        $this->email->message("<a href='$web2'>首頁</a>");  
        if($this->email->send()){
            echo "成功寄送";
            return true;
        } else {
            echo "失敗";
            return false;
        }
        // echo $this->email->print_debugger();
        //$this->load->view("email_view");
    }

}

