<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_Izin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_izin');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}

	public function view_pegawai()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$this->load->view('pegawai/form_pengajuan_izin', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function proses_izin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$id_user = $this->input->post("id_user");
			$alasan = $this->input->post("alasan");
			$perihal_izin = $this->input->post("perihal_izin");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");
			$id_izin = md5($id_user . $alasan . $mulai);

			$id_status_izin = 1;

			$hasil = $this->m_izin->insert_data_izin('izin-' . substr($id_izin, 0, 5), $id_user, $alasan, $mulai, $berakhir, $id_status_izin, $perihal_izin);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				$this->session->set_flashdata('input', 'input');
			}
			redirect('Form_Izin/view_pegawai');
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}
}
