<?php 

class Static_content_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_list_static_content() {
		$query = $this->db->select("*")
    		->from("static_content")
			->where("status", "published")
    		->get();

    	if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }
	
	function get_by_id($id) {
    	$query = $this->db->select("*")
    		->from("static_content")
			->where("status", "published")
			->where("static_content_id", $id)
			->limit(1)
			->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }
	
	 function get_enum_status() {
        $enum = $this->db->query("SHOW COLUMNS FROM static_content WHERE Field = 'status' ");
        preg_match("//^enum\(\'(.*)\'\)$/", $enum, $matches);
        $result = explode("','", $matches[1]);
        return $result;
    }
	
	function update_static_content($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
		
        $this->db->where('static_content_id', $id);
        $this->db->update('static_content', $data); 
    }
}

?>