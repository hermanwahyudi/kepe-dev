<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_notif extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('comment_model','', true);
		$this->load->library("pagination");
		$this->load->library('form_validation');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     if($session_data['role'] == 'superadmin' || $session_data['role'] == 'admin') {
		     	//$config = $this->page_config();

			     $data = array(
			     			'list_comment' => "", //$this->get_list_comment($config['uri'], $config['per_page']),
			     			'paging' => $this->pagination->create_links(),
			     			'success' => ""//$this->notification()
			     		);
			     $this->parser->parse('admin/comment/comment_list', $data);
		     } else {
		     	print_r("<h1>Authorization required.</h1>");
		     }
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}
}