<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function getAllUserdata() {
		return $this->db->query("select * from userdata");
	}
	public function getTotalUserdata() {
		return $this->db->count_all("userdata");
	}
	
}
?>	