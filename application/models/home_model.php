<?php
	
class home_model extends CI_Model {
	
	function __construct() {
		parent:: __construct();
	}

	function get_recent_video() {
		$q = "
			SELECT 
			  vid.video_id
			  ,vid.video_category_id
			  ,vid.image_id
			  ,vid.title
			  ,vid.description
			  ,vid.url AS path_video
			  ,vid.duration
			  ,vid.created_date
			  ,img.path AS path_image
			  ,vid_cat.title AS category
			  ,DATE_FORMAT(vid.created_date, '%Y') as year
		      ,DATE_FORMAT(vid.created_date, '%m') as month
			  ,DATE_FORMAT(vid.created_date, '%d') as day
			FROM
				video vid
				LEFT JOIN
				  image img
				ON
				  vid.image_id = img.image_id
				LEFT JOIN
				  video_category vid_cat
				ON
				  vid.video_category_id = vid_cat.video_category_id
			WHERE 
				vid.status = 'published'
				AND vid.image_id > 0
			ORDER BY created_date DESC
			LIMIT 0, 5
		";

        $query = $this->db->query($q);
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
	
	function get_recent_news() {
		$q = "
			SELECT 
				n.news_id
				,n.news_category_id
				,n.image_id
				,n.title
				,n.summary
				,usr.nama_lengkap
				,DATE_FORMAT(n.created_date, '%M %d, %Y %h:%i %p') as created_date
				,img.path AS path_image
				,n_cat.title AS category
				,DATE_FORMAT(n.created_date, '%Y') as year
				,DATE_FORMAT(n.created_date, '%m') as month
				,DATE_FORMAT(n.created_date, '%d') as day
			FROM
				news n
				LEFT JOIN
					user usr
				ON
					n.user_id = usr.user_id
				LEFT JOIN
					image img
				ON
					n.image_id = img.image_id
				LEFT JOIN
					news_category n_cat
				ON
					n.news_category_id = n_cat.news_category_id
			WHERE 
				n.status = 'published'
				AND n.image_id > 0
			ORDER BY n.created_date DESC
			LIMIT 0, 3;
		";

        $query = $this->db->query($q);
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
	
	function get_recent_article() {
		$q = "
			SELECT 
				art.article_id
				,art.article_category_id
				,art.image_id
				,art.title
				,art.summary
				,usr.nama_lengkap
				,DATE_FORMAT(art.created_date, '%M %d, %Y %h:%i %p') as created_date
				,img.path AS path_image
				,art_cat.title AS category
				,DATE_FORMAT(art.created_date, '%Y') as year
				,DATE_FORMAT(art.created_date, '%m') as month
				,DATE_FORMAT(art.created_date, '%d') as day
			FROM
				article art
				LEFT JOIN
					user usr
				ON
					art.user_id = usr.user_id
				LEFT JOIN
					image img
				ON
					art.image_id = img.image_id
				LEFT JOIN
					article_category art_cat
				ON
					art.article_category_id = art_cat.article_category_id
			WHERE 
				art.status = 'published'
				AND art.image_id > 0
			ORDER BY art.created_date DESC
			LIMIT 0, 2;
		";

        $query = $this->db->query($q);
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
}
