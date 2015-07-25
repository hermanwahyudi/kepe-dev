<?php
	
class Archives_model extends CI_Model {
	
	function __construct() {
		parent:: __construct();
	}
	
	function get_archives_list($table){
		if($table == 'video'){
			$this->db->select(" 
				,DATE_FORMAT(v.created_date, '%Y') as year
				,DATE_FORMAT(v.created_date, '%M') as month
				,DATE_FORMAT(v.created_date, '%m') as m
				,COUNT(1) AS total "
				, false);
			$this->db->from("video as v");
			$this->db->join('image as img', 'img.image_id = v.image_id', 'left');
			$this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id', 'left');
			$this->db->where("v.status = 'published' AND v.image_id > 0");
			$this->db->group_by(array("DATE_FORMAT(v.created_date, '%M')", "DATE_FORMAT(v.created_date, '%Y')")); 
			$this->db->order_by("v.created_date", "ASC");
				
			$query = $this->db->get();
		}
		else if($table == 'article'){
			$this->db->select(" 
				,DATE_FORMAT(a.created_date, '%Y') as year
				,DATE_FORMAT(a.created_date, '%M') as month
				,DATE_FORMAT(a.created_date, '%m') as m
				,COUNT(1) AS total "
				, false);
			$this->db->from("article as a");
			$this->db->join('image as img', 'img.image_id = a.image_id', 'left');
			$this->db->join('article_category as ac', 'ac.article_category_id = a.article_category_id', 'left');
			$this->db->where("a.status = 'published' AND a.image_id > 0");
			$this->db->group_by(array("DATE_FORMAT(a.created_date, '%M')", "DATE_FORMAT(a.created_date, '%Y')")); 
			$this->db->order_by("a.created_date", "ASC");
				
			$query = $this->db->get();
		}
		else if($table == 'news'){
			$this->db->select(" 
				,DATE_FORMAT(n.created_date, '%Y') as year
				,DATE_FORMAT(n.created_date, '%M') as month
				,DATE_FORMAT(n.created_date, '%m') as m
				,COUNT(1) AS total "
				, false);
			$this->db->from("news as n");
			$this->db->join('image as img', 'img.image_id = n.image_id', 'left');
			$this->db->join('news_category as nc', 'nc.news_category_id = n.news_category_id', 'left');
			$this->db->where("n.status = 'published' AND n.image_id > 0");
			$this->db->group_by(array("DATE_FORMAT(n.created_date, '%M')", "DATE_FORMAT(n.created_date, '%Y')")); 
			$this->db->order_by("n.created_date", "ASC");
				
			$query = $this->db->get();
		}
		else{
			$q = "
				SELECT 
					DATE_FORMAT(created_date, '%M') AS month
					,DATE_FORMAT(created_date, '%m') AS m
					,DATE_FORMAT(created_date, '%Y') AS year
					,COUNT(1) AS total 
				FROM 
					".$table." 
				GROUP BY DATE_FORMAT(created_date, '%M'), DATE_FORMAT(created_date, '%Y')
				ORDER BY DATE_FORMAT(created_date, '%m'), DATE_FORMAT(created_date, '%Y')
			";
			
			$query = $this->db->query($q);
		}
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
}
