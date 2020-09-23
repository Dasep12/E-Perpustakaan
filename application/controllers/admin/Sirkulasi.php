<?php
date_default_timezone_set('Asia/Jakarta');

/**
 * 
 */
class Sirkulasi extends CI_Controller
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
		$data['peminjaman'] = $this->m_petugas->getData("peminjaman")->result();
		$this->template->load("template/template_admin","admin/sirkulasi",$data);
	}

	//fungsi untuk mengembalikan buku
	public function kembalikanBuku()
	{
		$id = $this->input->get("id");
		$cekbuku = $this->m_petugas->cari(array("id" => $id) , "peminjaman")->row();

		//hitung lama peminjaman
		$tglminjem = new DateTime($cekbuku->tgl_pinjam) ;
		$tglBalik = new DateTime();
		$lamapinjam = $tglBalik->diff($tglminjem)->d ;

		//hitung telat lama pengembalian 
		if($cekbuku->tgl_kembali >= date('Y-m-d') ){
			$telat = 0 ;
		}else {
			$tglkemmbali = new DateTime($cekbuku->tgl_kembali) ;
			$tglBalik2 = new DateTime();
			$telat = $tglBalik2->diff($tglkemmbali)->d ;
		}

		//masukan buku yang di pinjam kedalam histori peminjaman buku
		$histori_pinjam  = array(
			"judul_buku"			=> $cekbuku->judul_buku ,
			"kd_buku"				=> $cekbuku->kd_buku ,
			"id_peminjam"			=> $cekbuku->id_peminjam ,
			"peminjam"				=> $cekbuku->peminjam ,
			"tgl_pinjam"			=> $cekbuku->tgl_pinjam ,
			"tgl_kembali"			=> $cekbuku->tgl_kembali ,
			"id_peminjaman"			=> $cekbuku->id_peminjaman ,
			"jam_kembali"			=> date("H:i:s") ,
			"tgl_dikembalikan"		=> date("Y-m-d") ,
			
		);

		$histori_kembali = array(
			"id"					=> "" ,
			"judul_buku"			=> $cekbuku->judul_buku ,
			"kd_buku"				=> $cekbuku->kd_buku ,
			"id_peminjam"			=> $cekbuku->id_peminjam ,
			"peminjam"				=> $cekbuku->peminjam ,
			"tgl_pinjam"			=> $cekbuku->tgl_pinjam ,
			"tgl_kembali"			=> $cekbuku->tgl_kembali ,
			"id_peminjaman"			=> $cekbuku->id_peminjaman ,
			"jam_kembali"			=> date("H:i:s") ,
			"tgl_dikembalikan"		=> date("Y-m-d") ,
			"total_lama_pinjam"		=> $lamapinjam  ,
			"denda"					=> $telat * 2000 ,
			"telat_pengembalian"	=> $telat
		);

		$inputHistoripinjam = $this->m_petugas->input($histori_pinjam,"histori_pinjam");
		$inputHistorikembali = $this->m_petugas->input($histori_kembali,"histori_kembali");
			if($inputHistoripinjam && $inputHistorikembali ){

				//update data stock buku jika buku yang di pinjam sudah kembali 
				$stockBUKU = $this->m_petugas->cari(array("kd_buku" => $cekbuku->kd_buku),"master_buku")->row();
				$datastock = array(
					"jumlah"  =>  $stockBUKU->jumlah + 1 , 
				);
				$this->m_petugas->update( "master_buku",$datastock ,array("id" => $stockBUKU->id ));

				//hapus data buku yang di pinjam 
				$this->m_petugas->delete(array("id" => $id),"peminjaman");
				echo "Sukses";
			}else {
				echo "Gagal Mengembalikan Buku";
			}

	}

	//kirim tanggal perpanjangan peminjaman buku
	public function modal_perpanjangan()
	{
		$id = $this->input->get("id");
		$data = $this->m_petugas->cari(array("id" => $id) ,"peminjaman")->row();
		echo json_encode($data);
	}


	//update data tanggal pengembalian buku
	public function perpanjanganTanggal()
	{
		$id = $this->input->post("id");
		$tgl_perpanjangan = $this->input->post("tgl_perpanjang");
		$tgl_kembali  = $this->input->post("tgl_kembali");
			
			if( $tgl_kembali >=  $tgl_perpanjangan){
				echo "Tanggal perpanjangan tidak boleh lebih kecil dari tanggal kembali";
			}else {
					$data = array(
						"tgl_kembali"	 	=> $tgl_perpanjangan ,
						"perpanjangan"		=> 'Y'	
					);
					$perpanjang = $this->m_petugas->update( "peminjaman",$data,array("id" => $id ));
					if($perpanjang){
						echo "Berhasil";
					}else {
						echo "Gagal";
					}
				
			}

	}
}