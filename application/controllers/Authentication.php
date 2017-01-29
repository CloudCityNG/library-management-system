<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	require_once (dirname(__FILE__).'/Member.php');
	/**
	 * Class Authentication
	 */
	class Authentication extends CI_Controller {
	
		public function __construct(){
			parent:: __construct();
			$this->load->model('authentication_model');
			$this->load->library('session');
			$this->load->helper('url');
		}

		public function index() {
			/**
			 * if logged in, redirect to homepage
			 * else show login view
			 */
			if($this->session->userdata('is_logged')){
				redirect('member');
			}
			$this->load->library('form_validation');
			if(isset($_POST['login'])){
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if($this->form_validation->run()!=FALSE){
					$username = trim($_POST['username']);
					$password = hash('sha256', trim($_POST['password']));
					$user_data = array(
						'username' => $username,
						'password' => $password
					);
					$response['response'] = $this->authentication_model->login($user_data);
					if($response['response']!=FALSE){
						//success
						$this->session->set_userdata($response['response']);
						$this->session->set_userdata('is_logged', TRUE);
						$response['success'] = 'Welcome '.$this->session->userdata('name');
						redirect('member');
					} else{
						//error
						$response['error'] = 'Authentication error occured. Check your credentials';
						$this->load->view('template/msg', $response);
						$this->load->view('auth/login');
					}
				} else{
					$response['error'] = 'Validation error.';
					$this->load->view('template/msg', $response);
					$this->load->view('auth/login');
				}
			} else{
				$this->load->view('auth/login');
			}
		}

		public function logout(){
			/**
			 * logout functionality and then take back to login page
			 */
			$userdata = array('name'=>'','email'=>'','mobile'=>'','created_at'=>'','is_logged'=>FALSE);
			$this->session->unset_userdata($userdata);
			$this->session->sess_destroy();
			$data['success'] = "Logout successfull";;
			$this->load->view('template/msg',$data);
			$this->load->view('auth/login');
		}

		public function register(){
			/**
			 * show register page if not submit
			 * else register user
			 */
			if($this->session->userdata('is_logged')){
				redirect('member');
			}
			$this->load->library("form_validation");
			if(isset($_POST['register'])){
				$this->form_validation->set_rules('name','Name','required|trim');
				$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]|trim');
				$this->form_validation->set_rules('mobile','Mobile','required|numeric|is_unique[users.mobile]|trim');
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|trim');
				$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]|trim');
				$this->form_validation->set_rules('cpassword', 'Confirm password', 'required|trim');
				if($this->form_validation->run()!=FALSE){
					$name = trim($_POST['name']);
					$email = trim($_POST['email']);
					$mobile = trim($_POST['mobile']);
					$username = trim($_POST['username']);
					$password = hash('sha256',trim($_POST['password']));
					$register_user = array(
						'name' => $name,
						'email' => $email,
						'mobile' => $mobile,
						'username' => $username,
						'password' => $password
					);
					$response['response'] = $this->authentication_model->register($register_user);
					if($response['response']==FALSE){
						$data['error'] = 'Database error occured. Please try again or contact admin';
						$this->load->view('template/msg', $data);
						$this->load->view('auth/register');
					} else{
						$data['success'] = 'Registration successful. Please login to continue';
						$this->load->view('template/msg', $data);
						$this->load->view('auth/login');
					}
				} else{
					$data['error'] = 'Validation error! Please try again with different username/email/mobile if you are a first time user.';
					$this->load->view('template/msg', $data);
					$this->load->view('auth/register');
				}
			} else{
				if($this->session->userdata('is_logged')){
					redirect('member');
				} else{
					$this->load->view('auth/register');
				}
			}
		}
	}

