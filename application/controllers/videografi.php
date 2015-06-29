<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videografi extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("about_model");
		$this->load->helper(array("url", "form"));
		$this->load->model('archives_model','', true);
		$this->load->model('video_model','', true);
		$this->load->model('category_video_model','', true);
		$this->load->library("parser");
		$this->load->library("menu");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data = $this->profile()->get_about_detail();
		$data['get_menu'] = $this->menu->get_menu("header", "videografi");
		$data['get_breadcrumb'] = $this->menu->get_menu("breadcrumb", "videografi");
		$data['get_video'] = $this->get_video_list();
		$data['get_video_category'] = $this->get_video_category_list();
		$data['get_archives_list'] = $this->get_archives_list();

		$this->generate('videografi/videografi', $data);
	}
	
	public function generate($view, $content = array())
	{
		$data = $content;
		$data['slider'] = "";
		$data['header']  = $this->parser->parse('templates/header', $content, TRUE);
		$data['content']  = $this->parser->parse($view, $content, TRUE);
		$data['footer']  = $this->parser->parse('templates/footer', $content, TRUE);
		
		$this->parser->parse('index', $data);
	}
	
	public function get_video_list($start=0, $limit=10) {
		$query = $this->video_model->get_video_list(1, $start, $limit);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			
			$img = "<p><a target='_blank' href='". base_url($path) ."'>";
			$img .= "<img class='img-responsive thumbnail' src='". base_url($path) ."' alt='".$title."' style='margin-top: 20px;'/>";
			$img .= "</a></p>";
			
			$title = "<h5 style='min-height: 41px;'><a href=''>".$title."</a></h5>";
			
			$data[$i] = array(
				"video_id" => !isset($q->video_id) ? "" : $q->video_id,
				"video_category_id" => !isset($q->video_category_id) ? "" : $q->video_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => $title,
				"description" => !isset($q->description) ? "" : $q->description,
				"path_video" => !isset($q->path_video) ? "" : $q->path_video,
				"duration" => !isset($q->duration) ? "" : $q->duration,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"category" => !isset($q->category) ? "" : $q->category,
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_video_category_list() {
		$query = $this->category_video_model->get_category(1);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$title = !isset($q->title) ? "" : $q->title;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='#'>".$title." (".$total.")</a></li>";
			
			$data[$i] = array(
				"video_category_id" => !isset($q->video_category_id) ? "" : $q->video_category_id,
				"list" => $list
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_archives_list() {
		$table = "video";
		
		$query = $this->archives_model->get_archives_list($table);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$month = !isset($q->month) ? "" : $q->month;
			$year = !isset($q->year) ? "" : $q->year;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='#'>".$month." ".$year." (".$total.")</a></li>";
			
			$data[$i] = array(
				"list" => $list
			 );
			 
			 $i++;
		}

 		return $data;
	}

	function view($id) {
		$q = $this->video_model->get_by_id($id);
		$title = $q->title_video;
		$q = $this->video_model->get_by_id($id);
 		$youtube_id = ""; $link = $q->url;
 		if(strpos($link, "v=")) {
 			$arr = explode("v=", $link);
 			$youtube_id = $arr[1];
 		}
 		$data = array_merge($this->profile()->get_about_detail(),
 					array("get_menu" => $this->menu->get_menu("header", "videografi"),
	 					"get_breadcrumb" => $this->menu->get_menu("breadcrumb", "videografi"),
	 					"get_video_category" => $this->get_video_category_list(),
	 					"get_archives_list" => $this->get_archives_list(),
 						"title_category" => $q->title_category,
	                    "title" => $q->title_video,
	                    "tag" => $q->tag,
	                    "status" => $q->status,
	                    "description" => $q->description,
	                    "story_ide" => $q->story_ide,
	                    "screenwriter" => $q->screenwriter,
	                    "film_director" => $q->film_director,
	                    "cameramen" => $q->cameramen,
	                    "artist" => $q->artist,
	                    "url" => "<iframe width='420' height='345'src='http://www.youtube.com/embed/". $youtube_id ."'></iframe> ",
	                    "duration" => $q->duration,
	                    "created_date" => $q->created_date,
	                    "modified_date" => $q->modified_date
	                ));

 		$this->generate('videografi/view_video', $data);
	}
	
	public function profile(){
		include ('about.php');
		
		return $obj = new about();
	}
}