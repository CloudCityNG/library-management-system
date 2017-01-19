<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 2/12/16
 * Time: 4:40 PM
 */
class Setting extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('member_model');
        $this->load->model('searchdatabase_model');
        $this->load->model('setting_model');
    }

    public function index(){
        //get fee and deposit amount from db
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
        $settings = $this->setting_model->view();
        if(!$settings){
            $data['error'] = "Error occured while fetching data";
            $this->load->view('template/header');
            $this->load->view('template/msg', $data);
            $this->load->view('template/footer');
            //error occured
        }
        $data['settings'] = $settings;
        $this->load->view('template/header');
        $this->load->view('template/msg');
        $this->load->view('setting/index', $data);
        $this->load->view('template/footer');
    }

    public function edit(){
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
        $this->load->library("form_validation");
        $edit_ids = $_POST['edit_ids'];
        $ids = array();
        $ids = explode('_',$edit_ids);
        $count = count($ids)-1;
        for($i=0;$i<$count;$i++){
            $id = $ids[$i];
            $value = $_POST[$id];
            echo $id.'->'.$value;
            $this->setting_model->edit($id, $value);
        }
        $this->session->set_userdata('successs','Settings updated successfully');
        redirect('setting');
    }
    
    public function addCollege(){
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('college_name','College name','required');
    	if($this->form_validation->run()==FALSE){
    		redirect('setting');
    	} else{
    		$college_data = array(
    			'college_name' => trim($_POST['college_name'])
    		);
    		$data['response'] = $this->setting_model->addCollege($college_data);
    		if(!$data['response']){
    			//DB ERROR
    			$this->session->set_userdata('error',$college_data['college_name'].' could not be added.Please try again');
    		} else{
    			//success
    			$this->session->set_userdata('success','College '.$college_data['college_name'].' added successfully');
    		}
    		redirect('setting');
    	}
    }
    
    public function addUniversity(){
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('university_name','University name','required');
   		if($this->form_validation->run()==FALSE){
   			redirect('setting');
   		} else{
    		$university_data = array(
   				'university_name' => trim($_POST['university_name'])
   			);
    		$data['response'] = $this->setting_model->addUniversity($university_data);
    		if(!$data['response']){
    			//DB ERROR
   				$this->session->set_userdata('error',$university_data['university_name'].' could not be added.Please try again');
    		} else{
    			//success
    			$this->session->set_userdata('success','University '.$university_data['university_name'].' added successfully');
    		}
    		redirect('setting');
    	}
    }
}