<?php
             if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system fool..!');

  class Login extends CI_Controller
  {
            public function index(){
            $this->load->library('session');
            $this->load->view("admin/admin_login");
        }


        public function admin_login(){

             $this->load->library('form_validation'); 
             $this->form_validation->set_rules('username','User Name','required|alpha|trim');                   
             $this->form_validation->set_rules('password','Password','required');    // same for passowrd
             $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");  //special effect to eror use

        
         if ($this->form_validation->run() ) 
            {
               $username=$this->input->post('username');  //getting uname & passs from form here 
               $password=$this->input->post('password');


               $this->load->model('loginmodel');                                   
                   $login_id = $this->loginmodel->login_valid($username, $password); 
                           if ( $login_id ) 
                           {
                               $this->load->library('session');                         //load session for every user & setencryt key in config

                                 $this->session->set_userdata('user_id',$login_id);
                                    return redirect ('transaction/issueBook');                                 // redirect to member page                
                           }
                           else{
                                 $this->session->set_flashdata('login_failed','Invalid Username/Password.');  //invalid uname and pass show alert
                                return redirect('login');
                               }

                               }
                               else{
                                    $this->load->view('login');
                                   }
              
                                 }
                             
         public function logout()
        {   

        $this->load->library('session');
        $this->session->unset_userdata('user_id');
        return redirect ('login');
       }
  


    }

       


?>
     