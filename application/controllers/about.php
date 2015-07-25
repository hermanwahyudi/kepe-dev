<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("about_model");
		$this->load->model("user_model");
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->library("global_common");
		$this->load->library("menu");
	}

	/**
	 * Index Page for this controller.
	 */
	 
	 public function index()
	{
		$data = array_merge(
			$this->get_about_detail(), 
			$this->global_header(),
			$this->read($this->uri->segment(3))
		);
		
		$this->generate('about/static_content', $data);
	}
	
	public function global_header(){
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "about"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "about"),
			"meta_tag" => "Kepo About, KepoAbis, Kepo, Abis, Make you curious"
		);
		
		return $data;
	}

	function page() {
	 	if(!$this->uri->segment(3)) {
	 		redirect("about/page/history");
	 	} else {
	 		$this->index();	
	 	}
	 }
	
	public function read($parameter) {
		$q = $this->about_model->get_static_content($parameter);
		
		$title = !isset($q->title) ? "" : $q->title;
		$tag = !isset($q->tag) ? "" : $q->tag;
		
 		$data = array(
			"membership_list" => ($parameter == 'membership') ? $this->get_membership_list(0, 100) : NULL,
			"static_content_id" => !isset($q->static_content_id) ? "" : $q->static_content_id,
			"user_id" => !isset($q->user_id) ? "" : $q->user_id,
			"image_id" => !isset($q->image_id) ? "" : $q->image_id,
	 		"title" => $title,
			"tag" => $this->global_common->get_list_tag($tag),
	 		"parameter" => !isset($q->parameter) ? "" : $q->parameter,
	 		"summary" => !isset($q->summary) ? "" : $q->summary,
	 		"body" => !isset($q->body) ? "" : $q->body,
	 		"status" => !isset($q->status) ? "" : $q->status,
	 		"created_date" => !isset($q->created_date) ? "" : $q->created_date,
	 		"modified_date" => !isset($q->modified_date) ? "" : $q->modified_date,
	 		"full_name" => !isset($q->full_name) ? "" : $q->full_name
	     ); 
		
 		return $data;
	}
	
	public function get_about_detail() {
		$q = $this->about_model->get_detail();
		
	    $logo = !isset($q->logo) ? "" : $q->logo;
	    $img = "<div class='col-lg-4 col-md-6 col-xs-6 thumb'>";
		$img .= "<a target='_blank' class='thumbnail' href='". base_url() . "assets/img/" . $logo ."'>";
		$img .= "<img class='img-responsive' src='". base_url() . "assets/img/" . $logo ."'>";
		$img .= "</a></div>";

		$image = !isset($q->content_image) ? "" : $q->content_image;
		$content_image = "<img  class='img-responsive' alt='' src='". base_url() . "assets/img/" . $image ."'>";
		
		$site_name = !isset($q->title) ? "" : $q->title;
		$tagline = !isset($q->tagline) ? "" : $q->tagline;
	 	$contact_address = !isset($q->contact_address) ? "" : $q->contact_address;
	 	$contact_phone = !isset($q->contact_phone) ? "" : $q->contact_phone;
	 	$contact_email_address_first = !isset($q->contact_email_address_first) ? "" : $q->contact_email_address_first;
	 	$contact_city = !isset($q->contact_city) ? "" : $q->contact_city;
	 	$contact_zip = !isset($q->contact_zip) ? "" : $q->contact_zip;
	 	$contact_country = !isset($q->contact_country) ? "" : $q->contact_country;
	 	$created_year = !isset($q->created_year) ? "" : $q->created_year;
			
 		$data = array(
			"site_name" => $site_name,
			"tagline" => $tagline,
			"site_description" => !isset($q->description) ? "" : $q->description,
	 		"contact_address" => $contact_address,
	 		"contact_phone" => $contact_phone,
	 		"contact_phone_mobile_first" => !isset($q->contact_phone_mobile_first) ? "" : $q->contact_phone_mobile_first,
	 		"contact_phone_mobile_second" => !isset($q->contact_phone_mobile_second) ? "" : $q->contact_phone_mobile_second,
	 		"contact_email_address_first" => $contact_email_address_first,
	 		"contact_email_address_second" => !isset($q->contact_email_address_second) ? "" : $q->contact_email_address_second,
	 		"contact_fax" => !isset($q->contact_fax) ? "" : $q->contact_fax,
	 		"contact_lat" => !isset($q->contact_lat) ? "" : $q->contact_lat,
	 		"contact_long" => !isset($q->contact_long) ? "" : $q->contact_long,
	 		"contact_city" => $contact_city,
	 		"contact_state" => !isset($q->contact_state) ? "" : $q->contact_state,
	 		"contact_zip" => $contact_zip,
	 		"contact_country" => $contact_country,
	 		"contact_facebook" => !isset($q->contact_facebook) ? "" : $q->contact_facebook,
	 		"contact_twitter" => !isset($q->contact_twitter) ? "" : $q->contact_twitter,
	 		"contact_googleplus" => !isset($q->contact_googleplus) ? "" : $q->contact_googleplus,
	 		"contact_youtube" => !isset($q->contact_youtube) ? "" : $q->contact_youtube,
	 		"contact_instagram" => !isset($q->contact_instagram) ? "" : $q->contact_instagram,
	 		"contact_path" => !isset($q->contact_path) ? "" : $q->contact_path,
	 		"content_title" => !isset($q->content_title) ? "" : $q->content_title,
	 		"content_body" => !isset($q->content_body) ? "" : $q->content_body,
	 		"content_mission" => !isset($q->content_mission) ? "" : $q->content_mission,
	 		"content_image" => $content_image,
	 		"background_color" => !isset($q->background_color) ? "" : $q->background_color,
	 		"created_year" => $created_year,
	 		"version" => !isset($q->version) ? "" : $q->version,
	 		"contact_footer" => "<a href='".base_url('home')."'>".$site_name."</a> &copy; ".$created_year." - ".date('Y')."<br>Haamill Productions<br><br><i class='glyphicon glyphicon-road'></i>&nbsp;".$contact_address.", ".$contact_city." ".$contact_zip."<br><i class='glyphicon glyphicon-map-marker'></i>&nbsp;".$contact_country."<br><br><p><i class='glyphicon glyphicon-phone'></i>&nbsp;Phone: ".$contact_phone."<br><i class='glyphicon glyphicon-envelope'></i>&nbsp;Email: <a href='mailto:#'>".$contact_email_address_first."</a></p>",
	 		"footer" => !isset($q->footer) ? "" : $q->footer, 
	 		"user_id" => !isset($q->user_id) ? "" : $q->user_id,
	 		"logo_image" => $img,
	 		"logo_name" => $logo, 
	 		"setting_id" => !isset($q->setting_id) ? "" : $q->setting_id,
	 		"membership" => base_url('about/page/membership'),
	 		"organization" => base_url('about/page/organization'),
	 		"history" => base_url('about/page/history'),
	     ); 
		
 		return $data;
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
	
	 function get_membership_list($start, $limit) {
	 	$result = $this->user_model->get_user_list($start, $limit, 1);
	 	$data_array = ""; $i = 1;
		$number = 0;

	 	if($result) {
	 		foreach($result as $row) {
				$number =  $start + $i;
				
		 		$id = $row->user_id;
	        	$data_array .= "<tr><td>" . $number.".&nbsp;" . "</td>";
	        	$data_array .= "<td>" . $row->nama_lengkap . "</td>";

	        	$i++;
	        }
	        return "<table/>".$data_array . "</tr></table>";
	 	} else return "";
	 }
}