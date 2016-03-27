<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function getAllSuppliers() {
		return $this->db->query("select * from supplier");
	}

	public function getTotalSupplier() {
		return $this->db->count_all("supplier");
	}
		
}
?>	