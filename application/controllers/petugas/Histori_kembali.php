<?php


/**
 * 
 */
class Histori_kembali extends CI_Controller
{
	public function index()
	{
		$this->template->load("template/template_petugas","petugas/histori_kembali");
	}

	public function sendData()
	{
		$data = $this->m_petugas->getData("histori_kembali")->result();
		echo json_encode($data);
	}
}