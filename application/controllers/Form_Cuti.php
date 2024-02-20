<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_Cuti extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}

	public function view_pegawai()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$this->load->view('pegawai/form_pengajuan_cuti', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function proses_cuti()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			if (!function_exists('dd')) {
				function dd()
				{
					foreach (func_get_args() as $x) {
						var_dump($x);
					}
					die;
				}
			 }

			$id_user = $this->input->post("id_user");
			$alasan = $this->input->post("alasan");
			$perihal_cuti = $this->input->post("perihal_cuti");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");
			$tanda_tangan = $this->input->post("tanda_tangan");
			$id_cuti = md5($id_user . $alasan . $mulai . $berakhir);

			$id_status_cuti = 1;

			$config['upload_path'] = './uploads/cuti/';
			$config['max_size']	= 4096;
			$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			$file_path = '';
			if ($this->upload->do_upload('file')) {
				$upload_data = $this->upload->data();
				$file_path = "/uploads/cuti/" . $upload_data['file_name'];
			}

			// HANDLE TANDA TANGAN
			$ttd = '';
			if ($tanda_tangan) {
				// $data_uri = "data:image/png;base64,iVBORw0K...";
				$encoded_image = explode(",", $tanda_tangan)[1];
				$decoded_image = base64_decode($encoded_image);
				$path = "uploads/tanda_tangan/signature-". substr($id_cuti, 0, 6) .".png";
				file_put_contents("./$path", $decoded_image);
				$ttd = $path;
				// dd($ttd, $decoded_image);
			}
			// die();
			$hasil = $this->m_cuti->insert_data_cuti('cuti-' . substr($id_cuti, 0, 6), $id_user, $alasan, $mulai, $berakhir, $id_status_cuti, $perihal_cuti, $file_path, $ttd);
			// dd($hasil);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				$this->session->set_flashdata('input', 'input');
			}
			redirect('Form_Cuti/view_pegawai');
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}
}
