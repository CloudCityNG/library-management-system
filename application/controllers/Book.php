<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 21/6/15
 * Time: 10:23 PM
 */
/**
 * Class Book
 */
class Book extends CI_Controller {

    public function __construct(){
		parent:: __construct();
		$this->load->model('book_model');
		$this->load->model('searchdatabase_model');
		//$this->load->library('uri');
    }

    public function index(){
		$this->add_book();
    }

	/**
	 *
	 */
	public function add_book(){
		$this->load->library("form_validation");
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('branch','Branch','required');
			$this->form_validation->set_rules('topic','Topic','required');
			$this->form_validation->set_rules('author','Author','required');
			$this->form_validation->set_rules('publication','Publication','required');
			$this->form_validation->set_rules('cost','Cost','required|trim|numeric');

			if($this->form_validation->run()!=FALSE){
				$type = $_POST['type'];
				$title = $_POST['title'];
				$branch = $_POST['branch'];
				$topic = $_POST['topic'];
				$author = $_POST['author'];
				$publication = $_POST['publication'];
				$cost = $_POST['cost'];
				$date = $_POST['date'];

				$bookdata = array(
					'qtype' => $type,
					'qtitle' => $title,
					'qbranch' => $branch,
					'qtopic' => $topic,
					'qauthor' => $author,
					'qpublication' => $publication,
					'qcost' => $cost,
					'qdate' => $date
				);

				$bookid = $this->book_model->add_book($bookdata);
				$successadd['success'] = "".$bookid;
				$this->load->view('template/header');
				$this->load->view('template/msg',$successadd);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');

			}
			else{
				$data['error'] = "Validation error! Please try again with appropriate values";
				$data['branch'] = $this->book_model->get_branch();
				$data['topic'] = $this->book_model->get_topic();
				$data['author'] = $this->book_model->get_author();
				$data['publication'] = $this->book_model->get_publication();
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/add_book',$data);
				$this->load->view('template/footer');
			}
		}
		else{
			$data['branch'] = $this->book_model->get_branch();
			$data['topic'] = $this->book_model->get_topic();
			$data['author'] = $this->book_model->get_author();
			$data['publication'] = $this->book_model->get_publication();
			$data['last_id'] = $this->book_model->fetch_last_id();
			$this->load->view('template/header');
			$this->load->view('book/add_detail');
			$this->load->view('book/add_book',$data);
			$this->load->view('template/footer');
		}
	}

	public function get_topic(){
		$branch=$_POST['branch'];
		$data['topic'] = $this->book_model->getTopic($branch);
	}

	public function get_author(){
		$topic = $_POST['topic'];
		$data['author'] = $this->book_model->getAuthor($topic);
	}

	public function add_branch(){
		$this->load->library("form_validation");
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('newbranch','Branch','required|trim');
			if($this->form_validation->run()!=FALSE){
				$branchnew = $_POST['newbranch'];
				$branchdata = array(
					'qbranch' => $branchnew
				);
				$data['success'] = $this->book_model->addBranch($branchdata);
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');
			}
			else{
				$data['error'] = "Validation Failed! Please try again.";
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');
			}
		}
		else{
			$this->load->view('template/header');
			$this->load->view('book/add_detail');
			$this->load->view('book/add_branch');
			$this->load->view('template/footer');
		}
	}

	public function add_topic(){
		$this->load->library("form_validation");
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('newbranch','Branch','required|trim');
			$this->form_validation->set_rules('newtopic','Topic','required|trim');
			if($this->form_validation->run()!=FALSE){
				$branchnew = $_POST['newbranch'];
				$topicnew = $_POST['newtopic'];
				$topicdata = array(
					'qbranch' => $branchnew,
					'qtopic' => $topicnew
				);
				$data['success'] = $this->book_model->addTopic($topicdata);
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');
			}
			else{
				$data['error'] = "Validation Failed! Please try again.";
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');
			}
		}
		else{
			$data['branch'] = $this->book_model->get_branch();
			$this->load->view('template/header');
			$this->load->view('book/add_detail');
			$this->load->view('book/add_topic',$data);
			$this->load->view('template/footer');
		}
	}

	public function add_publication(){
		$this->load->library("form_validation");
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('newpublication','Publication','required|trim');
			if($this->form_validation->run()!=FALSE){
				$publicationnew = $_POST['newpublication'];
				$publicationdata = array(
					'qpublication' => $publicationnew
				);
				$data['success'] = $this->book_model->addPublication($publicationdata);
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');
			}
			else{
				$data['error'] = "Validation Failed! Please try again.";
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');
			}
		}
		else{
			$this->load->view('template/header');
			$this->load->view('book/add_detail');
			$this->load->view('book/add_publication');
			$this->load->view('template/footer');
		}
	}

	/**
	 *
	 */
	public function add_author(){
		$this->load->library("form_validation");
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('newbranch','Branch','required|trim');
			$this->form_validation->set_rules('newtopic','Topic','required|trim');
			$this->form_validation->set_rules('newauthor','Author','required|trim');
			if($this->form_validation->run()!=FALSE){
				$branchnew = $_POST['newbranch'];
				$authornew = $_POST['newauthor'];
				$topicnew = $_POST['newtopic'];
				$authordata = array(
					'qbranch' => $branchnew,
					'qtopic' => $topicnew,
					'qauthor' => $authornew
				);
				$data['success'] = $this->book_model->addAuthor($authordata);
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');
			}
			else{
				$data['error'] = "Validation Failed! Please try again.";
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');
			}
		}
		else{
			$data['branch'] = $this->book_model->get_branch();
			$data['topic'] = $this->book_model->get_topic();
			$this->load->view('template/header');
			$this->load->view('book/add_detail');
			$this->load->view('book/add_author',$data);
			$this->load->view('template/footer');
		}
	}

	public function view_book(){
		$this->load->library('pagination');
		$this->load->library('table');
		$config['base_url'] = "http://localhost/lms/index.php/book/view_book";
		$config['per_page'] = 25;
		$config['num_links'] = 10;
		$config['total_rows'] = $this->db->get('book')->num_rows();
		$this->pagination->initialize($config);
		$viewdata['details'] = $this->db->get('book', $config['per_page'], $this->uri->segment(3));
		//$viewdata['details'] = $this->member_model->view_member();
		$this->load->view('template/header');
		$this->load->view('book/add_detail');
		$this->load->view('book/view_book',$viewdata);
		$this->load->view('template/footer');
	}

	public function add_novel(){
		$this->load->library("form_validation");
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('author','Author','required');
			$this->form_validation->set_rules('publication','Publication','required');
			$this->form_validation->set_rules('cost','Cost','required|trim|numeric');

			if($this->form_validation->run()!=FALSE){
				$type = $_POST['type'];
				$title = $_POST['title'];
				$author = $_POST['author'];
				$publication = $_POST['publication'];
				$cost = $_POST['cost'];
				$date = $_POST['date'];

				$noveldata = array(
					'qtype' => $type,
					'qtitle' => $title,
					'qauthor' => $author,
					'qpublication' => $publication,
					'qcost' => $cost,
					'qdate' => $date
				);

				$novelid = $this->book_model->add_novel($noveldata);
				$successadd['success'] = "".$novelid;
				$this->load->view('template/header');
				$this->load->view('template/msg',$successadd);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');

			}
			else{
				$data['error'] = "Validation error! Please try again with appropriate values";
				$data['author'] = $this->book_model->get_author();
				$data['publication'] = $this->book_model->get_publication();
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/add_novel',$data);
				$this->load->view('template/footer');
			}
		}
		else{
			$data['author'] = $this->book_model->get_author();
			$data['publication'] = $this->book_model->get_publication();
			$data['last_id'] = $this->book_model->fetch_last_id_novel();
			$this->load->view('template/header');
			$this->load->view('book/add_detail');
			$this->load->view('book/add_novel',$data);
			$this->load->view('template/footer');
		}

	}

	public function add_magazine(){
		$this->load->library("form_validation");
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('author','Author','required');
			$this->form_validation->set_rules('publication','Publication','required');
			$this->form_validation->set_rules('cost','Cost','required|trim|numeric');

			if($this->form_validation->run()!=FALSE){
				$type = $_POST['type'];
				$title = $_POST['title'];
				$author = $_POST['author'];
				$publication = $_POST['publication'];
				$cost = $_POST['cost'];
				$date = $_POST['date'];

				$magazinedata = array(
					'qtype' => $type,
					'qtitle' => $title,
					'qauthor' => $author,
					'qpublication' => $publication,
					'qcost' => $cost,
					'qdate' => $date
				);

				$magazineid = $this->book_model->add_magazine($magazinedata);
				$successadd['success'] = "".$magazineid;
				$this->load->view('template/header');
				$this->load->view('template/msg',$successadd);
				$this->load->view('book/successbook');
				$this->load->view('template/footer');

			}
			else{
				$data['error'] = "Validation error! Please try again with appropriate values";
				$data['author'] = $this->book_model->get_author();
				$data['publication'] = $this->book_model->get_publication();
				$this->load->view('template/header');
				$this->load->view('template/msg',$data);
				$this->load->view('book/add_magazine',$data);
				$this->load->view('template/footer');
			}
		}
		else{
			$data['author'] = $this->book_model->get_author();
			$data['publication'] = $this->book_model->get_publication();
			$data['last_id'] = $this->book_model->fetch_last_id_magazine();
			$this->load->view('template/header');
			$this->load->view('book/add_detail');
			$this->load->view('book/add_magazine',$data);
			$this->load->view('template/footer');
		}
	}

}

