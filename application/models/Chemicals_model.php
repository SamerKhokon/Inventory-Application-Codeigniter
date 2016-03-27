<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chemicals_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function getAllChemicals() {
		return $this->db->query("select * from chemicals");
	}
	
	public function getTotalChemicals() {
		return $this->db->count_all("chemicals");
	}

	
}	
