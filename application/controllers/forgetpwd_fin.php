<?php
date_default_timezone_set('Asia/Taipei'); // 修正時區
$timeStamp = date("Y-m-d H:i:s"); // 取得時間
// echo($timeStamp); // 2013-05-12 01:31:28
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgetpwd_fin extends CI_Controller {

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
            
			
        $result = $this->name_model->forgetpwd_emailcheck($arr)->result_array();
        // echo $result[0]['username']."\\\\".$result[0]['email'];

        if(strcasecmp($_POST['email'],$result[0]['email'])==0){
            $data['username'] = $result[0]['username'];
            $data['passwd'] = md5(md5($result[0]['username']));

            if($this->name_model->edit_info($data)){
                echo "將寄密碼到註冊信箱";
                $this->sendmail($result[0]['email'],md5($result[0]['username'].$timeStamp));
            }
            else{
                echo "失敗";
            }      
            
        }
        else{
            echo "此信箱與當初所設定信箱不同";
        }
        
    }

    function sendmail($mail,$passwd){
        // $key = md5($id.$mail);
        $this->load->library("email");
        $config["protocol"]     = "smtp";                     //郵件協定
        $config["smtp_host"]    = "ssl://smtp.googlemail.com";//SMTP 伺服器地址 
        $config["smtp_port"]    = "465";                      //SMTP 端口
        $config["smtp_timeout"] = "7";                        //SMTP 超時設置
        $config["smtp_user"]    = "s13113241@stu.edu.tw";   //SMTP 帳號 
        $config["smtp_pass"]    = "zx0956950105";              //SMTP 密碼
        $config["charset"]      = "utf-8";
        $config["newline"]      = "\r\n";                     // 换行(使用 "\r\n" to 以遵守RFC 822).
        $config["mailtype"]     = "html";                     // text 或 html
        $config["validation"]   = TRUE;                       // 是否驗證郵件位址      
        $this->email->initialize($config);
        $this->email->from("s13113241@stu.edu.tw", "Administrator");
        // $list = array('cheemaxgame@gmail.com', 's11113127@stu.edu.tw');
        // $this->email->to($list); 
        $this->email->to($mail); 
        $this->email->subject("註冊認證");
        $this->email->set_mailtype("html");
        // $web = '<a href="10.200.96.30/loginnew">首頁</a>';
        // $web2 = "https://192.168.137.178/loginnew/authenticate/auth/".$key;

        $this->email->message("your passwd is ".$passwd." plz reset your new passwd soon.");  
        if($this->email->send()){
            echo $this->email->print_debugger();
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

