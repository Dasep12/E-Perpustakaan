<?php


 /**
  * 
  */
 class Dashboard extends CI_Controller
 {
 	public function __Construct()
	{
		parent::__construct();
			if($this->session->userdata("role_id") != 1 ){
				redirect("Login");
			}else if(empty($this->session->userdata("id"))){
				$this->session->set_flashdata('errlog','login dulu');
				redirect("Login");
			}
	}

	
 	public function index()
 	{
 		//jumlah seluruh peminjaman yang belum di kembalikan
 		$data['peminjaman'] = $this->m_admin->sendData("peminjaman")->num_rows();
 		//jumlah member
 		$data['buku'] = $this->m_admin->sendData("master_buku")->num_rows();
 		//jumlah member 
 		$data['jmlmember'] = $this->m_admin->sendData("member")->num_rows();

 		//data grafik peminjaman Buku tahun 
 		$data['total'] = array(
 			$this->m_admin->grafikPinjam(date("Y-")."01")->total ,
 			$this->m_admin->grafikPinjam(date("Y-")."02")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."03")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."04")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."05")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."06")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."07")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."08")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."09")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."10")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."11")->total,
 			$this->m_admin->grafikPinjam(date("Y-")."12")->total,
 		) ;


 		$this->template->load("template/template_admin","admin/Dashboard",$data);
 	}
 }