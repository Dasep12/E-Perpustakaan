<?php

/**
 * 
 */
class Login extends CI_Controller
{
	public function index()
	{
		$this->load->view("login");
	}


	public function cekLogin()
	{
		$user 		= $this->input->post("id_akun");
		$password 	= $this->input->post("password");

		$this->form_validation->set_rules('id_akun','id_akun','required',[
			'required' => "akun masih kosong"
		]);
		$this->form_validation->set_rules('password','password','required',[
			'required' => "password masih kosong"
		]);
		if($this->form_validation->run() == FALSE ){
			$this->index();
		}else {
				$cekidakun 	 = $this->m_admin->cek($user,"id_akun")->row();
					if($cekidakun->id_akun == $user ){
						if($cekidakun->password != $password ){
								$this->session->set_flashdata("errpass","akun tidak ada");
								redirect("Login/index");
						}else {
							$data = $this->m_admin->cekLogin($user,$password)->row();
							if($data == TRUE){
								$this->session->set_userdata("id_akun",$data->id_akun);
								$this->session->set_userdata("id",$data->id);
								$this->session->set_userdata("role_id",$data->role_id);
								switch ($data->role_id) {
									case '1':
										redirect("admin/Dashboard");
										break;
									case '2':
										redirect("petugas/Form_pinjam");
										break;
									default:
										# code...
										break;
								}
							}else {
								echo "tidak dapat login";
							}
						}
					}else {
						$this->session->set_flashdata("err","akun tidak ada");
						redirect("Login/index");
					}

		}
	}
}