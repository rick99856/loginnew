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

        // $this->db->insert('login'); 
        if($this->db->insert('login')){
            return true;
        }
        else{
            return false;
        }
    }

}
?>