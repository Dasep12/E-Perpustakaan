<?php
require('./vendor/autoload.php');
date_default_timezone_set('Asia/Jakarta');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * 
 */
class LaporanPengembalian extends CI_Controller
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
		$this->template->load("template/template_admin","admin/formlaporankembali");
	}

	public function report()
	{
		$tglawal = $this->input->post("tgl_awal");
		$tglakhir = $this->input->post("tgl_akhir");
		$report = $this->m_admin->report2($tglawal, $tglakhir , "histori_kembali")->result();
		$spreadsheet = new Spreadsheet;
          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'ID Peminjaman')
                      ->setCellValue('C1', 'Judul Buku')
                      ->setCellValue('D1', 'Kode Buku')
                      ->setCellValue('E1', 'Peminjam')
                      ->setCellValue('F1', 'ID Peminjam')
                      ->setCellValue('G1', 'Tanggal Pinjam')
                      ->setCellValue('H1', 'Tanggal Kembali')
                      ->setCellValue('I1', 'Tanggal Dikembalikan')
                      ->setCellValue('J1', 'Lama Peminjaman')
                      ->setCellValue('K1', 'Terlambat Pengembalian');

          $kolom = 2;
          $nomor = 1;
          foreach($report as $pengguna) {
               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $pengguna->id_peminjaman)
                           ->setCellValue('C' . $kolom, $pengguna->judul_buku)
                           ->setCellValue('D' . $kolom, $pengguna->kd_buku)
                           ->setCellValue('E' . $kolom, $pengguna->peminjam)
                           ->setCellValue('F' . $kolom, $pengguna->id_peminjam)
                           ->setCellValue('G' . $kolom, $pengguna->tgl_pinjam)
                           ->setCellValue('H' . $kolom, $pengguna->tgl_kembali)
                           ->setCellValue('I' . $kolom, $pengguna->tgl_dikembalikan)
                           ->setCellValue('J' . $kolom, $pengguna->total_lama_pinjam)
                           ->setCellValue('K' . $kolom, $pengguna->telat_pengembalian);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
    		  header('Content-Disposition: attachment;filename="RptPengembalian'. date('ymd').'.xlsx"');
    		  header('Cache-Control: max-age=0');
    		  $writer->save('php://output');
	}


}