<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message1 extends CI_Controller {

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
		$username = "rick7320";      // 帳號
		$password = "hs9m322x";          // 密碼
		$mobile = "0975381155"; // 電話
		$type = "now"; 
		$message = "簡測訊試"; // 簡訊內容
		$encoding = "big5"; // 簡訊內容編碼
		$popup = ""; // 使用 POPUP 顯示
		$mo = ""; // 使用雙向簡訊
		$vldtime = ""; // 簡訊有效期限
		$dlvtime = ""; // 預約時間
		$MSGData = "";  
		$CheckRes ="";
		
		$msg =
			"username=".$username."&password=".$password."&type=".$type."&encoding=".$encoding."&popup=".$popup."&mo=".$mo."&mobile=".$mobile."&message=".$message."&vldtime=".$vldtime."&dlvtime=".$dlvtime;
		$num = strlen($msg);        
		 
		// 打開 API 閘道
		$fp = fsockopen ("api.twsms.com", 80);
		if ($fp) {
		    $MSGData .= "POST /send_sms.php HTTP/1.1\r\n";
		    $MSGData .= "Host: api.twsms.com\r\n";
		    $MSGData .= "Content-Length: ".$num."\r\n";
		    $MSGData .= "Content-Type: application/x-www-form-urlencoded\r\n";
		    $MSGData .= "Connection: Close\r\n\r\n";
		    $MSGData .= $msg."\r\n";
		    fputs ($fp, $MSGData);

		    $Tmp ="";
		    // 取出回傳值
		    while (!feof($fp)) $Tmp.=fgets($fp,128); 
		    echo "ok";
		    $temp2 = explode(PHP_EOL, $Tmp);
		    // 關閉閘道
		    fclose ($fp);

		    for ($i=0; $i<count($Tmp); $i++){
		    	print_r($Tmp);
			 	// if (ereg("resp=",$Tmp[$i]) != FALSE){
			 	// 	$CheckRes = split("=",$Tmp[$i]);
			 	// }
			}
			print_r($CheckRes);
			// if (intval($CheckRes[1]) <= 0){
			// 	echo "傳送失敗:".$CheckRes[1];
			// } else {
			//  echo "傳送完成:".$CheckRes[1];
			// }
		    // echo "傳送完成:".$Tmp."<br/>".$xmldata['msgid'];
		} else {
			    echo "您無法連接 TwSMS API Server";
		}                   
	   		 $this->load->view('welcome_message');
	}


		// // print_r($da);
		// $data['passwd'] = $da->result_array()[0]['passwd'];
		// $data['tel'] = $da->result_array()[0]['tel'];
		// $data['adds'] = $da->result_array()[0]['adds'];
		// $data['other'] = $da->result_array()[0]['other'];
		// $data['email'] = $da->result_array()[0]['email'];
		// print_r($_SESSION['username']);
		// print_r($da->result_array()[0]['username']);
		// $this->load->view('edit',$data);
		   
		// $this->text();

	
	// public function text(){
	// 	echo "123456";
	// }

public function drul(){
    $this->load->database();            
    $inputdata = $this->input->get('xml');
    $xml = simplexml_load_string($inputdata);
    $xmldata = json_decode( json_encode($xml) , 1);
    $arraystring =print_r($xmldata);
    $this->msg=$arraystring;
 
    $dbvalue = array(
      'sms_msg'=> $xmldata['msgid']."<a href='http://superlevin.ifengyuan.tw/tag/status/'>status</a>=".$xmldata['statustext'],
      'id' =>$xmldata['code'],
      'ip' => $this->input->ip_address(),
    );
    $this->db->insert('drul',$dbvalue );      
    $data = array(
        'message' => $xmldata['msgid']
    );
		$this->load->view('welcome_message',$data);
	}
}