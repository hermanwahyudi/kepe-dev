<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'controllers/comment.php');

class Videografi extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model('archives_model','', true);
		$this->load->model('video_model','', true);
		$this->load->model('category_video_model','', true);
		$this->load->library("parser");
		$this->load->library("global_common");
		$this->load->library("pagination");
		$this->load->library("menu");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{	
		$keyword = array(
			'year' => ($this->uri->segment(3)) ? $this->uri->segment(3) : 0,
			'month' => $this->uri->segment(4) ? $this->uri->segment(4) : 0,
			'category' => $this->uri->segment(5) ? str_replace('%20', ' ', $this->uri->segment(5)) : 0
		);

		$config = $this->table_pagination($keyword);
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "videografi"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "videografi"),
			'get_video' => $this->get_video_list($config['start'], $config['per_page'], $keyword),
			'get_video_category' => $this->get_video_category_list(),
			'get_archives_list' => $this->get_archives_list(),
			'page' => $config['page'],
			"title" => "Videografi",
			"meta_tag" => "Kepo Video, KepoAbis, Kepo, Abis, Make you curious"
		);
		
		$data = array_merge($this->profile()->get_about_detail(), $data);
		
		$this->generate('videografi/videografi', $data);
	}
	
	function get_video_image($id) {
		$r = $this->video_model->get_image($id);
		return ($r != false) ? array("image_id" => $r->image_id, "path" => $r->path) : array("image_id" => 0, "path" => "");
	}
	
	public function generate($view, $content = array())
	{
		$data = array(
			$content,
			'slider' => $this->menu->get_page_title($content['title']),
			'map' => NULL,
			'header' => $this->parser->parse('templates/header', $content, TRUE),
			'content' => $this->parser->parse($view, $content, TRUE),
			'footer' => $this->parser->parse('templates/footer', $content, TRUE)
		);
		
		$data = array_merge($content, $data);
		
		$this->parser->parse('index', $data);
	}
	
	public function get_video_list($start=0, $limit=10, $keyword=array()) {	
		$query = $this->video_model->get_video_list(1, $start, $limit, $keyword);
		if($query != NULL){
			$i = 0; $parenthesis = 1;
			
			foreach ($query->result() as $q)
			{
				$video_id = !isset($q->video_id) ? "" : $q->video_id;
				$path = !isset($q->path_image) ? "" : $q->path_image;
				$title = !isset($q->title) ? "" : $q->title;
				$tag = !isset($q->tag) ? "" : $q->tag;
				
				$year = !isset($q->year) ? 0 : $q->year;
				$month = !isset($q->month) ? 0 : $q->month;
				$day = !isset($q->day) ? 0 : $q->day;
				
				$img = "<a target='_blank' href='". base_url($path) ."'>";
				$img .= "<img class='img-responsive opacity' src='". base_url($path) ."' alt='".$title."'/>";
				$img .= "</a>";
				
				$view = base_url('videografi/view/'.$year.'/'.$month.'/'.$day.'/'.$video_id.'/'.$this->slug($title));
				$title = "<a data-toggle='tooltip' data-placement='top' title='".$title."' href='".$view."'>".$this->global_common->get_title(26, $title)."</a>";
				
				$category = !isset($q->category) ? "" : $q->category;
				$recent_video_category = "<a href='".base_url('videografi/page/0/0/'.$category)."'>".$category."</a>";
				
				$open_parenthesis =  ($parenthesis % 3 == 1) ? "<div class='col-md-12'><div class='row'>" : "";
				$closing_parenthesis = ($parenthesis % 3 == 0) ? "</div></div>" : "";
				
				$data[$i] = array(
					"video_id" => $video_id,
					"video_category_id" => !isset($q->video_category_id) ? "" : $q->video_category_id,
					"image_id" => !isset($q->image_id) ? "" : $q->image_id,
					"title" => $title,
					"tag" => $this->global_common->get_list_tag($tag, 'video'),
					"description" => !isset($q->description) ? "" : $q->description,
					"full_name" => !isset($q->full_name) ? "" : $q->full_name,
					"path_video" => !isset($q->path_video) ? "" : $q->path_video,
					"duration" => !isset($q->duration) ? "" : $q->duration,
					"created_date" => !isset($q->created_date) ? "" : $q->created_date,
					"image" => $img,
					"recent_video_category" => $recent_video_category,
					"count_video_comment" => $this->video_model->count_video_comment($video_id)->count_video_comment,
					"count_video_stat" => $this->video_model->count_video_stat($video_id)->count_video_stat,
					"open_parenthesis" => $open_parenthesis,
					"closing_parenthesis" => $closing_parenthesis,
				 );
				 
				 $i++; $parenthesis++;
			}
		}
		else{
			$data = NULL;
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
			
			$active = ($title == $this->uri->segment(5)) ? "class='active'" : "";
			
			$r = $this->global_common->get_length_title(5, $title);
			
			$list = "<li ".$active."><a href='".base_url('videografi/page/0/0/'.$title)."' data-toggle='tooltip' data-placement='top' title='".$title."(".$total.")'>".$title."</a></li>";

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
	
 		return $this->global_common->archives($query, 'videografi');
	}

	function view($year, $month, $day, $id, $slug = "") {
		$q = $this->video_model->get_by_id(1, $id);
		
		$comment = new Comment();
		$prev_next = $this->prev_next($id);

 		$youtube_id = ""; $link = $q->url;
 		if(strpos($link, "v=")) {
 			$arr = explode("v=", $link);
 			$youtube_id = $arr[1];
 		}
		
		$title_category = $q->title_category;
		$category = "<a href='".base_url('videografi/page/0/0/'.$title_category)."'>".$title_category."</a>";
		
		$tag = !isset($q->tag) ? "" : $q->tag;
		
 		$data = array_merge(
			$this->profile()->get_about_detail(),
 			array(
				"get_menu" => $this->menu->get_menu("header", "videografi"),
	 			"get_breadcrumb" => $this->menu->get_menu("breadcrumb", "videografi"),
	 			"get_video_category" => $this->get_video_category_list(),
	 			"get_archives_list" => $this->get_archives_list(),
	 			"get_video" => $this->get_video_list(0, 5, NULL),
 				"title_category" => $category,
	            "title" => $q->title_video,
	            "tag" => $this->global_common->get_list_tag($tag, 'video', 'btn'),
	            "meta_tag" => $this->global_common->get_list_tag($tag, 'video', 'metadata'),
	            "status" => $q->status,
	            "description" => $q->description,
	            "story_ide" => $q->story_ide,
	            "screenwriter" => $q->screenwriter,
	            "film_director" => $q->film_director,
	            "cameramen" => $q->cameramen,
	            "artist" => $q->artist,
	            "url" => "<div class='embed-responsive embed-responsive-16by9' style='margin-bottom: 10px;'><iframe class=embed-responsive-item' src='//www.youtube.com/embed/".$youtube_id."?rel=0'></iframe></div>",
	            "duration" => $q->duration,
				"full_name" => $q->full_name,
	            "created_date" => $q->created_date,
	            "modified_date" => $q->modified_date,
	            "get_comment" => $comment->get_comment("video", $id),
 				"n1" => $comment->random_set_captcha(0),
 				"op" => $comment->random_set_captcha(),
 				"n2" => $comment->random_set_captcha(0),
 				"prev_next" => $prev_next,
 				"video_id" => $id,
				"count_video_comment" => $this->video_model->count_video_comment($id)->count_video_comment,
				"count_video_stat" => $this->video_model->count_video_stat($id)->count_video_stat
	        )
		);
		
		$this->video_model->create_video_stat($this->global_common->stat('video_id', $id));
		
 		$this->generate('videografi/view', $data);
	}
	
	function prev_next($current_id) {
		$result = $this->video_model->get_rank();
		$count = $this->video_model->count_video();
		$rank = 0;
		foreach($result as $k) {
			if($current_id == $k->video_id) {
				$rank = $k->i;
				break;
			}
		}
		
		if($rank > 0 && $rank < $count-1) {
			$p = $this->video_model->get_one_row($rank-1);
			$prev = "<li><a href='". base_url("videografi/view/" .  $p->year.'/'.$p->month.'/'.$p->day.'/'.$p->video_id . "/" . $this->slug($p->title) . "")."'"
					."aria-label='Previous'><span aria-hidden='true'>&laquo; Previous</span></a></li>";
			$p = $this->video_model->get_one_row($rank+1);
			$next = "<li><a href='".base_url("videografi/view/" .  $p->year.'/'.$p->month.'/'.$p->day.'/'.$p->video_id . "/" . $this->slug($p->title) . "")."'"
					."aria-label='Next'><span aria-hidden='true'>Next &raquo;</span></a></li>";
			return $prev . $next;
		}
		if($count-1 == $rank) {
			$p = $this->video_model->get_one_row($rank-1);
			$prev = "<li><a href='". base_url("videografi/view/" .  $p->year.'/'.$p->month.'/'.$p->day.'/'.$p->video_id . "/" . $this->slug($p->title) . "")."'"
					."aria-label='Previous'><span aria-hidden='true'>&laquo; Previous</span></a></li>";
			return $prev;
		} 
		if($rank == 0) {
			$p = $this->video_model->get_one_row($rank+1);
			$next = "<li><a href='".base_url("videografi/view/" .  $p->year.'/'.$p->month.'/'.$p->day.'/'.$p->video_id . "/" . $this->slug($p->title) . "")."'"
					."aria-label='Next'><span aria-hidden='true'>Next &raquo;</span></a></li>";
			return $next;
		}
	}

	function profile(){
		include ('about.php');
		
		return $obj = new about();
	}
	
	function slug($str='') {
		return strtolower(preg_replace('/[\s\/\&\%\#\,\.\)\(\$]/', '-', $str));
	}
	
	function page() {
	 	$this->index();	
	 }
	
	 function table_pagination($keyword){
		$config['base_url'] = base_url("videografi/page/".$keyword['year'] ."/".$keyword['month'].'/'.$keyword['category']);
		$config['per_page'] = 9;
		$config['total_rows'] = $this->video_model->count_video(1, $keyword);
		$config['uri_segment'] = 6;
		$config['next_link'] = 'Next &raquo;';
		$config['prev_link'] = '&laquo; Previous';
		$config['first_link'] = '&lt;&lt;';
		$config['last_link'] = '&gt;&gt;';
		$config['cur_tag_open'] = '<span><b>';
		$config['cur_tag_close'] = '</b></span>';
		$config['full_tag_open'] = '<div align="center"><ul class="pagination"><li>';
		$config['full_tag_close'] = '</li></ul></div>';
		
		$this->pagination->initialize($config);

		$config['start'] = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		
		$config['page'] = $this->pagination->create_links();
		return $config;
	}
}