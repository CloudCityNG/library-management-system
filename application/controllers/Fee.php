<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Class Fee
     */
    class Fee extends CI_Controller {

        public function __construct(){
            parent:: __construct();
            $this->load->model('member_model');
            $this->load->model('searchdatabase_model');
            $this->load->model('deposit_model');
            $this->load->model('fee_model');
            $this->load->model('setting_model');
        }   
        
        public function index(){
        	if(!$this->session->userdata('is_logged'))
        		redirect('/');
        	$this->addFee();
        }

        public function addFee(){
        	if(!$this->session->userdata('is_logged'))
        		redirect('/');
            if(isset($_POST['submitFee'])){
                $this->load->library("form_validation");
                $this->form_validation->set_rules('memberType','Member Type','required');
                $this->form_validation->set_rules('dueList','Member','required');
                $this->form_validation->set_rules('amount','Amount','required|trim|numeric');
                $this->form_validation->set_rules('date','Date','required');
                $this->form_validation->set_rules('period','Period/Duration','required|trim|numeric');
                $this->form_validation->set_rules('booklet','Booklet No','trim|required');
                $this->form_validation->set_rules('receipt','Receipt No','trim|required');
                if($this->form_validation->run()!=FALSE){
                    $feeData = array(
                        'memberId' => $_POST['dueList'],
                        'amount' => $_POST['amount'],
                        'date' => $_POST['date'],
                        'period' => $_POST['period'],
                        'receipt' => $_POST['receipt'],
                        'booklet' => $_POST['receipt']
                        );
                    if($_POST['memberType']=='expired'){
                        $msg = $this->fee_model->updateFee($feeData);
                    }
                    else if($_POST['memberType'=='new']){
                        $msg = $this->fee_modl->newFee($feeData);
                    }
                    if($msg=='success'){
                        $data['success'] = "Fee successfull added for member id <strong>".$_POST['dueList']."</strong>! Expires on ".date('y-m-d',strtotime("+".$_POST['period']." months -1 day",strtotime($_POST['date'])));
                    }
                    else{
                        $data['error'] = "Please try again! Error occured";
                    }
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('fee/successFee');
                    $this->load->view('template/footer');
                }
                else{
                    $data['fee'] = $this->setting_model->getFeeConstant();
                    $data['error'] = "Validation Error! Please try again";
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('fee/addFee', $data);
                    $this->load->view('template/footer');
                }
            }
            else{
                $data['fee'] = $this->setting_model->getFeeConstant();
                $this->load->view('template/header');
                $this->load->view('fee/addFee', $data);
                $this->load->view('template/footer');
            }
        }

        public function getExpiredList(){
            $expired=$_POST['type'];
            $data['member'] = $this->fee_model->expiredFeeMembers();
        }

        public function getNewList(){
            $data['member'] = $this->fee_model->newMembers();
        }

        public function viewActiveFee(){
        	if(!$this->session->userdata('is_logged'))
        		redirect('/');
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = PATH."fee/viewActiveFee";
            $config['per_page'] = 20;
            $config['num_links'] = 10;
            $this->pagination->initialize($config);
            
            $data['activeFee'] = $this->fee_model->viewActiveFee();
            $this->load->view('template/header');
            $this->load->view('fee/viewActiveFee',$data);
            $this->load->view('template/footer');
        }

        public function viewDeadFee(){
        	if(!$this->session->userdata('is_logged'))
        		redirect('/');
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = PATH."fee/viewDeadFee";
            $config['per_page'] = 2;
            $config['num_links'] = 2;
            $this->pagination->initialize($config);
            
            $data['deadFee'] = $this->fee_model->viewDeadFee();
            $this->load->view('template/header');
            $this->load->view('fee/viewDeadFee',$data);
            $this->load->view('template/footer');
        }
}