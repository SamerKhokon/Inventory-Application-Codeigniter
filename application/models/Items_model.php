<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends CI_Model {

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
	
}	
