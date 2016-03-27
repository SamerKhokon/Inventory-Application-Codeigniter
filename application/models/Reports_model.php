<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function getAllItems() {
		return $this->db->query("select * from items");
	}
	
	public function getTotalItems() {
		return $this->db->count_all("items");
	}
	
	public function getAllChemicals() {
		return $this->db->query("select * from chemicals");
	}
	
	public function getTotalChemicals() {
		return $this->db->count_all("chemicals");
	}
	
	public function getAllSuppliers() {
		return $this->db->query("select * from supplier");
	}

	public function getTotalSupplier() {
		return $this->db->count_all("supplier");
	}

	
	public function getAllUserdata() {
		return $this->db->query("select * from userdata");
	}
	public function getTotalUserdata() {
		return $this->db->count_all("userdata");
	}


	
	public function getAllLogs() {
		return $this->db->query("select * from logs 
						order by date desc 
						limit 0,20");
    }
	

	
}
?>