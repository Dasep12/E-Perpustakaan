<?php


/**
 * 
 */
class Administrator extends CI_Controller
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
 		$this->template->load("template/template_admin","admin/administrator");
 	}

 	public function sendData()
	{
		$data = $this->m_admin->cari(array('role_id' => 1 ),"akun")->result();
		echo json_encode($data);
	}

	//form update data akun
	public function view($id)
	{
		$data['admin'] = $this->m_admin->cari(array("id_akun" => $id) ,"akun")->row();
		$this->template->load("template/template_admin","admin/detail_admin",$data);
	}

	//hapus data admin
	public function hapus()
	{
		$id = $this->input->get("id");
		$hapusFile = $this->m_admin->cari(array('id' => $id) , "akun")->row();
		if(!empty($hapusFile->photo)){
			$target = './assets/poto/' . $hapusFile->photo ;
			unlink($target) ;
		}

		$hapus = $this->m_admin->delete(array('id' => $id),"akun");
		if($hapus){
			echo "Sukses";
		}else {
			echo "Gagal";
		}
	}


	//update profile admin
	public function update()
	{
		$data = array(
					"nama"			=> $this->input->post('nama'),
					"no_telp"		=> $this->input->post("notelp"),
					"email"			=> $this->input->post("email") 
				);
				$input = $this->m_admin->update("akun",$data,array("id" => $this->input->post('id')) );
					if($input){
						echo "Berhasil Update Data Admin";
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
				$update = $this->m_admin->update("akun",$data,array("id" => $this->input->post('id')) );;
					if($update){
						if(!empty($fileExist)){
							unlink($target);
						}
						echo "Berhasil Update Administrator";
					}else {
						echo "Gagal";
					}
			}

	}

	//reset password
	public function Reset()
	{
		$id = $this->input->get("id");
		$data = array("password" => 123 );
		$update = $this->m_admin->update("akun",$data,array("id" => $id ));
				if($update){
					echo "Sukses";
				}else {
					echo "Gagal";
				}
	}
	
}