<?php
$username = "rick7320";      // 帳號
$password = "hs9m322x";          // 密碼
$mobile = "0975381155"; // 電話
$message = "this is a test message!!";  // 簡訊內容
$MSGData = "";
 
$msg = "username=".$username."&password=".$password."&mobile=".$mobile."&message=".urlencode($message)."&drurl=".urlencode("http://xxxx.com.tw/<a href="http://superlevin.ifengyuan.tw/tag/admin/">admin</a>/drul/");
$num = strlen($msg);        
 
// 打開 API 閘道
$fp = fsockopen ("api.twsms.com", 80);
if ($fp) {
    $MSGData .= "POST /smsSend.php HTTP/1.1\r\n";
    $MSGData .= "Host: api.twsms.com\r\n";
    $MSGData .= "Content-Length: ".$num."\r\n";
    $MSGData .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $MSGData .= "Connection: Close\r\n\r\n";
    $MSGData .= $msg."\r\n";
    fputs ($fp, $MSGData);
    $Tmp ="";
    // 取出回傳值
    while (!feof($fp)) $Tmp.=fgets($fp,128); 
    $temp2 = explode(PHP_EOL, $Tmp);
    // 關閉閘道
    fclose ($fp);
    /*
     0 傳送完成:HTTP/1.1 200 OK
     1 Date: Wed, 03 Jun 20xx 09:31:36 GMT
     2 Server: <a href="http://superlevin.ifengyuan.tw/tag/apache/">Apache</a>
     3 X-Powered-By: PHP/5.2.12
     4 Connection: close
     5 Transfer-Encoding: chunked
     6 Content-Type: text/html
     7 
     8 51 
     9 <smsResp><code>00000</code><text>Success</text><msgid>188xxxx69</msgid></smsResp>
    10 0
    */
    $xml = simplexml_load_string($temp2[9]);
    $xmldata = json_decode( json_encode($xml) , 1);
    echo "傳送完成:".$Tmp."<br/>".$xmldata['msgid'];
} else {
    echo "您無法連接 TwSMS API Server";
}                   
        $this->load->view('welcome_message',$data);
 
     
    }
 
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
?>