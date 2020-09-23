<?php

/**
 * 
 */
class Backup extends CI_Controller
{
	public function index()
	{
		$this->template->load("template/template_admin","admin/backup_db");
	}

	public function download_db()
	{
		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup();

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('assets/backup_db/e-perpus.zip', $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('e-perpus.zip', $backup);
	}
}