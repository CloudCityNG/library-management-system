<?php
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 17/2/15
 * Time: 8:14 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class searchdatabase_control extends CI_Controller{

    public function index(){
        $this->find_members();
    }

    public function __construct(){
        parent:: __construct();
        $this->load->model('searchdatabase_model');
        $this->load->model('member_model');
		$this->load->model('book_model');
        //$this->load->library('uri');
    }

    public function find_members(){
    	$data['college'] = $this->member_model->college();
    	$data['branch'] = $this->member_model->branch();
    	$data['university'] = $this->member_model->university();
    	$data['bloodGroup'] = $this->member_model->bloodGroup();
    	$data['status'] = $this->member_model->status();
        $this->load->view('template/header');
        $this->load->view('template/searchdatabase',$data);
        $this->load->view('template/footer');
    }

    public function find_id(){
        $this->load->library("form_validation");
        if(isset($_POST['id_search'])){
            $this->form_validation->set_rules('member_id','Member ID','required|numeric');
            if($this->form_validation->run()!=FALSE){
				$member_id = $_POST['member_id'];
                $member = array(
                    'qmember_id' => $member_id
                );
                $members['detail'] = $this->searchdatabase_model->id_member($member);
				if(!($members['detail']==FALSE)) {
                    $this->load->view('template/header');
                    $this->load->view('member/search_memberid',$members);
                    $this->load->view('template/footer');					
				}
				else {
                    $data['error'] = "No search results found!";
                    $data['college'] = $this->member_model->college();
			    	$data['branch'] = $this->member_model->branch();
			    	$data['university'] = $this->member_model->university();
			    	$data['bloodGroup'] = $this->member_model->bloodGroup();
			    	$data['status'] = $this->member_model->status();
			        $this->load->view('template/header');
			        $this->load->view('template/msg',$data);
			        $this->load->view('template/searchdatabase',$data);
			        $this->load->view('template/footer');
                }
            }
            else{
				$data['error'] = "Form Validation failed!";
				$data['college'] = $this->member_model->college();
			    $data['branch'] = $this->member_model->branch();
			   	$data['university'] = $this->member_model->university();
			   	$data['bloodGroup'] = $this->member_model->bloodGroup();
			   	$data['status'] = $this->member_model->status();
		        $this->load->view('template/header');
		        $this->load->view('template/msg',$data);
		        $this->load->view('template/searchdatabase',$data);
			    $this->load->view('template/footer');
            }
		}
		else{
			$data['error'] = "Value not set";
			$data['college'] = $this->member_model->college();
			$data['branch'] = $this->member_model->branch();
	    	$data['university'] = $this->member_model->university();
			$data['bloodGroup'] = $this->member_model->bloodGroup();
			$data['status'] = $this->member_model->status();
			$this->load->view('template/header');
	        $this->load->view('template/msg',$data);
		    $this->load->view('template/searchdatabase',$data);
	        $this->load->view('template/footer');
		}
    }

    public function advance_search(){
        $this->load->library("form_validation");
		$this->load->library('pagination');
		$this->load->library('table');
		$config['base_url'] = "http://lms.dev/index.php/searchdatabase_control/advance_search";
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

        if(isset($_POST['search'])){
            $this->form_validation->set_rules('email','E-mail','valid_email|xss-client');
            $this->form_validation->set_rules('contact','Contact','numeric');
            if($this->form_validation->run()!=FALSE){
                $member_id = $_POST['member_id'];
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $address_city = $_POST['address_city'];
                $college = $_POST['college'];
                $blood_group = $_POST['blood_group'];
                $university = $_POST['university'];
                $status = $_POST['status'];
                $type = $_POST['type'];
				$current_year = $_POST['current_year'];
                $branch = $_POST['branch'];

                $data = array(
                    'wmember_id' => $member_id,
                    'wname' => $name,
                    'wgender' => $gender,
                    'wcontact' => $contact,
                    'wemail' => $email,
                    'waddress_city' => $address_city,
                    'wcollege' => $college,
                    'wblood_group' =>$blood_group,
                    'wuniversity' => $university,
                    'wstatus' => $status,
                    'wtype' => $type,
					'wcurrent_year' => $current_year,
                    'wbranch' => $branch
                );
				if($data!=NULL){
                	$result['details'] = $this->searchdatabase_model->advance_search($data);
				}
				else{
					$data['error'] = "Please enter data to search for!";
					$data['college'] = $this->member_model->college();
			    	$data['branch'] = $this->member_model->branch();
			    	$data['university'] = $this->member_model->university();
			    	$data['bloodGroup'] = $this->member_model->bloodGroup();
			    	$data['status'] = $this->member_model->status();
			        $this->load->view('template/header');
			        $this->load->view('template/msg',$data);
			        $this->load->view('template/searchdatabase',$data);
			        $this->load->view('template/footer');
				}
                if(!($result['details']==FALSE)){
                    $this->load->view('template/header');
                    $this->load->view('member/view_member',$result);
                    $this->load->view('template/footer');
                }
				else{
					$data['error'] = "No search results found!";
					$data['college'] = $this->member_model->college();
			    	$data['branch'] = $this->member_model->branch();
			    	$data['university'] = $this->member_model->university();
			    	$data['bloodGroup'] = $this->member_model->bloodGroup();
			    	$data['status'] = $this->member_model->status();
			        $this->load->view('template/header');
			        $this->load->view('template/msg',$data);
			        $this->load->view('template/searchdatabase',$data);
			        $this->load->view('template/footer');
				}
            }
            else{
            	$data['college'] = $this->member_model->college();
			    $data['branch'] = $this->member_model->branch();
			   	$data['university'] = $this->member_model->university();
			   	$data['bloodGroup'] = $this->member_model->bloodGroup();
			   	$data['status'] = $this->member_model->status();
				$this->load->view('template/header');
		        $this->load->view('template/msg');
		        $this->load->view('template/searchdatabase',$data);
		        $this->load->view('template/footer');
            }
        }
		else{
			$data['error'] = "Value not set!";
			$data['college'] = $this->member_model->college();
	    	$data['branch'] = $this->member_model->branch();
			$data['university'] = $this->member_model->university();
	    	$data['bloodGroup'] = $this->member_model->bloodGroup();
	    	$data['status'] = $this->member_model->status();
	        $this->load->view('template/header');
	        $this->load->view('template/msg',$data);
	        $this->load->view('template/searchdatabase',$data);
	        $this->load->view('template/footer');
		}
    }

	public function find_book(){
		$data['branch'] = $this->book_model->get_branch();
		$data['topic'] = $this->book_model->get_topic();
		$data['author'] = $this->book_model->get_author();
		$data['publication'] = $this->book_model->get_publication();
		$this->load->view('template/header');
		$this->load->view('book/add_detail');
		$this->load->view('book/book_search',$data);
		$this->load->view('template/footer');
	}

	public function book_search(){
		$this->load->library("form_validation");
		$this->load->library('pagination');
		$this->load->library('table');
		$config['base_url'] = "http://localhost/lms/index.php/searchdatabase_control/book_search";
		$config['per_page'] = 25;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('type','Type','required');
			$this->form_validation->set_rules('bookid','Book ID','numeric');
			$data['branch'] = $this->book_model->get_branch();
			$data['topic'] = $this->book_model->get_topic();
			$data['author'] = $this->book_model->get_author();
			$data['publication'] = $this->book_model->get_publication();

			if($this->form_validation->run()!=FALSE){
				$bookid = $_POST['bookid'];
				$title = $_POST['title'];
				$type = $_POST['type'];
				$branch = $_POST['branch'];
				$topic = $_POST['topic'];
				$author = $_POST['author'];
				$date = $_POST['date'];
				$publication = $_POST['publication'];

				$bookdata = array(
					'qbookid' => $bookid,
					'qtitle' => $title,
					'qtype' => $type,
					'qbranch' => $branch,
					'qtopic' => $topic,
					'qauthor' => $author,
					'qdate' => $date,
					'qpublication' => $publication
				);

				if($bookdata!=NULL){
					if($type=="Educational"){
						$result['details'] = $this->searchdatabase_model->bookSearch($bookdata);
					}
					else if($type=="Novel"){
						$result['details'] = $this->searchdatabase_model->novelSearch($bookdata);
					}
					else if($type=="Magazine"){
						$result['details'] = $this->searchdatabase_model->magazineSearch($bookdata);
					}
				}
				else{
					$data['error'] = "Please enter data to search for!";
					$this->load->view('template/header');
					$this->load->view('template/msg',$data);
					$this->load->view('book/add_detail');
					$this->load->view('book/book_search',$data);
					$this->load->view('tempate/footer');
				}
				if(!($result['details']==FALSE)){
					$this->load->view('template/header');
					$this->load->view('book/add_detail');
					$this->load->view('book/view_book',$result);
					$this->load->view('template/footer');
				}
				else{
					$data['error'] = "No search results found!";
					$this->load->view('template/header');
					$this->load->view('template/msg',$data);
					$this->load->view('book/add_detail');
					$this->load->view('book/book_search',$data);
					$this->load->view('template/footer');
				}

			}
			else{
				$data['branch'] = $this->book_model->get_branch();
				$data['topic'] = $this->book_model->get_topic();
				$data['author'] = $this->book_model->get_author();
				$data['publication'] = $this->book_model->get_publication();
				$this->load->view('template/header');
				$this->load->view('book/add_detail');
				$this->load->view('book/book_search',$data);
				$this->load->view('template/footer');
			}
		}
	}
}