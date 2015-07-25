<?php 

class Video_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }
	
	function create_video_stat($data){
		$query = $this->db->query("select distinct(ip_address) 
            from video_stat where ip_address = '".$data['ip_address']."'");

        if($query->num_rows() > 0) {
            $this->db->where('video_id', $data['video_id']);
            $this->db->update('video_stat', $data);
        } else {
            $this->db->insert('video_stat', $data);    
        }
	}
	
    function count_video($flag=0, $keyword=array()) {
		if($flag==0){
			return $this->db->count_all("video");
		}
		else{
			$this->db->select(" 
                  v.video_id
                  ,v.video_category_id
                  ,v.image_id
                  ,v.title
                  ,v.description
                  ,v.url AS path_video
                  ,v.duration
				  ,DATE_FORMAT(v.created_date, '%M %d, %Y %h:%i %p') as created_date
				  ,DATE_FORMAT(v.created_date, '%Y') as year
				  ,DATE_FORMAT(v.created_date, '%m') as month
				  ,DATE_FORMAT(v.created_date, '%d') as day
                  ,img.path AS path_image
                  ,vc.title AS category"
				  , false);
			$this->db->from("video as v");
			$this->db->join('image as img', 'img.image_id = v.image_id', 'left');
			$this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id', 'left');
			$this->db->where("v.status = 'published' AND v.image_id > 0");
			if($keyword['category']){
				$this->db->like('vc.title', $keyword['category']); 
			}
			if($keyword['year']){
				$this->db->like("DATE_FORMAT(v.created_date, '%Y')", $keyword['year']); 
			}
			if($keyword['month']){
				$this->db->like("DATE_FORMAT(v.created_date, '%m')", $keyword['month']); 
			}
			$this->db->order_by("v.created_date", "DESC");	
			 $query = $this->db->get();
			 
			 return $query->num_rows();
		}
    }

    function get_video_list($flag=0, $start, $limit, $keyword=array()) {
        if($flag == 0) {
            $this->db->select("v.video_id, v.title as title_video, vc.title as title_category, 
                            v.status, v.created_date, v.modified_date", false);
            $this->db->from("video as v");
            $this->db->limit($limit, $start);
            $this->db->order_by("video_id", "desc");
            $this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id');
            $query = $this->db->get();
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        } else {
			$this->db->select(" 
                  v.video_id
                  ,v.video_category_id
                  ,v.image_id
                  ,v.title
                  ,v.tag
                  ,v.description
                  ,v.url AS path_video
                  ,v.duration
				  ,usr.nama_lengkap AS full_name
				  ,DATE_FORMAT(v.created_date, '%M %d, %Y %h:%i %p') as created_date
				  ,DATE_FORMAT(v.created_date, '%Y') as year
				  ,DATE_FORMAT(v.created_date, '%m') as month
				  ,DATE_FORMAT(v.created_date, '%d') as day
                  ,img.path AS path_image
                  ,vc.title AS category"
				  , false);
			$this->db->from("video as v");
			$this->db->join('image as img', 'img.image_id = v.image_id', 'left');
			$this->db->join('user as usr', 'v.user_id = usr.user_id', 'left');
			$this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id', 'left');
			$this->db->where("v.status = 'published' AND v.image_id > 0");
			if($keyword['category']){
				$this->db->like('vc.title', $keyword['category']); 
			}
			if($keyword['year']){
				$this->db->like("DATE_FORMAT(v.created_date, '%Y')", $keyword['year']); 
			}
			if($keyword['month']){
				$this->db->like("DATE_FORMAT(v.created_date, '%m')", $keyword['month']); 
			}
			$this->db->order_by("created_date", "DESC");
			$this->db->limit($limit, $start);  
			
			$query = $this->db->get();
			
			/*
			echo "<pre>";
			print_r($this->db);
			echo "</pre>";
			exit;
			*/
			
            if($query->num_rows() > 0) {
                return $query;
            } 
        }
    }

    function delete_video($id) {
    	return $this->db->delete("video", array("video_id" => $id));
    }

    function create_video($data) {
        $data = array("video_category_id" => $data['video_category_id'],
                    "title" => $data['title'],
                    "tag" => $data['tag'],
                    "status" => $data['status'],
                    "description" => $data['description'],
                    "story_ide" => $data['story_ide'],
                    "screenwriter" => $data['screenwriter'],
                    "film_director" => $data['film_director'],
                    "cameramen" => $data['cameramen'],
                    "artist" => $data['artist'],
                    "url" => $data['url'],
                    "duration" => $data['duration'],
                    "image_id" => $data['image_id'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s")
                );
        $this->db->insert('video', $data);
    }

    function get_by_id($flag=0, $id) {
		if($flag == 0){
			$this->db->select("
				v.video_id
				,v.video_category_id
				,v.tag
				,v.title as title_video
				,vc.title as title_category
				,v.status
				,v.producer
				,v.artist
				,v.story_ide
				,v.cameramen
				,v.host
				,v.editor
				,v.url
				,v.duration
				,v.screenwriter
				,v.film_director
				,v.description
				,DATE_FORMAT(v.created_date, '%M %d, %Y %h:%i %p') as created_date
				,DATE_FORMAT(v.modified_date, '%M %d, %Y %h:%i %p') as modified_date"
				,false
			);
			$this->db->from("video as v");
			$this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id');
			$this->db->where("video_id", $id);
			$this->db->limit(1);
		}
		else{
			$this->db->select("
				v.video_id
				,v.video_category_id
				,u.nama_lengkap as full_name
				,v.tag
				,v.title as title_video
				,vc.title as title_category
				,v.status
				,v.artist
				,v.story_ide
				,v.cameramen
				,v.url
				,v.duration
				,v.screenwriter
				,v.film_director
				,v.description
				,DATE_FORMAT(v.created_date, '%M %d, %Y %h:%i %p') as created_date
				,DATE_FORMAT(v.modified_date, '%M %d, %Y %h:%i %p') as modified_date"
				,false
			);
			$this->db->from("video as v");
			$this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id', 'left');
			$this->db->join('user as u', 'u.user_id = v.user_id','left');
			$this->db->where("video_id", $id);
			$this->db->limit(1);
		}

        $query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function update_video($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('video_id', $id);
        $this->db->update('video', $data); 
    }

    function get_image($id='') {
        $this->db->select("i.path, i.image_id")
                ->from("video v")
                ->join("image i", "v.image_id = i.image_id")
                ->where("video_id", $id);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;

    }

    function get_rank() {
        $query = $this->db->query("
                    select @i:=@i+1 as i, video_id
                    from video, (select @i:=-1) r 
                    order by video_id desc");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    function get_one_row($rank) {
        $query = $this->db->query("
                    select n.video_id, n.title
                    ,DATE_FORMAT(n.created_date, '%M %d, %Y %h:%i %p') as created_date
                    ,DATE_FORMAT(n.created_date, '%Y') as year
                    ,DATE_FORMAT(n.created_date, '%m') as month
                    ,DATE_FORMAT(n.created_date, '%d') as day
                    from video n order by n.video_id desc
                    limit ". $rank .", 1 ");

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }
	
	function count_video_comment($id){
		$this->db->select("COUNT(1) AS count_video_comment");
		$this->db->from("video_comment vcom");
		$this->db->where("vcom.video_id", $id);
		
		$query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
	}
	
	function count_video_stat($id){
		$query = $this->db->query("select count(ip_address) as count_video_stat
                        from (select distinct ip_address from video_stat where video_id = '".$id."') as v");
        
		/*
		$this->db->select("COUNT(DISTINCT vstat.ip_address) AS count_video_stat");
		$this->db->from("video_stat vstat");
		$this->db->where("vstat.video_id", $id);
		$this->db->group_by("vstat.ip_address");
		
		$query = $this->db->get();*/
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return (object) array("count_video_stat" => 0);
	}
}