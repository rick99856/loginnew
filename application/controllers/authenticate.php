<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

	public function __construct()
    {
    		
            parent::__construct();
            session_start();
    }
	public function index()
	{
		
            $this->auth($key);
		
			
    }
    function auth($key){
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('name_model');
        $status = $this->name_model->reup($key);
        print_r($status->result_array());
       
        // print_r($status->result_array()->result_array()['status']);
        
        if($status->result_array()[0]['status']==1){
            if($this->name_model->upstatus($key)){
                echo "開通成功";
                 header("Location:".base_url()."www" );

            }
            else{
                echo "認證失敗";
                 header("Location:".base_url()."www" );

            }
        }
        else{
            echo "認證無效";
             header("Location:".base_url()."www" );
        }
        


    }

}

