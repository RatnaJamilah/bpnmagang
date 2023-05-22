<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function get_user()
	{
		$username = trim($this->input->post('username'));
		$query = $this->db->query('SELECT * FROM akun WHERE username="'.$username.'"');
		if($query->num_rows() > 0)
			return false;
		else
			return true;
	}

	public function insert_user($user)
	{
		$this->db->insert('akun',$user);
		return $this->db->insert_id();
	}

	public function getuser($id)
	{
		$query= $this->db->get_where('akun',array('id' => $id));
		return $query->row_array();
	}

	public function userlogin($username)
	{
		// $query=$this->db->get_where('users_login',array('email'=>$user));
		$query=$this->db->query('SELECT username FROM akun WHERE username="'.$username.'" ');
		return $query->row_array();
	}

	public function userlogin1($username)
	{
		// $query=$this->db->get_where('users_login',array('email'=>$user));
		$query=$this->db->query('SELECT * FROM akun WHERE username="'.$username.'" ');
		return $query->row_array();
	}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */