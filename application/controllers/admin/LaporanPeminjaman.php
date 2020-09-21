<?php
require('./vendor/autoload.php');
date_default_timezone_set('Asia/Jakarta');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * 
 */
class LaporanPeminjaman extends CI_Controller
{
	public function index()
	{
		$this->template->load("template/template_admin","admin/formlaporan");
	}

	public function report()
	{
		$tglawal = $this->input->post("tgl_awal");
		$tglakhir = $this->input->post("tgl_akhir");
		$report = $this->m_admin->report($tglawal, $tglakhir , "histori_pinjam")->result();
		$spreadsheet = new Spreadsheet;
          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'ID Peminjaman')
                      ->setCellValue('C1', 'Judul Buku')
                      ->setCellValue('D1', 'Kode Buku')
                      ->setCellValue('E1', 'Peminjam')
                      ->setCellValue('F1', 'ID Peminjam')
                      ->setCellValue('G1', 'Tanggal Peminjaman');

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
                           ->setCellValue('G' . $kolom, $pengguna->tgl_pinjam);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="RptPeminjaman'. date('ymd').'.xlsx"');
		  header('Cache-Control: max-age=0');
		  $writer->save('php://output');
	}


}