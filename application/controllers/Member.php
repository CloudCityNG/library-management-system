<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * Class Member
	 */
	class Member extends CI_Controller {

    public function __construct(){
	    parent:: __construct();
	    $this->load->model('member_model');
	    $this->load->model('searchdatabase_model');
	    $this->load->helper('url');
	    $this->load->library('session');
    }	
    
    public function index(){
    	if($this->session->userdata('is_logged')) {
    		$this->add_member();
	    } else{
		    redirect('/');
	    }
    }
        

    public function add_member() {
    	if(!$this->session->userdata('is_logged'))
    		redirect('/');
    	$this->load->library("form_validation");
			$data['college'] = $this->member_model->college();
			$data['branch'] = $this->member_model->branch();
			$data['university'] = $this->member_model->university();
			$data['state'] = $this->member_model->state();
			$data['status'] = $this->member_model->status();
			$data['blood'] = $this->member_model->bloodgroup();
	    if(isset($_POST['submit'])){
		    $this->form_validation->set_rules('first_name','Firstname','required');
		    $this->form_validation->set_rules('middle_name','Middlename','required');
		    $this->form_validation->set_rules('last_name','Lastname','required');
		    $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[member.email]');
				$this->form_validation->set_rules('contact_1','Mobile Number','required|numeric|is_unique[member.contact_1]');
				$this->form_validation->set_rules('address_1','Building','required');
				$this->form_validation->set_rules('address_2','Street Address','required');
				$this->form_validation->set_rules('city','City','required|alpha');
				$this->form_validation->set_rules('pincode','Pincode','required|numeric|min_length[6]');
				$this->form_validation->set_rules('address_1','Building','required');
				$this->form_validation->set_rules('date_of_birth','Date of Birth','required');
		    if($this->form_validation->run()!=FALSE) {
			    $first_name = $_POST['first_name'];
			    $middle_name = $_POST['middle_name'];
			    $last_name = $_POST['last_name'];
			    $contact_1 = $_POST['contact_1'];
			    $contact_2 = $_POST['contact_2'];
			    $email = $_POST['email'];
			    $date_of_birth = $_POST['date_of_birth'];
			    $address_building = $_POST['address_1'];
			    $address_street = $_POST['address_2'];
			    $address_city = $_POST['city'];
			    $address_state = $_POST['state'];
			    $address_pin = $_POST['pincode'];
			    $college = $_POST['college'];
			    $university = $_POST['university'];
			    $branch = $_POST['branch'];
			    $current_year = $_POST['current_year'];
			    $company = $_POST['company'];
			    $gender = $_POST['gender'];
			    $designation = $_POST['designation'];
			    $domain_of_work = $_POST['domain_of_work'];
			    $type = $_POST['type'];
			    $course = $_POST['course'];
			    $status = $_POST['status'];
			    $year_of_passing = $_POST['year_of_passing'];
			    $blood_group = $_POST['blood_group'];
			    $add_member = array(
				    'qfirst_name' => $first_name,
				    'qmiddle_name' => $middle_name,
				    'qlast_name' => $last_name,
				    'qdate_of_birth' => $date_of_birth,
				    'qemail' => $email,
				    'qcontact_1' => $contact_1,
				    'qcontact_2' => $contact_2,
				    'qaddress_building' => $address_building,
				    'qaddress_street' => $address_street,
				    'qaddress_city' => $address_city,
				    'qaddress_state' => $address_state,
				    'qaddress_pin' => $address_pin,
				    'qtype' => $type,
				    'qcollege' => $college,
				    'qcompany' => $company,
				    'qcourse' => $course,
				    'qcurrent_year' => $current_year,
				    'qgender' => $gender,
				    'qblood_group' => $blood_group,
				    'quniversity' => $university,
				    'qyear_of_passing' => $year_of_passing,
				    'qdesignation' => $designation,
				    'qdomain_of_work' => $domain_of_work,
				    'qstatus' => $status,
				    'qbranch' => $branch
			    );
			    $value = $this->member_model->add_member($add_member);
			    $data['success'] = "Member <b>".$first_name." ".$middle_name." ".$last_name."</b> added successfully with ID ".$value;
			    $member['id'] = $value;
			    $this->load->view('template/header');
			    $this->load->view('template/msg',$data);
			    $this->load->view('member/successmember',$member);
			    $this->load->view('template/footer');
		    } else{
					$data['error'] = "Validation error! Please try again with appropriate values";
					$this->load->view('template/header');
					$this->load->view('template/msg',$data);
					$this->load->view('member/add_member',$data);
					$this->load->view('template/footer');
				}
	    }
			else{
				$data['last_id'] = $this->member_model->fetch_last_id();
				$this->load->view('template/header');
				$this->load->view('template/msg');
				$this->load->view('member/add_member',$data);
				$this->load->view('template/footer');
			}
    }

		public function view_member(){
			if(!$this->session->userdata('is_logged'))
				redirect('/');
			$this->load->library('pagination');
			$this->load->library('table');
			$config['base_url'] = PATH."/member/view_member";
			$config['per_page'] = 10;
			$config['num_links'] = 3;
			$config['total_rows'] = $this->db->get('member')->num_rows();
			$this->pagination->initialize($config);
			$viewdata['details'] = $this->db->get('member', $config['per_page'], $this->uri->segment(3));
			$viewdata['details'] = $this->member_model->view_member();
			$this->load->view('template/header');
			$this->load->view('template/msg');
			$this->load->view('member/view_member',$viewdata);
			$this->load->view('template/footer');
		}

		public function edit_member(){
			if(!$this->session->userdata('is_logged'))
				redirect('/');
			$this->load->library("form_validation");
			$id = $this->uri->segment(3);
			if(isset($_POST['update'])){
				$this->form_validation->set_rules('first_name','Firstname','required');
				$this->form_validation->set_rules('middle_name','Middlename','required');
				$this->form_validation->set_rules('last_name','Lastname','required');
				$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
				$this->form_validation->set_rules('contact_1','Mobile Number','required|numeric');
				$this->form_validation->set_rules('address_1','Building','required');
				$this->form_validation->set_rules('address_2','Street Address','required');
				$this->form_validation->set_rules('city','City','required|alpha');
				$this->form_validation->set_rules('pincode','Pincode','required|numeric|min_length[6]');
				$this->form_validation->set_rules('address_1','Building','required');
				$this->form_validation->set_rules('date_of_birth','Date of Birth','required');

				if($this->form_validation->run()!=FALSE){
					$member_id = $_POST['member_id'];
					$first_name = $_POST['first_name'];
					$middle_name = $_POST['middle_name'];
					$last_name = $_POST['last_name'];
					$contact_1 = $_POST['contact_1'];
					$contact_2 = $_POST['contact_2'];
					$email = $_POST['email'];
					$date_of_birth = $_POST['date_of_birth'];
					$address_building = $_POST['address_1'];
					$address_street = $_POST['address_2'];
					$address_city = $_POST['city'];
					$address_state = $_POST['state'];
					$address_pin = $_POST['pincode'];
					$college = $_POST['college'];
					$university = $_POST['university'];
					$branch = $_POST['branch'];
					$current_year = $_POST['current_year'];
					$company = $_POST['company'];
					$gender = $_POST['gender'];
					$designation = $_POST['designation'];
					$domain_of_work = $_POST['domain_of_work'];
					$type = $_POST['type'];
					$course = $_POST['course'];
					$status = $_POST['status'];
					$year_of_passing = $_POST['year_of_passing'];
					$blood_group = $_POST['blood_group'];

					$update_member = array(
						'wmember_id' => $member_id,
						'wfirst_name' => $first_name,
						'wmiddle_name' => $middle_name,
						'wlast_name' => $last_name,
						'wdate_of_birth' => $date_of_birth,
						'wemail' => $email,
						'wcontact_1' => $contact_1,
						'wcontact_2' => $contact_2,
						'waddress_building' => $address_building,
						'waddress_street' => $address_street,
						'waddress_city' => $address_city,
						'waddress_state' => $address_state,
						'waddress_pin' => $address_pin,
						'wtype' => $type,
						'wcollege' => $college,
						'wcompany' => $company,
						'wcourse' => $course,
						'wcurrent_year' => $current_year,
						'wgender' => $gender,
						'wblood_group' => $blood_group,
						'wuniversity' => $university,
						'wyear_of_passing' => $year_of_passing,
						'wdesignation' => $designation,
						'wdomain_of_work' => $domain_of_work,
						'wstatus' => $status,
						'wbranch' => $branch
					);
					$this->member_model->update_member($update_member);
					$data['success'] = "Member <b>".$first_name." ".$middle_name." ".$last_name."</b> with member ID <b>".$member_id."</b> updated successfully";
					//$this->view_member();
					$this->load->view('template/header');
					$this->load->view('template/msg',$data);
					$this->load->view('template/footer');
				}
				else{
					$data_array['edit'] = $this->member_model->display_member($id);
					$this->load->view('template/header');
					$this->load->view('template/msg');
					$this->load->view('member/update_member',$data_array);
					$this->load->view('template/footer');
				}
			}
			if($id!=NULL){
				$data_array['edit'] = $this->member_model->display_member($id);
				//$data_array['name'] = "Edit: ".$first_name." ".$middle_name." ".$last_name;
				$this->load->view('template/header');
				$this->load->view('member/update_member',$data_array);
				$this->load->view('template/footer');
			}
		}

		public function delete_confirm() {
			if(!$this->session->userdata('is_logged'))
				redirect('/');
			$id = $this->uri->segment(3);
			$member = array(
				'member_id' => $id,
			);
			$member['details'] = $this->member_model->viewMemberDetails($member);
			if(!($member['details'])) {
				$this->session->set_userdata('error',"Member data is either corrupted or member has pending dues, check with pending dues of member");
				redirect('member/view_member');
			}
			else {
				$data['success'] = "Member information found!";
				$this->load->view('template/header');
				$this->load->view('member/deleteConfirm',$member);
				$this->load->view('template/footer');
			}
		}

		public function deleteMember(){
			if(!$this->session->userdata('is_logged'))
				redirect('/');
			$id = $this->uri->segment(3);
			$member = array(
				'member_id' => $id,
			);
			$member['delete'] = $this->member_model->deleteMember($member);
			if(!$member['delete']){

			}
			else{
				$data['success'] = "Member Deleted Successfully";
				$this->load->library('pagination');
				$this->load->library('table');
				$config['base_url'] = PATH."member/view_member";
				$config['per_page'] = 5;
				$config['num_links'] = 10;
				$config['total_rows'] = $this->db->get('member')->num_rows();
				$this->pagination->initialize($config);
				$viewdata['details'] = $this->db->get('member', $config['per_page'], $this->uri->segment(4));
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('member/view_member',$viewdata);
				$this->load->view('template/footer');
			}
		}

		public function addDeposit(){
			if(!$this->session->userdata('is_logged'))
				redirect('/');
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
				$this->load->view('template/header');
				$this->load->view('template/footer');
			}
		}
	}