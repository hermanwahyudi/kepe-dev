<?php 

class News_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_news_list($flag=0, $start, $limit, $keyword=array()) {
        if($flag == 0) {
            $this->db->select("a.news_id, a.title as title_news, ac.title as title_category, a.status, DATE_FORMAT(a.created_date, '%M %d, %Y %h:%i %p') as created_date, a.modified_date", false);
        	$this->db->from("news as a");
            if($keyword != NULL) 
                $this->db->like("a.title", $keyword);
        	$this->db->limit($limit, $start);
            $this->db->order_by("news_id", "desc");
            $this->db->join('news_category as ac', 'ac.news_category_id = a.news_category_id');
            $query = $this->db->get();
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        } else {
			$this->db->select(" 
				n.news_id
                ,n.news_category_id
				,n.image_id
				,n.title
				,n.tag
				,n.summary
				,n.body
				,usr.nama_lengkap
				,DATE_FORMAT(n.created_date, '%M %d, %Y %h:%i %p') as created_date
				,img.path AS path_image
				,nc.title AS category
				,DATE_FORMAT(n.created_date, '%Y') as year
				,DATE_FORMAT(n.created_date, '%m') as month
				,DATE_FORMAT(n.created_date, '%d') as day"
				,false);
			$this->db->from("news as n");
			$this->db->join('image as img', 'img.image_id = n.image_id', 'left');
			$this->db->join('user as usr', 'n.user_id = usr.user_id', 'left');
			$this->db->join('news_category as nc', 'nc.news_category_id = n.news_category_id', 'left');
			$this->db->where("n.status = 'published' AND n.image_id > 0");
			if($keyword['category']){
				$this->db->like('nc.title', $keyword['category']); 
			}
			if($keyword['year']){
				$this->db->like("DATE_FORMAT(n.created_date, '%Y')", $keyword['year']); 
			}
			if($keyword['month']){
				$this->db->like("DATE_FORMAT(n.created_date, '%m')", $keyword['month']); 
			}
			$this->db->order_by("n.created_date", "DESC");	
			$this->db->limit($limit, $start);  
			$query = $this->db->get();
			 
            if($query->num_rows() > 0) {
                return $query;
            } 
        }
        return false;
    }

    function get_enum_status() {
        $enum = $this->db->query("SHOW COLUMNS FROM news WHERE Field = 'status' ");
        preg_match("//^enum\(\'(.*)\'\)$/", $enum, $matches);
        $result = explode("','", $matches[1]);
        return $result;
    }

    function count_news($flag=0, $keyword=array()) {
		if($flag == 0){
			if($keyword != NULL) {
				$this->db->like('title', $keyword);
				$this->db->from('news');
				return $this->db->count_all_results();
			}
			return $this->db->count_all("news");
		}
		else{
			$this->db->select(" 
				n.news_id
                ,n.news_category_id
				,n.image_id
				,n.title
				,n.summary
				,n.body
				,usr.nama_lengkap
				,DATE_FORMAT(n.created_date, '%M %d, %Y %h:%i %p') as created_date
				,img.path AS path_image
				,nc.title AS category
				,DATE_FORMAT(n.created_date, '%Y') as year
				,DATE_FORMAT(n.created_date, '%m') as month
				,DATE_FORMAT(n.created_date, '%d') as day"
				,false);
			$this->db->from("news_category as nc");
			$this->db->join("news as n", "nc.news_category_id = n.news_category_id AND n.status = 'published' AND n.image_id > 0", "left");
			$this->db->join('image as img', 'img.image_id = n.image_id', 'left');
			$this->db->join('user as usr', 'n.user_id = usr.user_id', 'left');
			if($keyword['category']){
				$this->db->like('nc.title', $keyword['category']); 
			}
			if($keyword['year']){
				$this->db->like("DATE_FORMAT(n.created_date, '%Y')", $keyword['year']); 
			}
			if($keyword['month']){
				$this->db->like("DATE_FORMAT(n.created_date, '%m')", $keyword['month']); 
			}
			$this->db->order_by("n.created_date", "DESC");	
			$query = $this->db->get();
			
			return $query->num_rows();
		}
    }

    function create_news($data) {
        $data = array("user_id" => $data['user_id'],
        			"news_category_id" => $data['news_category_id'],
                    "title" => $data['title'],
                    "tag" => $data['tag'],
                    "status" => $data['status'],
                    "summary" => $data['summary'],
                    "body" => $data['body'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s"),
                    "image_id" => $data['image_id']
                );
        $this->db->insert('news', $data);
    }
	
	function create_news_stat($data){
		$query = $this->db->query("select distinct(ip_address) 
            from news_stat where ip_address = '".$data['ip_address']."'");

        if($query->num_rows() > 0) {
            $this->db->where('news_id', $data['news_id']);
            $this->db->update('news_stat', $data);
        } else {
            $this->db->insert('news_stat', $data);    
        }
	}

    function delete_news($id) {
    	return $this->db->delete("news", array("news_id" => $id));
    } 

    function get_image($id='') {
        $this->db->select("i.path")
                ->from("news a")
                ->join("image i", "a.image_id = i.image_id")
                ->where("news_id", $id);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;

    }

    function get_by_id($id) {
    	//$sql = "select * from user as u JOIN news as a on a.user_id = u.user_id JOIN news_category as ac on ac.news_category_id = a.news_category_id ";
    	$this->db->select("a.news_id, a.image_id, a.news_category_id, u.user_id, 
                            u.nama_lengkap, a.title as title_news, 
                            ac.title as title_category, a.status, a.summary, 
                            a.body, a.tag, DATE_FORMAT(a.created_date, '%M %d, %Y') as created_date, a.modified_date", false);
    	$this->db->from("news as a");
    	$this->db->join('user as u', 'u.user_id = a.user_id');
        $this->db->join('news_category as ac', 'ac.news_category_id = a.news_category_id');
       	$this->db->where("news_id", $id);
       	$this->db->limit(1);

        $query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function update_news($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('news_id', $id);
        $this->db->update('news', $data); 
    }

    function get_rank() {
        $query = $this->db->query("
                    select @i:=@i+1 as i, news_id
                    from news, (select @i:=-1) r 
                    order by news_id desc");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    function get_one_row($rank) {
        $query = $this->db->query("
                    select n.news_id, n.title
                    ,DATE_FORMAT(n.created_date, '%M %d, %Y %h:%i %p') as created_date
                    ,DATE_FORMAT(n.created_date, '%Y') as year
                    ,DATE_FORMAT(n.created_date, '%m') as month
                    ,DATE_FORMAT(n.created_date, '%d') as day
                    from news n order by n.news_id desc
                    limit ". $rank .", 1 ");

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }
	
	function count_news_comment($id){
		$this->db->select("COUNT(1) AS count_news_comment");
		$this->db->from("news_comment ncom");
		$this->db->where("ncom.news_id", $id);
		
		$query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
	}
	
	function count_news_stat($id){
        $query = $this->db->query("select count(ip_address) as count_news_stat
                        from (select distinct ip_address from news_stat where news_id = '".$id."') as n");
        

        /*
		$this->db->select("COUNT(DISTINCT nstat.ip_address) AS count_news_stat");
		$this->db->from("news_stat nstat");
		$this->db->where("nstat.news_id", $id);
        $this->db->group_by("nstat.ip_address");
		
		$query = $this->db->get();*/
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return (object) array("count_news_stat" => 0);
	}
}