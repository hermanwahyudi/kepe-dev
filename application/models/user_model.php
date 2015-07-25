<?php

class User_model extends CI_Model {
    
    // Instance
    var $user_id = "";
    var $nama_lengkap = "";
    var $user_name = "";
    var $password = "";
    var $user_role = "";
    var $email = "";
    var $position = "";
    var $body = "";
    var $image = "";
    var $created_date = "";
    var $modified_date = "";
    var $deleted_date = "";
    var $data = array();

    function __construct() {
        parent:: __construct();
    }

    function login($username, $password) {
        $this->db->select('user_id, urb.role_name as user_role, user_name, password')
                    ->from('user u')
                    ->join("user_role_basic urb", "urb.user_role_basic_id = u.user_role_basic_id")
                    ->where('user_name', $username)
                    ->where('password', md5($password))
                    ->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
            return $query->result();
        return false;
    }

    function get_user_list($start, $limit, $flag=0) {
		$this->db->select('u.*, urb.role_name AS user_role');
		 if($flag == 0){
			$this->db->order_by("user_id", "desc");
			$this->db->limit($limit, $start);
		 }
		 else{
			$this->db->order_by("nama_lengkap", "asc");
			$this->db->where("role_name", "crew");
			$this->db->or_where("role_name", "admin");
		 }
        $this->db->from("user u");
        $this->db->join("user_role_basic urb","urb.user_role_basic_id = u.user_role_basic_id");
        $query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function username_check($username) {
        $query = $this->db->select("user_name")
            ->from("user")
            ->where("user_name", $username)
            ->group_by("user_name")
            ->get();

        if($query->num_rows() == 1)
            return false;
        return true;
    }

    function create_user($data) {
        $data["password"] = md5($data['password']);
        $data["created_date"] = date("Y-m-d H:i:s");
        $data["modified_date"] = date("Y-m-d H:i:s");
		
        $this->db->insert('user', $data);
    }

    function update_user($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('user_id', $id);
        $this->db->update('user', $data); 
    }

    function count_user() {
        return $this->db->count_all("user");
    }

    function check_password($id, $password) {
        $this->db->select("user_id");
        $this->db->from("user");
        $this->db->where("user_id", $id);
        $this->db->where("password", md5($password));

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return true;
        } return false;        
           
    }

    function change_password($id, $password) {
        $data['password'] = md5($password);
        $this->db->where('user_id', $id);
        $this->db->update('user', $data); 
    }

    function get_by_id($id) {
        $this->db->select("
			u.user_id
			, u.user_role_basic_id
			, urb.role_name AS user_role
			, DATE_FORMAT(u.date_of_birth, '%M %d, %Y') as date_of_birth_modified
			, u.date_of_birth
			, u.place_of_birth
			, u.user_name
			, u.nama_lengkap
			, u.email
			, u.phone_number
			, u.address
			, u.position
			, u.body
			, u.image
			, u.created_date
			, u.modified_date
		",false);
        $this->db->from('user u');
        $this->db->join("user_role_basic urb","urb.user_role_basic_id = u.user_role_basic_id");
        $this->db->where("user_id", $id);
        $this->db->limit(1);

        $query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function delete_user($id) {
        $this->db->delete("user", array("user_id" => $id));
    }
}
