<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_all_administrator()
	{
		$operator = 'Admin';
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->where('role', $operator);
		$this->db->order_by('id', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_absensi()
	{
		$operator = 'Admin';
		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->order_by('id', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function simpandata()
	{
		$data = [
			"nim" => $this->input->post ('nim',true),
			"nama_lengkap" => $this->input->post ('nama_lengkap',true),
			"jurusan" => $this->input->post ('jurusan',true),
			"tanggal" => $this->input->post ('tanggal',true)
		];
		$this->db->insert ('absensi', $data);
	}

}

/* End of file Administrator_model.php */
/* Location: ./application/models/Administrator_model.php */