<?php

 /**
  * 
  */
 class TambahPengelola extends CI_Controller
 {
 	public function index()
 	{
 		 $token = "";
          $codeAlphabet= "0123456789";
          $max = strlen($codeAlphabet); // edited
            
          for ($i=0; $i < 6 ; $i++) {
           $token .= $codeAlphabet[random_int(0, $max-1)];
          }
          $data['idakun'] = $token;
 		$this->template->load("template/template_admin","admin/tambahpengelola",$data);
 	}


 	public function input()
 	{
 		$file = $_FILES['file']['name'];
		$idpengelola = $this->input->post("idpengelola");
		$cekPengelola  = $this->m_admin->cari(array("id_akun" => $idpengelola),"akun")->num_rows();
		if(!empty($file)){
			if($cekPengelola > 0 ){
				echo "ID Pengelola sudah ada ";
			}else {
					$config['allowed_types']  = "jpg|jpeg|png|gif" ;
					$config['upload_path']    = './assets/poto/' ;
					$config['file_name']      = $idpengelola . $file  ; 
					$this->load->library("upload");
					$this->upload->initialize($config);
						if(!$this->upload->do_upload("file")){
							echo "Gagal Upload";
						}else {
							$photo = $this->upload->data("file_name");
							$data = array(
								"id_akun"		=> $this->input->post("idpengelola") ,
								"nama"			=> $this->input->post('nama'),
								"no_telp"		=> $this->input->post("notelp"),
								"email"			=> $this->input->post("email") ,
								"role_id"		=>  $this->input->post("role_id"),
								"photo"			=> $photo ,
								"password"		=>  $this->input->post("password")
							);
							$input = $this->m_admin->input("akun",$data);
								if($input){
									echo "Berhasil Tambah Pengelola";
								}else {
									echo "Gagal";
								}
						}
			}
		}else {
			if($cekPengelola > 0 ){
				echo "ID Pengelola sudah ada";
			}else {
				$data = array(
					"id_akun"		=> $this->input->post("idpengelola") ,
					"nama"			=> $this->input->post('nama'),
					"no_telp"		=> $this->input->post("notelp"),
					"email"			=> $this->input->post("email") ,
					"role_id"		=>  $this->input->post("role_id"),
					"password"		=>  $this->input->post("password")
				);
				$input = $this->m_admin->input("akun",$data);
					if($input){
						echo "Berhasil Tambah Pengelola";
					}else {
						echo "Gagal";
					}
			}
		}
 	}
 }