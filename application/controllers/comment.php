<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set("Asia/Jakarta");

class Comment extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model("comment_model");
		$this->load->helper(array("url", "form"));
		//$this->load->library("menu");
		$this->load->library("parser");
	}
	
	public function index() {
		return 0;
	}

	function ajax_() {
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
			$d = $this->input->post(null, true);
			if(!empty($d['nick_name']) && !empty($d['body'])) { 
				//if($this->get_result_captcha($d['n1'], $d['op'], $d['n2']) == $d['answer']) {
					//unset($d['n1']); unset($d['n2']); unset($d['op']); unset($d['answer']);
				$type = $d['type']; unset($d['type']);
				$this->comment_model->post_comment($type, $d);
				if($type == "news")
					$id = $d['news_id'];
				if($type == "article")
					$id = $d['article_id'];
				if($type == "video")
					$id = $d['video_id'];

				$status = array('status' => true, 
		  					'msg' => 'Success',
		  					'get_comment' => $this->get_comment($type, $id, 1)
		  			);	
				/*} else {

					$status = array('status' => false, 
			  					'msg' => 'Invalid captcha.',
			  					'result' => $d['answer']
			  			);	
				}*/
				
			} else {
				$status = array('status' => false, 
			  					'msg' => 'Nick name and your comment is required.'
			  			);
			}
		} else {
			$status = array('status' => false, 
		  					'msg' => 'Comment not sent.'
		  			);
		}

		echo json_encode($status);
	}

	function get_comment($type='', $id='', $f=0) {
		$result = $this->comment_model->get_comment($type, $id, $f);

		if($result == false) {
			return "";
		} else {
			$data = "";
			foreach($result as $row) {
				$date = explode(" ", $row->created_date);

				$data .= "<div class='new-comment'><img style='margin-bottom: 10px;' class=''img-responsive' src='http://www.gravatar.com/avatar/' width='68' height='68' />";
				$data .= "<p>" . $this->get_time_elapsed_string($row->created_date) . " - " .date("d F Y", strtotime($date[0])) . "";
				$data .= ",&nbsp;";
				$data .= "Posted By " . $row->nick_name . "</p>";
				$data .= "<p>" . $row->body . "</p></div><br>";				
			}
		}
		return $data;
	}

	function random_set_captcha($op=1) {
		$n = rand(100, 999);
		if($op == 0) return $n;
		else {
			$op = rand(1, 3);
			switch($op) {
				case 1: return "+";
				case 2: return "-";
				case 3: return "*";
			}
		}
	}

	function get_result_captcha($n1, $op, $n2) {
		switch($op) {
			case $op == '+': return $n1 + $n2;
			case $op == '-': return $n1 - $n2;
			case $op == '*': return $n1 * $n2;
		}
	}

	function get_time_elapsed_string($datetime, $full=false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d/7);
	    $diff->d -= $diff->w*7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach($string as $k => &$v) {
	        if($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? "<em>" . implode(', ', $string) . " ago</em>" : "<em>Just now</em>";
	}

}
