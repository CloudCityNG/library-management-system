<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class authentication_model extends CI_Model {
	public function __construct() {
		parent:: __construct();
		$this->load->helper('form');
	}

	public function login($credentials){
		extract($credentials);
		$query = "SELECT name, email, mobile, created_at FROM users WHERE username='$username' AND password='$password'";
		$execute = $this->db->query($query);
		$userdata = array();
		foreach ($execute->result() as $row){
			$userdata['name'] = $row->name;
			$userdata['email'] = $row->email;
			$userdata['mobile'] = $row->mobile;
			$userdata['created_at'] = $row->created_at;
		}
		if(count($userdata) > 0){
			return $userdata;
		} else{
			return FALSE;
		}
	}

	public function logout(){

	}

	public function register($user_data){
		extract($user_data);
		$query = "INSERT INTO users(name, email, mobile, username, password) VALUES (?,?,?,?,?)";
		$execute = $this->db->query($query, array($name, $email, $mobile, $username, $password));
		$user_id = $this->db->insert_id();
		if(intval($user_id) > 0){
			return $user_id;
		} else{
			return FALSE;
		}
	}
}

