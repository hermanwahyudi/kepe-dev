<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->library("menu");
		$this->load->library('email');
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$this->view();
	}
	
	public function generate($view, $content = array())
	{
		$data = array(
			'slider' => $this->menu->get_page_title($content['title']),
			'map' => NULL,
			'header' => $this->parser->parse('templates/header', $content, TRUE),
			'content' => $this->parser->parse($view, $content, TRUE),
			'footer' => $this->parser->parse('templates/footer', $content, TRUE)
		);
		
		$data = array_merge($content, $data);
		
		$this->parser->parse('index', $data);
	}
	
	public function view($flag=0){	
		$alert = "";
		
		if($flag != 0){
			$name = $this->input->post('name', TRUE);
			$email = $this->input->post('email', TRUE);
			$subject = $this->input->post('subject', TRUE);
			$message = $this->input->post('message', TRUE);
			
			$this->email->from($email, $name);
			$this->email->to('hi@kepoabis.com');

			$this->email->subject($subject);
			$this->email->message("<p>".$message."</p>");
			
			if($this->email->send()){ $success['send'] = true;}
			else{
				$success['reply_to'] = false; 
				#show_error($this->email->print_debugger());
			}
			
			$this->email->from('hi@kepoabis.com', 'Hi');
			$this->email->to($email);

			$this->email->subject("[KONFIRMASI]");
			$this->email->message("<p>
					Dear ".$name.",
					<br>
					<br>Anda (atau seseorang) baru saja mengirimkan pesan menggunakan alamat email ".$email." ke kontak kami.
				</p>
				<p>
					Terima kasih,
					<br>
					<br>Jalan Pelita RT 02/09 No. 69 Kel. Tengah, Kec. Kramat Jati, Jakarta Timur 13540, Indonesia
					<br><a href='http://kepoabis.com'>KepoAbis.com</a> by Haamill Productions
					<br>Phone: 085697309204
					<br>Email: hi@kepoabis.com
				</p>");
			
			if($this->email->send()){ $success['reply_to'] = true; }
			else{ 
				$success['reply_to'] = false; 
				#show_error($this->email->print_debugger());
			}
			
			if($success['reply_to'] && $success['reply_to']){
				$alert = "<div class='alert alert-success' role='alert'>Success</div>";
			}
			else{
				$alert = "<div class='alert alert-danger' role='alert'>Error!</div>";
			}
		}
		
		$data = array_merge(
			array(
				'get_menu' => $this->menu->get_menu("header", "contact"),
				'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "contact"),
				'sending_message' => base_url('contact/view/1'),
				'alert' => $alert,
				"title" => 'Contact Us'
			),
			$this->profile()->get_about_detail()
		);
		
		$this->generate('contact', $data);
	}
	
	public function profile(){
		include ('about.php');
		
		return $obj = new about();
	}
}