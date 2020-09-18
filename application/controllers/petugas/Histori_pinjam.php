<?php


/**
 * 
 */
class Histori_pinjam extends CI_Controller
{
	public function index()
	{
		$this->template->load("template/template_petugas","petugas/histori_pinjam");
	}

	public function sendData()
	{
		$data = $this->m_petugas->getData("histori_pinjam")->result();
		echo json_encode($data);
	}
}