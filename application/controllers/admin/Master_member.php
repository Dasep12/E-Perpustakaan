<?php
/**
 * 
 */
class Master_member extends CI_Controller
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
		$this->template->load("template/template_admin","admin/master_member");
	}

	public function sendData()
	{
		$data = $this->m_admin->sendData("member")->result();
		echo json_encode($data);
	}

	//form input tambah member 
	public function Tambah_member()
	{
		  $token = "";
          $codeAlphabet= "0123456789";
          $max = strlen($codeAlphabet); // edited
            
          for ($i=0; $i < 6 ; $i++) {
           $token .= $codeAlphabet[mt_rand(0, $max-1)];
          }
          $data['idmember'] = $token;
		$this->template->load("template/template_admin","admin/tambah_member",$data);
	}

	//input data member 
	public function input()
	{
		$file = $_FILES['file']['name'];
		$idmember = $this->input->post("idmember");
		$cekMember  = $this->m_admin->cari(array("id_user" => $idmember),"member")->num_rows();
		if(!empty($file)){
			if($cekMember > 0 ){
				echo "ID Member sudah ada ";
			}else {
					$config['allowed_types']  = "jpg|jpeg|png|gif" ;
					$config['upload_path']    = './assets/poto/' ;
					$config['file_name']      = $idmember . $file  ; 
					$this->load->library("upload");
					$this->upload->initialize($config);
						if(!$this->upload->do_upload("file")){
							echo "Gagal Upload";
						}else {
							$photo = $this->upload->data("file_name");
							$data = array(
								"id_user"		=> $idmember ,
								"nama"			=> $this->input->post('nama'),
								"no_telp"		=> $this->input->post("notelp"),
								"email"			=> $this->input->post("email") ,
								"alamat"		=> $this->input->post("alamat") ,
								"status"		=> "Member" ,
								"photo"			=> $photo ,
							);
							$input = $this->m_admin->input("member",$data);
								if($input){
									echo "Berhasil Tambah Member";
								}else {
									echo "Gagal";
								}
						}
			}
		}else {
			if($cekMember > 0 ){
				echo "ID Member sudah ada";
			}else {
				$data = array(
					"id_user"		=> $idmember ,
					"nama"			=> $this->input->post('nama'),
					"no_telp"		=> $this->input->post("notelp"),
					"email"			=> $this->input->post("email") ,
					"alamat"		=> $this->input->post("alamat") ,
					"status"		=> "Member" 
				);
				$input = $this->m_admin->input("member",$data);
					if($input){
						echo "Berhasil Tambah Member";
					}else {
						echo "Gagal";
					}
			}
		}
	}

	//form update data member
	public function view($id)
	{
		$data['member'] = $this->m_admin->cari(array("id_user" => $id) ,"member")->row();
		$this->template->load("template/template_admin","admin/detail_member",$data);
	}

	//hapus data member
	public function hapus()
	{
		$id = $this->input->get("id");
		$hapusFile = $this->m_admin->cari(array('id' => $id) , "member")->row();
		if(!empty($hapusFile->photo)){
			$target = './assets/poto/' . $hapusFile->photo ;
			unlink($target) ;
		}


		$hapus = $this->m_admin->delete(array('id' => $id),"member");
		if($hapus){
			echo "Sukses";
		}else {
			echo "Gagal";
		}
	}

	//update profile member
	public function update()
	{
		$data = array(
					"nama"			=> $this->input->post('nama'),
					"no_telp"		=> $this->input->post("notelp"),
					"email"			=> $this->input->post("email") ,
					"alamat"		=> $this->input->post("alamat") ,
					"status"		=> "Member" 
				);
				$input = $this->m_admin->update("member",$data,array("id" => $this->input->post('id')) );
					if($input){
						echo "Berhasil Update Data Member";
					}else {
						echo "Gagal";
					}
			
	}

	public function updateProfile()
	{
		$fileExist = $this->input->post("photo");
		$idmember = $this->input->post("idmember");
		$file = $_FILES['file']['name'];
		$target = './assets/poto/' . $fileExist ;
		$config['allowed_types']  = "jpg|jpeg|png|gif" ;
		$config['upload_path']    = './assets/poto/' ;
		$config['file_name']      = $idmember . $file  ; 
		$this->load->library("upload");
		$this->upload->initialize($config);
			if(!$this->upload->do_upload("file")){
				echo "Gagal Upload";
			}else {
				$photo = $this->upload->data("file_name");
				$data = array(
					"photo"			=> $photo ,
				);
				$update = $this->m_admin->update("member",$data,array("id" => $this->input->post('id')) );;
					if($update){
						if(!empty($fileExist)){
							unlink($target);
						}
						echo "Berhasil Update Member";
					}else {
						echo "Gagal";
					}
			}

	}
}