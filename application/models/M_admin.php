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
}