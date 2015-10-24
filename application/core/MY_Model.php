<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }

    function user_data($user_id)
    {
    	$sql = "SELECT * FROM `users` `us` JOIN `user_types` `ut` ON `us`.`user_type_id` = `ut`.`user_type_id` WHERE `us`.`user_id` = '$user_id'";

    	$result = $this->db->query($sql);
    	$result = $result->result_array();

    	return $result[0];
    }

    function get_user_id($email)
    {
        $sql = "SELECT `user_id` FROM `users` WHERE `email` = '$email'";

        $result = $this->db->query($sql);
        $result = $result->result_array();

        return $result[0]['user_id'];
    }

    public function get_member_user_data($member_id)
    {
        $this->db->where('member_id',$member_id);
        $this->db->get('members');
    }

    public function get_user_member_data($user_id)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->get('members');
    }
    
}
