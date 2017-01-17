<?php
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 6/6/15
 * Time: 1:45 PM
 */
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class pagination extends CI_Controller{
		function index(){
			$this->load->library('pagination');
			$config['base_url'] = "http://localhost/lms/index.php/pagination/index";
			$config['per_page'] = 2;
			$config['num_links'] = 5;
			$config['total_rows'] = $this->db->get('member')->num_rows();
			$this->pagination->initialize($config);
		}
	}