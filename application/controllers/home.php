<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("home_model");
		$this->load->helper(array("url", "form"));
		$this->load->library("menu");
		$this->load->library("parser");
		$this->load->library("global_common");
	}

	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{	
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "home"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "home"),
			'get_video' => $this->get_video(),
			'get_article' => $this->get_article(),
			'get_news' => $this->get_news(),
			'title' => 'Home',
			"meta_tag" => "KepoAbis, Kepo, Abis, Make you curious"
		);
		
		$data = array_merge($this->profile()->get_about_detail(), $data);
		
		$this->generate('home', $data);
	}
	
	public function generate($view, $content = array())
	{
		$data = array(
			'header' => $this->parser->parse('templates/header', $content, TRUE),
			'slider' => $this->parser->parse('templates/slider', $content, TRUE),
			'content' => $this->parser->parse($view, $content, TRUE),
			'map' => $this->parser->parse('map', $content, TRUE),
			'footer' => $this->parser->parse('templates/footer', $content, TRUE)
		);
		
		$data = array_merge($content, $data);
		
		$this->output->cache(15); // cache about 15 minutes
		$this->parser->parse('/index', $data);
	}
	
	public function get_news(){
		$query = $this->home_model->get_recent_news();

		$i = 0;
		foreach ($query->result() as $q)
		{
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			
			$year = !isset($q->year) ? 0 : $q->year;
			$month = !isset($q->month) ? 0 : $q->month;
			$day = !isset($q->day) ? 0 : $q->day;
				
			$news_id = !isset($q->news_id) ? "" : $q->news_id;
			$read_more = base_url("news/read/" .  $year.'/'.$month.'/'.$day.'/'.$news_id . "/" . $this->slug($title) . "");
			$img = "<a target='_blank' class='thumbnail' href='". base_url($path) ."'>";
			$img .= "<img class='img-responsive' src='". base_url($path) ."' alt='".$title."'/>";
			$img .= "</a>";
			
			$data[$i] = array(
				"article_id" => !isset($q->news_id) ? "" : $q->news_id,
				"article_category_id" => !isset($q->news_category_id) ? "" : $q->news_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => "<a data-toggle='tooltip' data-placement='top' title='".$title."' href='" . $read_more . "'>".$this->global_common->get_title(28, $title)."</a>",
				"summary" => !isset($q->summary) ? "" : $this->get_preview_summary($q->summary, $read_more, "x"),
				"full_name" => !isset($q->nama_lengkap) ? "" : "By ".$q->nama_lengkap,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"img" => "<img src='". base_url($path) ."' alt='".$title."'/>",
				"category" => !isset($q->category) ? "" : "In <a href='".base_url('news/page/0/0/'.$q->category)."'>".$q->category."</a>"
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_article(){
		$query = $this->home_model->get_recent_article();
		
		$i = 0;
		if ($query != false) {
			foreach ($query->result() as $q) {
				$path = !isset($q->path_image) ? "" : $q->path_image;
				$title = !isset($q->title) ? "" : $q->title;
				
				$year = !isset($q->year) ? 0 : $q->year;
				$month = !isset($q->month) ? 0 : $q->month;
				$day = !isset($q->day) ? 0 : $q->day;
			
				$article_id = !isset($q->article_id) ? "" : $q->article_id;
				$read_more = base_url("article/read/" .  $year.'/'.$month.'/'.$day.'/'.$article_id . "/" . $this->slug($title) . "");
				
				$img = "<a target='_blank' class='thumbnail' href='". base_url($path) ."'>";
				$img .= "<img class='img-responsive' src='". base_url($path) ."' alt='".$title."'/>";
				$img .= "</a>";
				
				$data[$i] = array(
					"article_id" => $article_id,
					"article_category_id" => !isset($q->article_category_id) ? "" : $q->article_category_id,
					"image_id" => !isset($q->image_id) ? "" : $q->image_id,
					"title" => "<a data-toggle='tooltip' data-placement='top' title='".$title."' href='". $read_more ."'>".$this->global_common->get_title(45, $title)."</a>",
					"summary" => !isset($q->summary) ? "" : $this->get_preview_summary($q->summary, $read_more, "x"),
					"full_name" => !isset($q->nama_lengkap) ? "" : "By " . $q->nama_lengkap,
					"created_date" => !isset($q->created_date) ? "" : $q->created_date,
					"image" => $img,
					"img" => "<img src='". base_url($path) ."' alt='".$title."'/>",
					"category" => !isset($q->category) ? "" : "In <a href='".base_url('article/page/0/0/'.$q->category)."'>".$q->category."</a>",
					"no_recent_art" => ""
				 );
				 
				 $i++;
			}

	 		return $data;
		} return array(array("no_recent_art"=> "No recent Articles.",
					"title" => "",
					"created_date" => "",
					"summary" => "",
					"full_name" => "",
					"category" => "",
					"image" => ""

			));	
	}
	
	public function get_video(){
		$query = $this->home_model->get_recent_video();
		
		$i = 0;

		foreach ($query->result() as $q)
		{
			$video_id= !isset($q->video_id) ? "" : $q->video_id;
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			$year = !isset($q->year) ? 0 : $q->year;
			$month = !isset($q->month) ? 0 : $q->month;
			$day = !isset($q->day) ? 0 : $q->day;
			
			$img = "<a target='_blank' href='". base_url($path) ."'>";
			$img .= "<img class='img-responsive' src='". base_url($path) ."' alt='".$title."' style='width: 536px;float: right; margin-top: 20px;'/>";
			$img .= "</a>";
			$view_more = "<a href='".base_url('videografi/view/'.$year.'/'.$month.'/'.$day.'/'.$video_id.'/'. $this->slug($title))."' class='button medium yellow'>View</a>";
			
			$data[$i] = array(
				"video_id" => $video_id,
				"video_category_id" => !isset($q->video_category_id) ? "" : $q->video_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => $title,
				"description" => !isset($q->description) ? "" : $this->get_preview_summary($q->description, $view_more),
				"path_video" => !isset($q->path_video) ? "" : $q->path_video,
				"duration" => !isset($q->duration) ? "" : $q->duration,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"url" => $view_more,
				"category" => !isset($q->category) ? "" : $q->category,
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function profile() {
		include ('about.php');
		
		return $obj = new about();
	}

	function slug($str='') {
		return strtolower(preg_replace('/[\s\/\&\%\#\,\.\)\(\$]/', '-', $str));
	}

	function get_preview_summary($text, $see_more, $f='video') {
		$words = explode(" ", $text);
		$N = 20;
		if(count($words) > $N) {
			$text = "";
			for($i=0; $i < $N; $i++) {
				$text .= $words[$i] . " ";
			}
			$link = ($f != 'video') ? "<br><a href='".$see_more."'>Read more</a>" : "";
			$text .= "[...] " . $link;
		}

		return $text;
	}
}
