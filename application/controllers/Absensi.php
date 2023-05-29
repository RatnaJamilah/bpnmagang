<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Administrator_model');
		$this->load->helper('url');
		$this->administrator_model = $this->load->model("Administrator_model");
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Admin')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index()
	{
		$data['title'] = 'BPN Magang | Mahasiswa Panel';
        $data['absensi'] = $this->Administrator_model->get_all_absensi();
		$this->load->view('adm-end/template/content_head',$data);
		$this->load->view('adm-end/template/content_header');
		$this->load->view('adm-end/template/content_nav');
		$this->load->view('adm-end/content_absensi',$data);
		$this->load->view('adm-end/template/content_footer');
		$this->load->view('adm-end/template/content_sidebar-control');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nim','Nim','trim|required|max_length[11]');
		array(
			'required' => 'Password belum diisi',
			'min_length' => 'Password maksimal 11 karakter'
		);
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('universitas','Universitas','required');
		$this->form_validation->set_rules('jurusan','Jurusan','required|trim');
		$this->form_validation->set_rules('tanggal','tanggal','required|trim');
		$this->form_validation->set_rules('keterangan','Keterangan','required|trim');


		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'BPN | Absensi';
			$data['absensi'] = $this->Administrator_model->get_all_absensi();
			$this->load->view('adm-end/template/content_head',$data);
			$this->load->view('adm-end/template/content_header');
			$this->load->view('adm-end/template/content_nav');
			$this->load->view('adm-end/content_absensi',$data);
			$this->load->view('adm-end/template/content_footer');
			$this->load->view('adm-end/template/content_sidebar-control');
		}else{
			$data = array('input_data' => $this->upload->data());
			$data = array(
				"nim" => $this->input->post("nim"),
				"nama_lengkap" => $this->input->post("nama_lengkap"),
				"universitas" => $this->input->post("universitas"),
				"jurusan" => $this->input->post("jurusan"),
				"tanggal" => $this->input->post("tanggal"),
				"keterangan" => $this->input->post("keterangan"),
			);
			$get_result = $this->Administrator_model->input_data('absensi',$data);
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Berhasil menambahkan absensi", timer: 10000, icon: "success", button: false});</script>');
	        	redirect('adm-end/absensi');
			}
	}

	public function simpan()
	{
		$this->administrator_model->simpandata();
		redirect('adm-end/absensi');
	}

	public function hapus_absensi($id){
		$this->db->query("DELETE FROM absensi WHERE id=$id");
		// $this->message('BERHASIL','Pengajuan Cuti'.' '.strtoupper($nama_karyawan).' '.'Berhasil DISETUJUI !','success');
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "data Absensi berhasil dihapus", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/absensi');
	}

	function edit($id){
		$where = array('id' => $id);
		$data['absensi'] = $this->Administrator_model->edit_data($where,'absensi')->result();
		$this->load->view('content_absensi',$data);
	}

	function update(){
		$id = $this->input->post('id_absen');
		$nim = $this->input->post('nim');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$universitas = $this->input->post('universitas');
		$jurusan = $this->input->post('jurusan');
		$tanggal = $this->input->post('tanggal');
		$keterangan = $this->input->post('keterangan');

	 
		$data = array(
			'nim' => $nim,
			'nama_lengkap' => $nama_lengkap,
			'universitas' => $universitas,
			'jurusan' => $jurusan,
			'tanggal' => $tanggal,
			'keterangan' => $keterangan
		);
	 
		$where = array(
			'id' => $id
		);
	 
		$this->administrator_model->update_data($where,$data,'absensi');
		redirect('adm-end/absensi');
	}
}


/* End of file Absensi.php */
/* Location: ./application/controllers/adm-end/Absensi.php */
