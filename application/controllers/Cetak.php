<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_cuti');
        $this->load->model('m_settings');
        $this->load->library('pdf');
    }

    public function surat_cuti_pdf($id_cuti)
    {
        $data['cuti'] = $this->m_cuti->get_all_cuti_by_id_cuti($id_cuti)->result_array();

		$tanda_tangan =$this->m_settings->get_slug('signature');
		$data['tanda_tangan_primary'] = $tanda_tangan[0]->value;

        $this->pdf->setPaper('Letter', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "surat-cuti.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    }
}
