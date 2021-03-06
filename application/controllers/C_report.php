<?php
//-----------------------------------------------------------------------------------------------//
defined('BASEPATH') OR exit('No direct script access allowed');
//-----------------------------------------------------------------------------------------------//
class C_report extends CI_Controller {
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	public function __construct(){
        parent::__construct();
		if($this->session->userdata('session_bgm_edocument_status') != "LOGIN"){
			redirect(base_url());
		}
    }
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	public function index(){
		$this->load->view('V_report');
	}

	public function report()
	{
		$dari_awal 			= $this->input->post('si_date_from');
		$sampai_awal 		= $this->input->post('si_date_to');
		$dari 				= date('Y-m-d', strtotime($dari_awal));
		$sampai 			= date('Y-m-d', strtotime($sampai_awal));
		$tipe 				= $this->input->post('tipe');
		$dokumen 			= $this->input->post('duallistbox_dokumen');

		$data['document'] 	= $dokumen;
		$data['jumlah'] 	= count($dokumen);
		$data['nama'] 		= $tipe." dari ".$dari_awal." sampai ".$sampai_awal;

		if ($tipe == "Laporan Rekap Komentar") {
			$this->load->view('export_excel/V_report_comment', $data);
		}elseif ($tipe == "Laporan Rekap Dokumen Expired") {
			$this->load->view('export_excel/V_report_doc_expired', $data);
		}elseif ($tipe == "Laporan Catatan Revisi") {
			$this->load->view('export_excel/V_report_revisi', $data);
		}elseif ($tipe == "Laporan Penggunaan Dokumen") {
			# code...
		}elseif ($tipe == "Laporan Log Aktivitas penggunaan Dokumen") {
			# code...
		}else{
			# code...
		}
	}
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
	//-----------------------------------------------------------------------------------------------//
}
//-----------------------------------------------------------------------------------------------//
