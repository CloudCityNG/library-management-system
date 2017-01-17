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
        $this->load->view('setting/index', $data);
        $this->load->view('template/footer');
    }

    public function edit(){
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
        $data['success'] = 'Settings updated successfully';
        header("Location: http://lms.dev/index.php/setting");
    }
}