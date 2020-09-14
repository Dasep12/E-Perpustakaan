<?php

/**
 * 
 */
class Master_buku extends CI_Controller
{
	public function index()
	{
		$data['url'] = $this->uri->segment(2);
		$this->template->load("template/template_admin","admin/master_buku",$data);
	}

	public function sendData()
	{
		$data = $this->m_admin->sendData("master_buku")->result();
		echo json_encode($data);
	}


	//tambah data buku 
	public function addBuku()
	{
		$this->template->load("template/template_admin")
	}
}