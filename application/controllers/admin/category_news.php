<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_news extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('category_news_model','', true);
		$this->load->library("pagination");
		$this->load->library('form_validation');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');

		     $config = $this->page_config();

		     $data = array(
		     			'list_category_news' => $this->get_list_category_news($config['uri'], $config['per_page']),
		     			'link' => $this->pagination->create_links(),
		     			'success' => $this->notification()
		     		);
		     
		     $this->parser->parse('admin/category/news/category_news_management', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}

	function get_list_category_news($start, $limit, $keyword='') {
		$result = $this->category_news_model->get_list_category($start, $limit);
	 	$data_array = ""; $i = 1;
	 	if($result) {
	 		foreach($result as $row) {
		 		$id = $row->news_category_id;
	        	$data_array .= "<tr><td>" . $id . "</td>";
	        	$data_array .= "<td>" . $row->title . "</td>";
	        	$data_array .= "<td>" . $row->body . "</td>";
	        	$data_array .= "<td>" . $row->created_date . "</td>";
	        	$data_array .= "<td>" . $row->modified_date . "</td>";
	        	$data_array .= "<td><a href='". base_url()."admin/category-news/detail/".$id."'>Detail</a>&nbsp;<a href='". base_url()."admin/category-news/update/".$id."'>Edit</a>&nbsp;<a href='". base_url() ."admin/category-news/delete/".$id."' onclick='return ConfirmDelete();'>Delete</a></td></tr>";
	        	$i++;
	        }
	        return $data_array . "</tr>";	
	 	} else return "";
	}

	function page_config() {
	 	$config['base_url'] = base_url() . "admin/category-news/page";
		$config['per_page'] = 5;
	 	$config['total_rows'] = $this->category_news_model->count_category_news();
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = true;
			
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		return array("uri" => $page, 
					"per_page" => $config['per_page']);
	 }

	 function page() {
	 	if(!$this->uri->segment(4)) {
	 		redirect("admin/category-news");
	 	} else {
	 		$this->index();	
	 	}
	 }

	function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == "delete") {
				$notif = $t['title'] . " has been deleted successfully.";
			} else if($t['success'] && $t['f'] == 'update') {
				$notif = $t['title'] . " has been updated successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }

	function create() {
		if($this->session->userdata('logged_in')) {
			$sess_data = $this->session->userdata('logged_in');
	 		$data = array("success" => false, 
	 					"error_message" => "", 
	 					"flag" => "create"
	 				);

	        $this->validation();

	        if($this->form_validation->run() == true) {
			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		$d['image_id'] = 0;
			 		$this->category_news_model->create_category_news($d);
			 		$data['success'] = true;
			 		$this->load->view("admin/category/news/create_category_news", $data);
			 	}
		 	} else {
		 		$this->load->view("admin/category/news/create_category_news", $data);	
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function detail($id='') {
		if($this->session->userdata('logged_in')) {
	 		$q = $this->category_news_model->get_by_id($id);
	 		$data = array("title" => $q->title,
		 				"body" => $q->body, 
		 				"created_date" => $q->created_date,
		 				"modified_date" => $q->modified_date
		     		);
	 		$this->parser->parse('admin/category/news/detail_category_news', $data);
	 	} else {
	 		direct('admin/login', 'refresh');
	 	}
	}

	function update($id='') {
		if($this->session->userdata('logged_in')) {
	        $this->validation();

	        if($this->form_validation->run() == true) {
			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		unset($d['submit']);
			 		$this->category_news_model->update_category_news($d['news_category_id'], $d);
			 		$t = array("success" => true,
			 				"title" => $d['title'],
			 				"f" => "update"
			 			);
			 		$this->session->set_userdata("t", $t);
			 		redirect('admin/category-news');
			 	}
		 	} else {
		 		$r = $this->category_news_model->get_by_id($id);
		 		$e = $this->session->userdata("error_message") ?  $this->session->userdata("error_message") : "";
		 		$data = array("news_category_id" => $r->news_category_id,
		 				"title" => $r->title,
		 				"body" => $r->body,
		 				"flag" => "update",
		 				"error_message" => $e
		 			);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/category/news/update_category_news', $data);
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function delete($id='') {
		if($this->session->userdata('logged_in')) {
	 		$r = $this->category_news_model->get_by_id($id);
	 		$this->category_news_model->delete_category_news($id);
	 		$t = array("success" => true,
	 				"title" => $r->title,
	 				"f" => "delete"
	 			);
	 		$this->session->set_userdata("t", $t);
	 		redirect('admin/category-news');
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	}

	function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
	 }

}