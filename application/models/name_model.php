<?php
class Name_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function check($id,$pwd){
    	$this->db->select('*');
    	$this->db->where('username',$id);
    	$this->db->where('passwd',md5($pwd));
        $this->db->where('status',1);
		$query = $this->db->get('login');
		return $query;
    }
    function infos(){
        $this->db->select('*');
        
        $query = $this->db->get('login');
        return $query;
        
    }
    function checkpwd($arr){
        if($arr['pw'] != $arr['pw2']){
            return false;
        }
        else{
            return true;
        }
    }
    function register($arr){
        $this->db->set('username', $arr['id']);
        $this->db->set('passwd', md5($arr['pw']));
        $this->db->set('tel', $arr['telephone']);
        $this->db->set('adds', $arr['address']);
        $this->db->set('other', $arr['other']);
        $this->db->set('email',$arr['email']);
        $this->db->set('key',md5($arr['id'].$arr['email']));

        // $this->db->insert('login'); 
        if($this->db->insert('login')){
            return true;
        }
        else{
            return false;
        }
    }

    function delete($id){
        $result = $this->db->delete('login', array('username' => $id));
        return $result;
    }
    function edit_pr($id){
        $this->db->select("*"); 
        $this->db->where("username",$id);
        $query = $this->db->get('login');
        return $query;
    }


    function edit_info($data){
        $this->db->where('username', $_SESSION['username']);
        if($this->db->update('login', $data)){
            return true;
        }
        else{
            return false;
        }
    }

    function reup($key){
        $this->db->select('*');
        $this->db->where('key',$key);
        $query = $this->db->get('login');/*->result_array()['key'];*/
        return $query;
        // if($query->result_array()['status'] == 1){
        //     return false;
        // }
        // else{
        //     return true;
        // }

    }

    function upstatus($key){

        $this->db->set('status','1');
        $this->db->where('key',$key);
        
        if($this->db->update('login')){
            return true;
        }
        else{
            return false;
        }
    }

    function forgetpwd_emailcheck($arr){
        $this->db->select('*');
        $this->db->where('username',$arr['id']);
        $query = $this->db->get('login');/*->result_array()['key'];*/
        return $query;

    }


    
}
?>