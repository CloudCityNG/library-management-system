<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nilesh Thadani
 * Date: 27-06-2016
 * Time: 09:07
 */
    
class Transaction extends CI_Controller{

    /**
     * Transaction constructor.
     */
    public function __construct(){
        parent:: __construct();
        $this->load->model('transaction_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function getDetails(){
        $memberId = $_POST['member_id'];
        $member = array(
            'qmemberId' => $memberId
        );
        $data = $this->transaction_model->getDetails($member);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function calculateFine(){
        $return_date = $_POST['return'];
        $current_date = $_POST['current'];
        $diff = (ceil(abs(strtotime($return_date) - strtotime($current_date)))/86400);
        $member = array(
            'memberid' => $_POST['member_id']
        );
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $city['value'] = $this->transaction_model->isDombivli($member);
        $amt=0;
        /*if($city['value']=="yes"){
            if($diff>7){
                $diff-=7;
                $amt = $diff*2;
            }
        }
        else if($city['value']=="no"){
            if($diff>14){
                $diff-=14;
                $amt = $diff*2;
                echo $amt;
            }
        }
        else{
            //error
        }*/
        $amt = $diff*2;

        $arr = array('difference'=>$amt);
        echo json_encode($arr);
    }

    public function getFine($diff, $city){
        $amt=0;
        if($city){
            if($diff>7){
                $diff-=7;
                $amt = $diff*2;
            }
        }
        else{
            if($diff>14){
                $diff-=14;
                $amt = $diff*2;
            }
        }
        return $amt;
    }

    public function issueBook(){
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
        if(isset($_POST['issueBook'])){
            $this->load->library("form_validation");
            $this->form_validation->set_rules('bookId','Book ID','required|numeric|trim');
            $this->form_validation->set_rules('memberId', 'Member ID','required|numeric|trim');
            $this->form_validation->set_rules('bookType','Book Type','required');
            if($this->form_validation->run()!=FALSE) {
                $memberId = trim($_POST['memberId']);
                $bookId = trim($_POST['bookId']);
                $bookType = $_POST['bookType'];
                /*
                 * checking if the entered book id is valid with respect to the selected book type
                 */
                if($bookType=="0"){
                    if(strlen($bookId)!=10){ //educational book
                        $data['error'] = "Invalid educational book ID ".$bookId;
                        $this->load->view('template/header');
                        $this->load->view('template/msg',$data);
                        $this->load->view('transaction/issueBook');
                        $this->load->view('template/footer');
                    }
                }
                else if($bookType=="1"){ //magazine
                    if(strlen($bookId)!=5 && $bookId>10000 && $bookId<=20000){
                        $data['error'] = "Invalid ".$bookType." ID ".$bookId;
                        $this->load->view('template/header');
                        $this->load->view('template/msg',$data);
                        $this->load->view('transaction/issueBook');
                        $this->load->view('template/footer');
                    }
                }
                else if($bookType=="2"){ //novel
                    if(strlen($bookId)!=5 && $bookId>20000 && $bookId<=30000){
                        $data['error'] = "Invalid ".$bookType." ID ".$bookId;
                        $this->load->view('template/header');
                        $this->load->view('template/msg',$data);
                        $this->load->view('transaction/issueBook');
                        $this->load->view('template/footer');
                    }
                }
                //book id check complete
                $issueDetails = array(
                    'qmemberId' => $memberId,
                    'qbookId' => $bookId,
                    'qbookType' => $bookType
                );
                $returnValue = $this->transaction_model->issueBook($issueDetails);
                if($returnValue=="max-other"){
                    //book issued successfully
                    $data['error'] = "Only one novel/magazine is allowed to issue per account";
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('transaction/issueBook');
                    $this->load->view('template/footer');
                }
                else if($returnValue=="max-edu"){
                    $data['error'] = "Only one educational book is allowed to issue per account";
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('transaction/issueBook');
                    $this->load->view('template/footer');
                }
                else if($returnValue=="max-all"){
                    //show issued book details
                    $data['error'] = "Only 2 books can be kept issued at one time";
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('transaction/issueBook');
                    $this->load->view('template/footer');
                }
                else if($returnValue=="book-issued"){
                    $data['error'] = "Book with ID <strong>".$bookId."</strong> is already issued!";
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('transaction/issueBook');
                    $this->load->view('template/footer');
                }
                else if($returnValue=="absent"){
                    $data['error'] = "No book exists with ID <strong>".$bookId."</strong>";
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('transaction/issueBook');
                    $this->load->view('template/footer');
                }
                else if($returnValue=="inactive"){
                    $data['error'] = "Member <strong>".$memberId."</strong> is inactive!";
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('transaction/issueBook');
                    $this->load->view('template/footer');
                }
                else{
                    $data['success'] = $returnValue;
                    $this->load->view('template/header');
                    $this->load->view('template/msg',$data);
                    $this->load->view('transaction/issueBook');
                    $this->load->view('template/footer');
                }
            }
            else{
                $data['error'] = "Validation error! Please try again";
                $this->load->view('template/header');
                $this->load->view('template/msg',$data);
                $this->load->view('transaction/issueBook');
                $this->load->view('template/footer');
            }
        }
        else{
            //$data['error'] = "No post! Please try again";
            $this->load->view('template/header');
            //$this->load->view('template/msg',$data);
            $this->load->view('transaction/issueBook');
            $this->load->view('template/footer');
        }
    }
    
    public function returnBook(){
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
        $this->load->view('template/header');
        $this->load->view('transaction/returnBook');
        $this->load->view('template/footer');
    }
    
    public function payFine(){
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
        $book_type = $_GET['book_type'];
        $book_id = $_GET['book_id'];
        $member_id = $_GET['member_id'];
        $transaction_id = $_GET['tran_id'];
        $fine_amt = $_GET['amt'];
        $fine_paid = $_GET['pay'];
        $book_details = array(
            'type' => $book_type,
            'b_id' => $book_id,
            't_id' => $transaction_id,
            'mem_id' => $member_id,
            'paid' => $fine_paid,
            'amt' => $fine_amt
        );
        $data = $this->transaction_model->payFine($book_details);
        if($data=="success"){
            $msg = "Book <strong>".$book_id."</strong> returned successfully by member <strong>".$member_id."</strong>";
        }
        else{
            $msg = "Error Occured! Please contact system admin immediately.";
        }
        $msg1 = $msg.' '.$book_id.' '.$transaction_id;
        $arr = array('msg'=>$msg1);
        echo json_encode($arr);

    }

    public function justReturnBook(){
        $book_type = $_GET['book_type'];
        $member_id = $_GET['member_id'];
        $book_id = $_GET['book_id'];
        $transaction_id = $_GET['tran_id'];
        $book_details = array(
            'type' => $book_type,
            'mem_id' => $member_id,
            'b_id' => $book_id,
            't_id' => $transaction_id
        );
        $msg = $this->transaction_model->justReturnBook($book_details);
        if($msg){
            $data['success'] = "Book <strong>".$book_id."</strong> returned successfully by member <strong>".$member_id."</strong>";
            /*$this->load->view('template/header');
            $this->load->view('template/msg',$data);
            $this->load->view('transaction/successReturn');
            $this->load->view('template/footer');*/
            echo TRUE;
        }
        else{
            $data['error'] = "Error occured! Transaction could not be completed. Please try again and if problem persists again, contact admin";
            /*$this->load->view('template/header');
            $this->load->view('template/msg',$data);
            $this->load->view('transaction/successReturn');
            $this->load->view('template/footer');*/
            echo FALSE;
        }
    }

    public function transactionHistory(){
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = PATH."transaction/transactionHistory";
            $config['per_page'] = 15;
            $config['num_links'] = 10;
            $this->pagination->initialize($config);
            $data['transactionHistory'] = $this->transaction_model->transactionHistory();
            $this->load->view('template/header');
            $this->load->view('transaction/transactionHistory',$data);
            $this->load->view('template/footer');

    }

}