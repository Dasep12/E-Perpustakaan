<?php

/**
 * 
 */
class Master_buku extends CI_Controller
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
		$this->template->load("template/template_admin","admin/master_buku");
	}

	public function sendData()
	{
		$data = $this->m_admin->sendData("master_buku")->result();
		echo json_encode($data);
	}


	//form tambah data buku 
	public function Tambah_buku()
	{
		$this->template->load("template/template_admin","admin/tambah_buku");
	}

	//fungsi input data buku baru 
	public function input()
	{
			$kdbuku = $this->input->post("kd_buku");
			$cariKDBUKU = $this->m_admin->cari(array("kd_buku" => $kdbuku) ,"master_buku")->num_rows();
			if($cariKDBUKU > 0 ){
				echo "Kode Buku Sudah di Gunakan" ;
			}else {
					$data = array(
						"kd_buku"			=> $kdbuku ,
						"judul_buku"		=> $this->input->post("judul_buku"),
						"thn_terbit"		=> $this->input->post("thn_terbit"),
						"pengarang"			=> $this->input->post("pengarang"),
						"lokasi"			=> $this->input->post("lokasi"),
						"jumlah"			=> $this->input->post("jumlah"),
						"genre"				=> $this->input->post("genre"),
					);
					$input  = $this->m_admin->input("master_buku",$data);
					if($input){
						echo "Sukses Input Buku";
					}else {
						echo "Gagal";
					}
			}
	}


	//form update data buku
	public function view($id)
	{
		$data['buku'] = $this->m_admin->cari(array("kd_buku" => $id) ,"master_buku")->row();
		$this->template->load("template/template_admin","admin/detail_buku",$data);
	}


	//update data buku 
	public function update()
	{
		$id = $this->input->post("id");
		$data = array(
						"kd_buku"			=> $this->input->post("kd_buku"),
						"judul_buku"		=> $this->input->post("judul_buku"),
						"thn_terbit"		=> $this->input->post("thn_terbit"),
						"pengarang"			=> $this->input->post("pengarang"),
						"lokasi"			=> $this->input->post("lokasi"),
						"jumlah"			=> $this->input->post("jumlah"),
						"genre"				=> $this->input->post("genre"),
					);
					$input  = $this->m_admin->update("master_buku",$data,array("id" => $id));
					if($input){
						echo "Sukses Update Buku";
					}else {
						echo "Gagal";
					}
	}


	//hapus data buku 
	public function hapus()
	{
		$id = $this->input->get("id");
		$hapus = $this->m_admin->delete(array('id' => $id),"master_buku");
		if($hapus){
			echo "Sukses";
		}else {
			echo "Gagal";
		}
	}
}