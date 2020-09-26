<?php
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
		$data = $this->m_admin->report2($tglawal, $tglakhir , "histori_kembali")->result();
		$this->load->library("excel");

      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array("No", "ID Peminjaman" ,"Judul Buku" , "ID Buku" ,"Peminjam" , "ID Peminjam" ,"Tanggal Pinjam" , "Tanggal Kembali" , "Tanggal Dikembalikan" , "Jam Kembali" , "Denda" , "Telat Pengembalian" , "Total Lama Peminjaman");

      $column = 0;
      $no  = 1 ;
      foreach($table_columns as $field){

        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

        $column++;

      }


      $excel_row = 2;

      foreach($data as $row){

        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $no++);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->id_peminjaman);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->judul_buku);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->kd_buku);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->peminjam);
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->id_peminjam);
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->tgl_pinjam);
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->tgl_kembali);
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->tgl_dikembalikan);
        $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->jam_kembali);
        $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->denda);
        $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->telat_pengembalian);
        $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->total_lama_pinjam);

        $excel_row++;

      }

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

      header('Content-Type: application/vnd.ms-excel');

      header('Content-Disposition: attachment;filename="RptDataPengembalianBuku"' . date('ymd') . '".xls"');

      $object_writer->save('php://output');
	}


}