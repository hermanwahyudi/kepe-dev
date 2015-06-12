<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('user_model','', true);
		$this->load->library('form_validation');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		    $session_data = $this->session->userdata('logged_in');
		    $q = $this->user_model->get_by_id($session_data['id']);

		    $img = "<img src='" . base_url() . "assets/img/team/" . $q->image . "' height='100' width='100' />";
	 		$data = array(
		     			"username" => $q->user_name,
		 				"nama_lengkap" => $q->nama_lengkap,
		 				"email" => $q->email,
		 				"position" => $q->position,
		 				"role" => $q->user_role,
		 				"description" => $q->body,
		 				"image" => $img
		     		);
	 		$this->parser->parse('admin/profile/view_profile', $data);
	 	} else {
	 		direct('admin/login', 'refresh');
	 	}
	}

	function update() {
		if($this->session->userdata('logged_in')) {
		    $session_data = $this->session->userdata('logged_in');

		    $img_name = "";
	        $this->validation();

	        if($this->form_validation->run() == true) {
	 			$t = $this->upload();

			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		unset($d['submit']);
			 		$q = $this->user_model->get_by_id($d['user_id']);
			 		if($t['is_uploaded']) {
			 			$d['image'] = $t['data']['file_name'];
			 			if($q->image != null) {
			 				//unlink(base_url() . "assets/img/team/" . $q->image);
			 			} 
			 		} else if(!$t['is_uploaded']) {
			 			if(empty($t['data']['file_name'])) {
			 				$d['image'] = $q->image == null ? "default.jpg" : $q->image;
			 			} else {
			 				$data = array("error_message" => "<span style='color:red'>" . $t['error_message'] . "</span>");
		 					$this->session->set_userdata("error_message", $data['error_message']);
		 					redirect("admin/profile/update");	
			 			}	
			 		}

			 		$this->user_model->update_user($d['user_id'], $d);
			 		$t = array("success" => true,
			 				"username" => $d['user_name'],
			 				"f" => "update"
			 			);
			 		$this->session->set_userdata("t", $t);
			 		redirect('admin/profile/update');
			 	}
		 	} else {
		 		$r = $this->user_model->get_by_id($session_data['id']);
		 		$success = $this->notification();
		 		$e = $this->session->userdata("error_message") ?  $this->session->userdata("error_message") : "";
		 		$data = array("user_id" => $r->user_id,
		 				"username" => $r->user_name,
		 				"nama_lengkap" => $r->nama_lengkap,
		 				"email" => $r->email,
		 				"position" => $r->position,
		 				"description" => $r->body,
		 				"flag" => "update",
		 				"error_message" => $e,
		 				"success" => $success
		 			);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/profile/update_profile', $data);
		 	}

		} else {
			direct('admin/login', 'refresh');
		}
	}

	function password() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data = array("success" => false, "error_message" => "");

			$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
			$this->form_validation->set_rules('new_password', 'New Password', 'required|xss_clean');
			$this->form_validation->set_rules('old_password', 'Old Password', 'required|xss_clean');
			$this->form_validation->set_rules('confirm_password', 'Confirmation Password', 'required|xss_clean');

	        if($this->form_validation->run() == true) {

	        } else {
	        	$this->load->view('admin/profile/update_password', $data);
	        }
		} else {
			direct('admin/login', 'refresh');
		}
	}

	function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == 'update') {
				$link = "<strong><a href='" . base_url() . "admin/profile' >" . $t['username'] . "</a></strong>"; 
				$notif = $link . " has been updated successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }

	function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('user_name', 'Username', 'required|xss_clean');
	 	$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|xss_clean');
	 	$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
	    
	 }

	 function upload() {
	 	$config['upload_path'] = './assets/img/team/';
		$config['allowed_types'] = 'jpg|gif|jpeg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		$uploaded = $this->upload->do_upload();
		$data = $this->upload->data();
		if($uploaded) {
			return array("is_uploaded" => true, "data" => $data);
		} return array("is_uploaded" => false, "data"=> $data, "error_message" => $this->upload->display_errors());
	 }

}