<?php


/**
 * 
 */
class Peminjaman extends CI_Controller
{
	public function index()
	{
		$data['peminjaman'] = $this->m_petugas->getData("peminjaman")->result();
		$this->template->load("template/template_petugas","petugas/peminjaman",$data);
		/* $tanggal1 = new DateTime($result->tgl_pinjam);
                        $tanggal2 = new DateTime($result->tgl_kembali);
                        $perbedaan = $tanggal2->diff($tanggal1)->format("%a");        */
	}
}