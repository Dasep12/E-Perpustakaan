<?php


/**
 * 
 */
class Histori_pinjam extends CI_Controller
{
	public function index()
	{
		$this->template->load("template/template_admin","admin/histori_pinjam");
	}

	public function sendData()
	{
		$data = $this->m_admin->sendData("histori_pinjam")->result();
		echo json_encode($data);
	}
}