<?php

/**
 * 
 */
class M_admin extends CI_Model
{
	public function sendData($table)
	{
		return $this->db->get($table);
	}

	public function cari($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function input($data,$table)
	{
		return $this->db->insert($data,$table);
	}


	public function update($data,$table,$where)
	{
		$this->db->where($where);
		return $this->db->update($data,$table);
	}

	public function delete($where,$table)
	{
		$this->db->where($where);
		return $this->db->delete($table);

	}


	public function insert($data)
	{
		$this->db->insert_batch('master_buku', $data);
	}

	//ambiil report peminjaman buku berdasarkan 2 tanggal
	public function report($tgl_awal, $tgl_akhir , $table)
	{
		$this->db->where("tgl_pinjam >=",$tgl_awal);
		$this->db->where("tgl_pinjam <=",$tgl_akhir);
		return $this->db->get($table);

	}

	//ambiil report pengembalian buku berdasarkan 2 tanggal
	public function report2($tgl_awal, $tgl_akhir , $table)
	{
		$this->db->where("tgl_dikembalikan >=",$tgl_awal);
		$this->db->where("tgl_dikembalikan <=",$tgl_akhir);
		return $this->db->get($table);

	}

	//buat grafik peminjaman buku
	public function grafikPinjam($where)
	{
		$query = $this->db->query("SELECT COUNT(tgl_pinjam) as total FROM histori_pinjam WHERE tgl_pinjam LIKE '%". $where ."%' ");
		return $query->row() ;
	}
}