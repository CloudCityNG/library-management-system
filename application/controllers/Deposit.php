<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Class Deposit
     */
    class Deposit extends CI_Controller {

        public function __construct(){
            parent:: __construct();
            $this->load->model('member_model');
            $this->load->model('searchdatabase_model');
            $this->load->model('deposit_model');
            $this->load->model('setting_model');
        }   
        
        public function index(){
                //$this->add_member();       
        }

        public function addDeposit(){
            $this->load->library("form_validation");
            if(isset($_POST['submitDeposit'])){
                $this->form_validation->set_rules('amount','Amount','required|trim');
                $this->form_validation->set_rules('date','Date','required');
                $this->form_validation->set_rules('booklet','Booklet No','required|trim');
                $this->form_validation->set_rules('receipt', 'Receipt No', 'trim|required');
                if($this->form_validation->run()!=FALSE) {
                    $amount = $_POST['amount'];
                    $date = $_POST['date'];
                    $booklet = $_POST['booklet'];
                    $receipt = $_POST['receipt'];
                    $member_id = $_POST['member_id'];

                    $depositDetails = array(
                        'member_id' => $member_id,
                        'amount' => $amount,
                        'date' => $date,
                        'booklet' => $booklet,
                        'receipt' => $receipt
                    );
                    $value = $this->member_model->addDeposit($depositDetails);
                    if($value){
                        //success
                        $data['success'] = "Deposit details successfully updated for member id ".$member_id;
                        $this->load->view('template/header');
                        $this->load->view('template/msg',$data);
                        $this->load->view('template/footer');
                    }
                    else{
                        //unsuccess
                        $data['error'] = "Deposit details could not be update for member_id ".$member_id."! Please try again by selecting \'Add Deposit\' option from the side menu.";
                        $this->load->view('template/header');
                        $this->load->view('template/msg',$data);
                        $this->load->view('template/footer');
                    }
                }
                else{
                    $data['error'] = "Some error encountered! Please try again with the appropriate values in the input field while ading deposit. Add this deposit again by selecting add deposit option in the side menu.";
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('template/footer');
                }
            }
            else{
                //addDeposit view
                $data['deposit'] = $this->setting_model->getDepositConstant();
                $data['member'] = $this->deposit_model->viewPendingDeposit();
                $this->load->view('template/header');
                $this->load->view('deposit/addDeposit',$data);
                $this->load->view('template/footer');
            }
        }


        public function viewActiveDeposit(){
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = PATH."deposit/viewActiveDeposit";
            $config['per_page'] = 20;
            $config['num_links'] = 10;
            $this->pagination->initialize($config);
            
            $data['activeDeposit'] = $this->deposit_model->viewActiveDeposit();
            $this->load->view('template/header');
            $this->load->view('deposit/viewActiveDeposit',$data);
            $this->load->view('template/footer');
        }

        public function viewReturnedDeposit(){
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = PATH."deposit/viewReturnedDeposit";
            $config['per_page'] = 20;
            $config['num_links'] = 10;
            $this->pagination->initialize($config);
            
            $data['returnDeposit'] = $this->deposit_model->viewReturnedDeposit();
            $this->load->view('template/header');
            $this->load->view('deposit/viewReturnedDeposit',$data);
            $this->load->view('template/footer');
        }

    }