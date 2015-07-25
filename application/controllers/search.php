<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . "controllers/home.php");

class Search extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model("search_model");
		$this->load->library("parser");
		$this->load->library("menu");
		$this->load->library("pagination");
	}

	function index() {
		$q = $this->input->get("q", true);
		$type = $this->input->get("type", true);
		$data = array(
			'get_menu' => $this->menu->get_menu("header", ""),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", ""),
			'get_search' => $this->result($type, $q),
			"q" => $q,
			"tab_search" => $this->tab_search($type),
			"title" => "Search",
			'paging' => $this->pagination->create_links()
		);
		
		$data = array_merge($this->profile()->get_about_detail(), $data);
		
		$this->generate('search', $data);	
		
	}
	
	public function generate($view, $content = array()) {
		$data = array(
			'slider' => $this->menu->get_page_title($content['title']),
			"map" => NULL,
			"header" => $this->parser->parse('templates/header', $content, true), 
			"content" => $this->parser->parse($view, $content, true),
			"footer" => $this->parser->parse('templates/footer', $content, true) 
		);
		
		$data = array_merge($content, $data);
		
		$this->parser->parse('index', $data);
	}

	function result($type='article', $q) {
		$config = $this->page_config($type, $q);
		$result = $this->search_model->get($type, $q, $config['page'], $config['limit']);

		if($result['data'] == false || $q == null) {
			return array(array(	"title" => "",
				"summary" => "",
				"url" => "",
				"no_result" => "<h2>No result</h2>."
			));
		} else {
			foreach($result['data'] as $row) {
				$date = explode(" ", $row->created_date);
				$y = explode("-", $date[0]);
				$m = explode("-", $date[0]);
				$d = explode("-", $date[0]);

				$home = new Home();

				if($type == 'article') 
					$url = base_url("article/read/" .  $y[0].'/'.$m[1].'/'.$d[2].'/'.$row->article_id . "/" . $this->slug($row->title) . "");
				if($type == 'news') 
					$url = base_url("news/read/" .  $y[0].'/'.$m[1].'/'.$d[2].'/'.$row->news_id . "/" . $this->slug($row->title) . "");
				if($type == 'video')
					$url = base_url('videografi/view/'.$y[0].'/'.$m[1].'/'.$d[2].'/'.$row->video_id.'/'. $this->slug($row->title));
				
				$data[] = array(
					"title" => $this->get_highlight($row->title, $q),
					"summary" => ($type != 'video') ? $home->get_preview_summary($this->get_highlight($row->summary, $q), $url, '') : $home->get_preview_summary($this->get_highlight($row->description, $q), $url, 'video'),
					"url" => $url,
					"no_result" => ""
				);
			}
		}
		
		return $data;
	}

	public function profile(){
		include ('about.php');
		
		return $obj = new about();
	}

	function slug($str='') {
		$home = new Home();

		return $home->slug($str); 
	}

	function get_highlight($text, $q) {
    	$c = substr_count(strtolower($text), strtolower($q));
	    $new_text = $text;
	    $match = array();
	 
	    for($i=0; $i < $c; $i++) {
	        $match[$i] = stripos($text, $q, $i);
	        $match[$i] = substr($text, $match[$i], strlen($q));
	        $new_text = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($new_text));
	    }
	 
	   	$new_text = str_replace('[#]', '<span style="color:#daa732;">', $new_text);
	    $new_text = str_replace('[@]', '</span>', $new_text);
	    
	    return $new_text;
	}

	function tab_search($type='article') {
		$arr = array("Article", "News", "Video");
		$qry_str = $_SERVER['QUERY_STRING'];
		$q = explode("&", $qry_str);
		$class = array_fill(0, count($arr), '');
		$href = array_fill(0, count($arr), '');
        $j = 0;
        foreach($arr as $i) {
            if(strtolower($i) == $type) {
                $class[$j] = 'btn btn-primary';
                $href[$j] = '';
            } else {
            	$class[$j] = 'btn btn-default';
            	$href[$j] = base_url()."search?".$q[0] ."&type=". strtolower($i);
            }
            $j++;
        }
		
		$data = array(
					array("tab" => "<a href='".$href[0]."' class='".$class[0]."''>".$arr[0]."</a>"),		
		 			array("tab" => "<a href='".$href[1]."' class='".$class[1]."''>".$arr[1]."</a>"),
		 			array("tab" => "<a href='".$href[2]."' class='".$class[2]."''>".$arr[2]."</a>")
		 		);
	
		return $data;
	}

	function page_config($type='', $q='', $count=0) {
		$qry_str = $_SERVER['QUERY_STRING'];
		$ar = explode("&", $qry_str);
		
		$this->search_model->get($type, $q);

		$config['base_url'] = base_url() . "search?" . http_build_query($_GET);
		$config['per_page'] = 5;
	 	$config['total_rows'] = $this->search_model->count_search();
		$config['query_string_segment'] = "page";
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$config['cur_tag_open'] = '<span><b>';
		$config['cur_tag_close'] = '</b></span>';
		$config['full_tag_open'] = '<div align="center"><ul class="pagination"><li>';
		$config['full_tag_close'] = '</li></ul></div>';
			
		$this->pagination->initialize($config);
		
		$page = 0;
		if(isset($ar[count($ar)-1]) && count($ar) > 2) {
			$p = explode("=", $ar[count($ar)-1]);
			if($p[count($p)-1] == null) {
				redirect(base_url() . "search?q=" . $q . "&type=" . $type);
			} else { 
				$page = $page + (3*($p[count($p)-1]-1)+($p[count($p)-1]-2));
			}
		}
		return array("page" => $page, 
					"limit" => $config['per_page']);

	}
}