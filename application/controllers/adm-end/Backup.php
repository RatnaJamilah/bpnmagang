<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Admin')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index(){
     	$data['title'] = 'BPN | Backup Database';

		$this->load->view('adm-end/template/content_head',$data);
		$this->load->view('adm-end/template/content_header');
		$this->load->view('adm-end/template/content_nav');
		$this->load->view('adm-end/content_backup',$data);
		$this->load->view('adm-end/template/content_footer');
		$this->load->view('adm-end/template/content_sidebar-control');
	}

	public function backup_database(){
		$this->load->dbutil();

        $prefs = array(
        	'format' => 'zip',
        	'filename' => 'magang_db_v1_backup'.date('Y-m-d_H-i')
        );

        $backup = $this->dbutil->backup($prefs);
        if (!write_file('./include/backup_db/DB-magang-backup'.date('Y-m-d_H-i').'.zip',$backup)) {
            $this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Terjadi Kesalahan", timer: 10000, icon: "error", button: false});</script>');
         } else {
            $this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Database berhasil dibackup", timer: 10000, icon: "success", button: false});</script>');
            force_download('DB-magang-backup'.date('Y-m-d_H-i').'.zip', $backup);
            redirect('adm-end/backup');
        }
	}

}

/* End of file Backup.php */
/* Location: ./application/controllers/adm-end/Backup.php */