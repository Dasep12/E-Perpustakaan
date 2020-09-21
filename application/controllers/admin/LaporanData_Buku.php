<?php
require('./vendor/autoload.php');
date_default_timezone_set('Asia/Jakarta');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * 
 */
class LaporanData_Buku extends CI_Controller
{
	public function index()
	{
		$this->template->load("template/template_admin","admin/formlaporanbuku");
	}

	public function report()
	{
		$report = $this->m_admin->sendData("master_buku")->result();
		$spreadsheet = new Spreadsheet;
          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Kode Buku')
                      ->setCellValue('C1', 'Judul Buku')
                      ->setCellValue('D1', 'Pengarang')
                      ->setCellValue('E1', 'Tahun Terbit')
                      ->setCellValue('F1', 'Genre')
                      ->setCellValue('G1', 'Lokasi')
                      ->setCellValue('H1', 'Jumlah');

          $kolom = 2;
          $nomor = 1;
          foreach($report as $pengguna) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $pengguna->kd_buku)
                           ->setCellValue('C' . $kolom, $pengguna->judul_buku)
                           ->setCellValue('D' . $kolom, $pengguna->kd_buku)
                           ->setCellValue('E' . $kolom, $pengguna->pengarang)
                           ->setCellValue('F' . $kolom, $pengguna->thn_terbit)
                           ->setCellValue('G' . $kolom, $pengguna->lokasi)
                           ->setCellValue('H' . $kolom, $pengguna->jumlah);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="RptDataBuku'. date('ymd').'.xlsx"');
		  header('Cache-Control: max-age=0');
		  $writer->save('php://output');
	}
}