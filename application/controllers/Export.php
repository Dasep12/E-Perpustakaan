<?php

/**
 * 
 */
class Export extends CI_Controller
{
	public function index()
	{

	$this->load->library("excel");

      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);

      $table_columns = array("ID", "Kode Buku");

      $column = 0;

      foreach($table_columns as $field){

        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

        $column++;

      }

      $employee_data = $this->db->get("master_buku")->result();

      $excel_row = 2;

      foreach($employee_data as $row){

        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);

        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->kd_buku);

        $excel_row++;

      }

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

      header('Content-Type: application/vnd.ms-excel');

      header('Content-Disposition: attachment;filename="Data Buku.xls"');

      $object_writer->save('php://output');
	}
}