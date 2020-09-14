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
}