<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'controllers/comment.php'); 

class News extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model('archives_model','', true);
		$this->load->model('news_model','', true);
		$this->load->model('category_news_model','',true);
		$this->load->library("parser");
		$this->load->library("global_common");
		$this->load->library("menu");
		$this->load->library("pagination");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$keyword = array(
			'year' => ($this->uri->segment(3)) ? $this->uri->segment(3) : 0,
			'month' => $this->uri->segment(4) ? $this->uri->segment(4) : 0,
			'category' => $this->uri->segment(5) ? $this->uri->segment(5) : 0
		);
		
		$config = $this->table_pagination($keyword);
		
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "news"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "news"),
			'get_news' => $this->get_news_list($config['start'], $config['per_page'], $keyword),
			'get_news_category' => $this->get_news_category_list(),
			'get_archives_list' => $this->get_archives_list(),
			'page' => $config['page'],
			"title" => "News",
			"meta_tag" => "Kepo News, KepoAbis, Kepo, Abis, Make you curious"
		);
		
		$data = array_merge($this->profile()->get_about_detail(), $data);
		
		$this->generate('news/news', $data);
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
	
	public function get_news_list($start=0, $limit=10, $keyword=array()){
		include("home.php");
		$obj = new Home();
		$query = $this->news_model->get_news_list(1, $start, $limit, $keyword);
		
		if($query != NULL){
			$i = 0;
			foreach ($query->result() as $q)
			{
				$path = !isset($q->path_image) ? "" : $q->path_image;
				$title = !isset($q->title) ? "" : $q->title;
				$tag = !isset($q->tag) ? "" : $q->tag;

				$year = !isset($q->year) ? 0 : $q->year;
				$month = !isset($q->month) ? 0 : $q->month;
				$day = !isset($q->day) ? 0 : $q->day;
				
				$news_id = !isset($q->news_id) ? "" : $q->news_id;
				$read_more = base_url("news/read/" .  $year.'/'.$month.'/'.$day.'/'.$news_id . "/" . $this->slug($title) . "");

				$img = "<p><a target='_blank' href='". base_url($path) ."'>";
				$img .= "<img class='img-responsive opacity' width='480px' src='". base_url($path) ."' alt='".$title."'/>";
				$img .= "</a></p>";
				
				$category = !isset($q->category) ? "" : $q->category;
				$recent_news_category = "<a href='".base_url('news/page/0/0/'.$category)."'>".$category."</a>";
				
				$data[$i] = array(
					"news_id" => $news_id,
					"news_category_id" => !isset($q->news_category_id) ? "" : $q->news_category_id,
					"image_id" => !isset($q->image_id) ? "" : $q->image_id,
					"title" => "<a href='" . $read_more . "'>".$title."</a>",
					"read_more" => "<a class='btn btn-primary' href='" . $read_more . "'>Read More</a>",
					"tag" => $this->global_common->get_list_tag($tag, 'news'),
					"summary" => !isset($q->summary) ? "" : $q->summary,
					"body" => !isset($q->body) ? "" : $q->body,
					"full_name" => !isset($q->nama_lengkap) ? "" : $q->nama_lengkap,
					"created_date" => !isset($q->created_date) ? "" : $q->created_date,
					"image" => $img,
					"recent_news_category" => $recent_news_category,
					"count_news_comment" => $this->news_model->count_news_comment($news_id)->count_news_comment,
					"count_news_stat" => $this->news_model->count_news_stat($news_id)->count_news_stat
				 );
				 
				 $i++;
			}
		}
		else{
			$data = NULL;
		}
		
 		return $data;
	}
	
	public function get_news_category_list() {
		$query = $this->category_news_model->get_category(1);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$title = !isset($q->title) ? "" : $q->title;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='".base_url('news/page/0/0/'.$title)."'>".$title." (".$total.")</a></li>";
			
			$data[$i] = array(
				"news_category_id" => !isset($q->news_category_id) ? "" : $q->news_category_id,
				"list" => $list
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_archives_list() {
		$table = "news";
		
		$query = $this->archives_model->get_archives_list($table);
	
 		return $this->global_common->archives($query, $table);
	}
	
	public function profile(){
		include ('about.php');
		
		return $obj = new about();
	}

	function read($year, $month, $day, $id, $slug) {
		$q = $this->news_model->get_by_id($id);
		
		$r = $this->news_model->get_image($id);
		$title = $q->title_news;

		$prev_next = $this->prev_next($id);

		$comment = new Comment();

		$image = ($r != false) ? $r->path : "";
		
		$title_category = $q->title_category;
		$category = "<a href='".base_url('news/page/0/0/'.$title_category)."'>".$title_category."</a>";
		
		$tag = !isset($q->tag) ? "" : $q->tag;
		
		$url_share = base_url("news/read/" .  $year.'/'.$month.'/'.$day.'/'.$id . "/" . $this->slug($title) . "");
		$img = "<a target='_blank' class='thumbnail' href='". base_url() . $image ."'>";
		$img .= "<img class='img-responsive' src='". base_url() . $image ."'>";
		$img .= "</a>";
 		$data = array_merge($this->profile()->get_about_detail(), 
 					array("get_menu" => $this->menu->get_menu("header", "news"),
	 					"get_breadcrumb" => $this->menu->get_menu("breadcrumb", "news"),
						"get_news" => $this->get_news_list(0, 5, NULL),
	 					"get_news_category" => $this->get_news_category_list(),
	 					"get_archives_list" => $this->get_archives_list(),
	 					"full_name" => "<a href='#'>".$q->nama_lengkap."</a>",
		 				"title" => $title,
		 				"tag" => $this->global_common->get_list_tag($tag, 'news', 'btn'),
		 				"meta_tag" => $this->global_common->get_list_tag($tag, 'news', 'metadata'),
		 				"title_category" => $category,
		 				"status" => $q->status,
		 				"summary" => $q->summary,
		 				"image" => $img, 
		 				"url" => $url_share,
		 				"og_image" => base_url($image),
		 				"created_date" => $q->created_date,
		 				"get_comment" => $comment->get_comment("news", $id),
		 				"n1" => $comment->random_set_captcha(0),
		 				"op" => $comment->random_set_captcha(),
		 				"n2" => $comment->random_set_captcha(0),
		 				"prev_next" => $prev_next,
		 				"news_id" => $id,
						"count_news_comment" => $this->news_model->count_news_comment($id)->count_news_comment,
						"count_news_stat" => $this->news_model->count_news_stat($id)->count_news_stat
	     		));
		
		$this->news_model->create_news_stat($this->global_common->stat('news_id', $id));
		
 		$this->generate('news/read_news', $data);
	}
	
	function prev_next($current_id) {
		$result = $this->news_model->get_rank();
		$count = $this->news_model->count_news();
		$rank = 0;
		foreach($result as $k) {
			if($current_id == $k->news_id) {
				$rank = $k->i;
				break;
			}
		}

		if($rank > 0 && $rank < $count-1) {
			$p = $this->news_model->get_one_row($rank-1);
			$prev = "<li><a href='". base_url("news/read/" .  $p->year.'/'.$p->month.'/'.$p->day.'/'.$p->news_id . "/" . $this->slug($p->title) . "")."'"
					."aria-label='Previous'><span aria-hidden='true'>&laquo; Previous</span></a></li>";
			$p = $this->news_model->get_one_row($rank+1);
			$next = "<li><a href='".base_url("news/read/" .  $p->year.'/'.$p->month.'/'.$p->day.'/'.$p->news_id . "/" . $this->slug($p->title) . "")."'"
					."aria-label='Next'><span aria-hidden='true'>Next &raquo;</span></a></li>";
			return $prev . $next;
		}
		if($count-1 == $rank) {
			$p = $this->news_model->get_one_row($rank-1);
			$prev = "<li><a href='". base_url("news/read/" .  $p->year.'/'.$p->month.'/'.$p->day.'/'.$p->news_id . "/" . $this->slug($p->title) . "")."'"
					."aria-label='Previous'><span aria-hidden='true'>&laquo; Previous</span></a></li>";
			return $prev;
		} 
		if($rank == 0) {
			$p = $this->news_model->get_one_row($rank+1);
			$next = "<li><a href='".base_url("news/read/" .  $p->year.'/'.$p->month.'/'.$p->day.'/'.$p->news_id . "/" . $this->slug($p->title) . "")."'"
					."aria-label='Next'><span aria-hidden='true'>Next &raquo;</span></a></li>";
			return $next;
		}
	}

	function slug($str='') {
		return strtolower(preg_replace('/[\s\/\&\%\#\,\.\)\(\$]/', '-', $str));
	}
	
	function page() {
		$this->index();	
	}
	 
	function table_pagination($keyword){
		$config['base_url'] = base_url("news/page/".$keyword['year'] ."/".$keyword['month'].'/'.$keyword['category']);
		$config['per_page'] = 5;
		$config['total_rows'] = $this->news_model->count_news(1, $keyword);
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