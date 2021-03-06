<?php
/**
 * 
 */
class LaporanData_Buku extends CI_Controller
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
		$this->template->load("template/template_admin","admin/formlaporanbuku");
	}

	public function report()
	{
		  $this->load->library("excel");

      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array("No", "Kode Buku" ,"Judul Buku" , "Tahun Terbit" ,"Pengarang" , "Genre" ,"Lokasi" , "Jumlah");

      $column = 0;
      $no  = 1 ;
      foreach($table_columns as $field){

        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

        $column++;

      }

      $data = $this->m_admin->sendData("master_buku")->result();

      $excel_row = 2;

      foreach($data as $row){

        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $no++);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->kd_buku);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->judul_buku);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->thn_terbit);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->pengarang);
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->genre);
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->lokasi);
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->jumlah);

        $excel_row++;

      }

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

      header('Content-Type: application/vnd.ms-excel');

      header('Content-Disposition: attachment;filename="RptDataBuku.xls"');

      $object_writer->save('php://output');
	}
}