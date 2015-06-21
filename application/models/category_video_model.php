<?php 

class category_video_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_category() {
    	$this->db->select('video_category_id, title');
        $this->db->from('video_category');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
        	foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } return false;
    }

    function count_category_video() {
        return $this->db->count_all("video_category");
    }

    function create_category_video($data) {
        $data = array("title" => $data['title'],
                    "body" => $data['body'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s"),
                    "image_id" => $data['image_id']
                );
        $this->db->insert('video_category', $data);
    }

    function get_list_category($start, $limit) {
        $this->db->select("video_category_id, title, body, created_date, modified_date")
                    ->from("video_category")
                    ->limit($limit, $start)
                    ->order_by("video_category_id", "desc");
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function update_category_video($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('video_category_id', $id);
        $this->db->update('video_category', $data); 
    }

    function delete_category_video($id) {
        return $this->db->delete("video_category", array("video_category_id" => $id));
    }

    function get_by_id($id) {
        $this->db->select("video_category_id, title, body, created_date, modified_date");
        $this->db->from("video_category");
        $this->db->where("video_category_id", $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }
 }