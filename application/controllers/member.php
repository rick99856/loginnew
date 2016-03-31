<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	/**
	 * 用來顯示帳號資料用
	 */
	public function __construct()
    {
            parent::__construct();
            session_start();
    }
	public function index()
	{
		// print_r( $this->text());
		$result = $this->text()->result_array();
		$view = "";
		for($i = 0; $i<count($result);$i++){
			$view .= "<tr>";
            $view .= "<td>名字(帳號)：".$result[$i]['username']."</td>";
            $view .= "<td>電話：".$result[$i]['tel']."</td>";
            $view .= "<td>地址：".$result[$i]['adds']."</td>";
            $view .= "<td>備註：".$result[$i]['other']."</td>";
            $view .= "</tr>";
		}
		$data['view'] = $view;
		
		$this->load->view('member',$data);
		$this->load->view('button');
		
	}
	public function text(){
		$this->load->database();
		$this->load->model('name_model');
		return $this->name_model->infos();


	}
}
