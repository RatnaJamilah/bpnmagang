<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_all_mahasiswa()
	{
		$role = 'Mahasiswa';
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->where('role', $role);
		$this->db->order_by('id', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_pengajuan_mahasiswa()
	{
		$this->db->select('*');
		$this->db->from('pengajuan');
		$this->db->order_by('id_pengajuan', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_data()
	{
		$id = $this->session->userdata('id');
		// $query = $this->db->query("SELECT * FROM mahasiswa join users_login on users_login.id = mahasiswa.id WHERE users_login.id='$id'");
		// return $query->result();
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->join('pengajuan', 'pengajuan.id = akun.id');
		$this->db->where('akun.id', $id);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_data_pengajuan_pending()
	{
		$status = 'pending';
		$this->db->select('*');
		$this->db->from('pengajuan');
		$this->db->where('status', $status);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_profil_mhs()
	{
		$id = $this->session->userdata('id');

		$this->db->select('photo');
		$this->db->from('akun');
		$this->db->where('id', $id);

		$query = $this->db->get();
		return $query->result();
	}


	public function kondisi()
	{
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->join('pengajuan', 'pengajuan.id = akun.id');
		$this->db->where('akun.id', $id);

		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */