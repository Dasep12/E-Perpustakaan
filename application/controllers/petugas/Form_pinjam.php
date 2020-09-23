<?php


 /**
  * 
  */
 class Form_pinjam extends CI_Controller
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
 		$data['data_buku'] = $this->m_petugas->getData("master_buku")->result();
 		$this->template->load("template/template_petugas","petugas/form_pinjam",$data);
 	}


 	//kirim data peminjam di select
 	public function sendSelect()
 	{
 		$key = $this->input->get("id_user");
 		$data = $this->m_petugas->getSelect($key);
 		echo json_encode($data);
 	}

 	public function sendData()
 	{
 		$data = $this->m_petugas->getData("master_buku")->result();
 		echo json_encode($data);
 	}


 	public function inputPeminjaman()
 	{
 		$token = "";
      $codeAlphabet= "0123456789";
      $max = strlen($codeAlphabet); // edited
        
      for ($i=0; $i < 12; $i++) {
       $token .= $codeAlphabet[random_int(0, $max-1)];
      }
 		$idbuku 		= $this->input->post("id_buku");
 		$kdbuku 		= $this->input->post("kd_buku");
 		$judul 			= $this->input->post("judul_buku");
 		$idpeminjam 	= $this->input->post("id_user");
 		$tgl_pinjam 	= $this->input->post("tgl_pinjam");
 		$tgl_kembali 	= $this->input->post("tgl_kembali");
 		$id_pinjam      = date("Ymd") . $token ;
 		$user = $this->m_petugas->cari(array("id_user" => $idpeminjam),"member")->row();
 		$stock =  $this->m_petugas->cari(array("id" => $idbuku),"master_buku")->row();

 		$data = array(
 			"judul_buku"		=> $judul ,
 			"kd_buku"			=> $kdbuku ,
 			"id_peminjam"		=> $idpeminjam ,
 			"peminjam"			=> $user->nama, 
 			"tgl_pinjam"		=> $tgl_pinjam ,
 			"tgl_kembali"		=> $tgl_kembali ,
 			"id_peminjaman"		=> "EPERPUS".$id_pinjam
 		);

 	//jika stock buku 0 maka tidak bisa
 	if($stock->jumlah == 0){
 		echo "Stock Buku 0 ";
	}else {
		$input = $this->m_petugas->input($data,"peminjaman");
		$minusStock = array(
			"jumlah"		=> $stock->jumlah - 1 
		);	
		$updateStock = $this->m_petugas->update( "master_buku",$minusStock ,array("id" => $idbuku ));
			if($input && $updateStock){
				echo "Sukses";
			}else {
				echo "Gagal input";
			}
	}

 	}

 }