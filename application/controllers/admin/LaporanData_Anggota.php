<?php
require('./vendor/autoload.php');
date_default_timezone_set('Asia/Jakarta');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * 
 */
class LaporanData_Anggota extends CI_Controller
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
		$this->template->load("template/template_admin","admin/formlaporananggota");
	}

	public function report()
	{
		$report = $this->m_admin->sendData("member")->result();
		$spreadsheet = new Spreadsheet;
          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'ID Anggota')
                      ->setCellValue('C1', 'Nama')
                      ->setCellValue('D1', 'No Telpon')
                      ->setCellValue('E1', 'Email')
                      ->setCellValue('F1', 'Alamat');

          $kolom = 2;
          $nomor = 1;
          foreach($report as $pengguna) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $pengguna->id_user)
                           ->setCellValue('C' . $kolom, $pengguna->nama)
                           ->setCellValue('D' . $kolom, $pengguna->no_telp)
                           ->setCellValue('E' . $kolom, $pengguna->email)
                           ->setCellValue('F' . $kolom, $pengguna->alamat);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="RptDataAnggota'. date('ymd').'.xlsx"');
		  header('Cache-Control: max-age=0');
		  $writer->save('php://output');
	}
}