<?php 

class About_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_detail() {
        $this->db->select('
			setting_id
			,title
			,logo
			,tagline
			,description
			,contact_address
			,contact_phone
			,contact_phone_mobile_first
			,contact_phone_mobile_second
			,contact_fax
			,contact_email_address_first
			,contact_email_address_second
			,contact_lat
			,contact_long
			,contact_city
			,contact_state
			,contact_zip
			,contact_country
			,background_color
			,contact_facebook
			,contact_twitter
			,contact_googleplus
			,contact_youtube
			,contact_instagram
			,contact_path
			,content_title
			,content_body
			,content_mission
			,content_image
			,created_year
			,version
			,footer'
		);
		
        $this->db->from('setting');
        $this->db->limit(1);

        $query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }

    function update_about($id, $data){
        $this->db->where('setting_id', $id);
        $this->db->update('setting', $data);
        return 0;
    }

    function insert_new($data) {
    	$this->db->insert('setting', $data);
    	return 1;
    }
	
	function get_static_content($parameter = 'history') {
        $this->db->select('
			sc.static_content_id
			,sc.user_id
			,sc.title
			,sc.tag
			,sc.parameter
			,sc.summary
			,sc.body
			,sc.status
			,sc.created_date
			,sc.modified_date
			,usr.nama_lengkap AS full_name'
		);
		
        $this->db->from('static_content sc');
		$this->db->join('user as usr', 'usr.user_id = sc.user_id', 'left');
        $this->db->where("parameter = '".$parameter."'");
        $this->db->limit(1);

        $query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }
}