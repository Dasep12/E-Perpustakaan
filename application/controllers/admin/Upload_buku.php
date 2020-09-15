<?php


/**
 * 
 */
class Upload_buku extends CI_Controller
{
	public function index()
	{
		$this->template->load("template/template_admin","admin/upload_buku");
	}


	public function import()
	{
		$this->load->library('excel');

		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$kdbuku = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$cekKodeBuku = $this->m_admin->cari(array("kd_buku" => $kdbuku),"master_buku")->num_rows();
					$kode = $this->m_admin->cari(array("kd_buku" => $kdbuku),"master_buku")->row();
					if($cekKodeBuku > 0 ){
						$alert = "Kode Buku " . $kode->kd_buku  . " sudah di gunakan" ;
						break ;
					}else {
						$judulbuku = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$pengarang = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$thn_terbit = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$genre = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$lokasi = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$jumlah = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$data[] = array(
							"kd_buku"				=>	$kdbuku,
							"judul_buku"			=>	$judulbuku,
							"thn_terbit"			=>	$thn_terbit,
							"lokasi"				=>	$lokasi,
							"jumlah"				=>	$jumlah,
							"pengarang"				=>	$pengarang,
							"genre"					=>	$genre,
						);

					}

				}
			}
			if($cekKodeBuku > 0 ){
				echo $alert;
			}else {
				$p = $data;
				$this->m_admin->insert($data);
				echo json_encode($p);
			}
		}	
	}
}