<?php


/**
 * 
 */
class Histori_kembali extends CI_Controller
{
	public function __Construct()
	{
		parent::__construct();
			if($this->session->userdata("role_id") != 2 ){
				redirect("Login");
			}else if(empty($this->session->userdata("id"))){
				$this->session->set_flashdata('errlog','login dulu');
				redirect("Login");
			}
	}


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