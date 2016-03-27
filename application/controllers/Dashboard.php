<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	

	public function index()
	{
	    $this->load->model('Dashboard_model');
		
		$data['items'] = $this->Dashboard_model->getAllItems();
		$data['total_item'] = $this->Dashboard_model->getTotalItems();
		
		$data['chemicals'] = $this->Dashboard_model->getAllChemicals();
		$data['total_chemicals'] = $this->Dashboard_model->getTotalChemicals();
		
		$data['suppliers'] = $this->Dashboard_model->getAllSuppliers();
		$data['total_suppliers'] = $this->Dashboard_model->getTotalSupplier();
				
		$data['userdata'] = $this->Dashboard_model->getAllUserdata();
		$data['total_userdata']= $this->Dashboard_model->getTotalUserdata();
		
		$data['logs'] = $this->Dashboard_model->getAllLogs();
		
		
		$this->load->view('dashboard_index' , $data);
	}
}
