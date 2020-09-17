<?php

 /**
  * 
  */
 class M_petugas extends CI_Model
 {

 	public function getData($table)
 	{
 		return $this->db->get($table);
 	}

 	public function input($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}

 	public function update($data,$table,$where)
	{
		$this->db->where($where);
		return $this->db->update($data,$table);
	}

 	public function cari($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

 	 public function getSelect($key)
    {
    	$this->db->select("*");
    	$this->db->limit(10);
    	$this->db->from("member");
    	$this->db->like("id_user" , $key);
    	$this->db->or_like("nama" , $key);
    	return $this->db->get()->result_array();
    }

 }