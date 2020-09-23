<?php

 /**
  * 
  */
 class Profile extends CI_Controller
 {
 	public function index()
 	{
 		$data['petugas'] = $this->m_petugas->cari(array("role_id" =>$this->session->userdata("role_id") , "id" => $this->session->userdata("id"))  , "akun")->row() ;
 		$this->template->load("template/template_petugas","petugas/profile",$data);
 	}

 	public function update()
 	{
 		$password = $this->input->post("password");
 		$id 	  = $this->input->post("id");

 		if(!empty($password)){
 			$data = array(
 				"nama"			=> $this->input->post("nama"),
 				"email"			=> $this->input->post("email"),
 				"no_telp"		=> $this->input->post("no_telp"),
 				"password"		=> $password,
 			);
 			$update = $this->m_petugas->update("akun",$data,array("id" => $id));
 				if($update){
 					echo "Update Password Sukses";
 				}else {
 					echo "Gagal";
 				}
 		}else {
 			$data = array(
 				"nama"			=> $this->input->post("nama"),
 				"email"			=> $this->input->post("email"),
 				"no_telp"		=> $this->input->post("no_telp"),
 			);
 			$update = $this->m_petugas->update("akun",$data,array("id" => $id));
 				if($update){
 					echo "Update Data Sukses";
 				}else {
 					echo "Gagal";
 				}
 		}
 	}

 	//update poto profie
 	public function updateProfile()
 	{
 		$fileExist = $this->input->post("photo");
		$idmember = $this->input->post("id_akun");
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
				$update = $this->m_petugas->update("akun",$data,array("id" => $this->input->post('id')) );;
					if($update){
						if(!empty($fileExist)){
							unlink($target);
						}
						echo "Berhasil Update Data";
					}else {
						echo "Gagal";
					}
			}
 	}
 }