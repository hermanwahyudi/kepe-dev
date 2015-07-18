<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("./././api/cloudinary/Cloudinary.php");
require_once("./././api/cloudinary/Uploader.php");
require_once("./././api/cloudinary/Api.php");

require_once("./././api/config_api_key.php");

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

		    $path_image = !strpos($q->image, "cloudinary") ? base_url() . "assets/img/team/" . $q->image : $q->image;

		    $img = "<div class='col-lg-4 col-md-6 col-xs-6 thumb'>";
			$img .= "<a target='_blank' class='thumbnail' href='". $path_image ."'>";
			$img .= "<img class='img-responsive' src='". $path_image ."'>";
			$img .= "</a></div>";
	 		$data = array("username" => $q->user_name,
		 				"nama_lengkap" => $q->nama_lengkap,
		 				"email" => $q->email,
		 				"position" => $q->position,
		 				"role" => $q->user_role,
		 				"description" => $q->body,
		 				"image" => $img
		     		);
	 		$this->parser->parse('admin/profile/view_profile', $data);
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	}


	 function upload_to_cdn($files) {
	 	try {
			if(isset($_POST['submit'])) {
	 			$cloud = new \Cloudinary\Uploader();
	 			$result = (object) $cloud->upload($files,
	 					array("use_filename" => true)
	 				);
	 			if(!empty($result->signature)) {
	 				return array("status" => 1, "secure_url" => $result->secure_url, "f" => "generate");
	 			}
	 		}
		} catch(Exception $e) {
			if(!empty($files))
				return array("status" => 0, "error_message" => $e->getMessage());
			return array("status" => 1, "f" => "default");
		}
	 }

	 function delete_image_cdn($img) {
		if(strpos($img, "cloudinary")) {
 			$x = explode("/", $img);
 			$y = explode(".", $x[count($x)-1]);
 			if($y[0] != "default") {
 				\Cloudinary\Uploader::destroy($y[0], 
 					array("invalidate" => true)
 				);	
 			}
 		}
	 }

	function update() {
		if($this->session->userdata('logged_in')) {
		    $session_data = $this->session->userdata('logged_in');

		    $img_name = "";
	        $this->validation("update_profile");

	        if($this->form_validation->run() == true) {
	 			//$t = $this->upload();

			 	$t = $this->upload_to_cdn($_FILES['userfile']['tmp_name']);

			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		unset($d['submit']);
			 		$q = $this->user_model->get_by_id($d['user_id']);
			 		if($t['status'] == 1 && $t['f'] == "generate") {
			 			$d['image'] = $t['secure_url']; //$t['data']['file_name'];
			 			if($q->image != null) {
			 				//unlink(base_url() . "assets/img/team/" . $q->image);
			 				$this->delete_image_cdn($q->image);
			 			} 
			 		} else if($t['status'] == 1 && $t['f'] == "default") {
			 			$d['image'] = $q->image == null ? $default : $q->image;
			 		} else if($t['status'] == 0) {
		 				$data = array("error_message" => "<span style='color:red'>" . $t['error_message'] . "</span><br><br>");
	 					$this->session->set_userdata("error_message", $data['error_message']);
	 					redirect("admin/profile/update");	
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
		 				"image" => $r->image,
		 				"flag" => "update",
		 				"error_message" => $e,
		 				"success" => $success
		 			);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/profile/update_profile', $data);
		 	}

		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function password() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data = array("success" => "", "error_message" => "");

			$this->validation("change_password");		

	        if($this->form_validation->run() == true) {
	        	$post = $this->input->post(null, true);
	        	if($post['new_password'] == $post['confirm_password']) {
	        		$this->user_model->change_password($session_data['id'], $post['new_password']);
	        		$t = array(
	        				"success" => true,
	        				"f" => "change_password"
	        			);
	        		$this->session->set_userdata("t", $t);
	        		redirect('admin/profile/password');
	        	} else {
	        		$data = array("error_message" => "<span style='color:red'>New password isn't same with confirm password.</span>");
		 			$this->session->set_userdata("error_message", $data['error_message']);
		 			redirect("admin/profile/password");	
	        	}
	        } else {
	        	$e = $this->session->userdata("error_message") ?  $this->session->userdata("error_message") : "";
	        	$data = array(
	        			"success" => $this->notification(),
	        			"error_message" => $e
	        		);
	        	$this->session->unset_userdata("error_message");
	        	$this->load->view('admin/profile/update_password', $data);
	        }
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function check_password_db($password) {
		$sess = $this->session->userdata("logged_in");
		$result = $this->user_model->check_password($sess['id'], $password);
		if($result) return true;
		else {
			$this->form_validation->set_message('check_password_db', "<span style='color:red'>Invalid old password.</span>");
			return false;
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
			if($t['success'] && $t['f'] == 'change_password') {
				$notif = "Your password has been updated successfully.";
			}
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }

	function validation($param) {
		if($param == "update_profile") {
			$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
		 	$this->form_validation->set_rules('user_name', 'Username', 'required|xss_clean');
		 	$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|xss_clean');
		 	$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');   	
		} else if ($param == "change_password") {
			$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
			$this->form_validation->set_rules('new_password', 'New Password', 'required|xss_clean');
			$this->form_validation->set_rules('old_password', 'Old Password', 'required|xss_clean|callback_check_password_db');
			$this->form_validation->set_rules('confirm_password', 'Confirmation Password', 'required|xss_clean');
		}
	 	
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
			chmod($data['full_path'], 0777);
			return array("is_uploaded" => true, 
						"data" => $data);
		} return array("is_uploaded" => false, 
						"data"=> $data, 
						"error_message" => $this->upload->display_errors());
	 }

}