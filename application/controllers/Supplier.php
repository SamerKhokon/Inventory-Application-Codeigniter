<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function index()
	{
		$this->load->model('Supplier_model');
		$data['suppliers'] = $this->Supplier_model->getAllSuppliers();
		$data['total_supplier'] = $this->Supplier_model->getTotalSupplier();
		$this->load->view('supplier_index',$data);
	}
	
	
        function logs($operation){    
            $this->load->model('Supplier_model');         
            $user = $this->session->userdata('fullname');
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }
        
        function addsupplier(){
            $this->load->model('Supplier_model');
            $name = $this->input->post('name');
            $company = $this->input->post('company');
            $contact = $this->input->post('contact');
            $address = $this->input->post('address');
            $email = $this->input->post('email');
            $date = date('m/d/Y H:i');
            $createdBy = $this->session->userdata('fullname');
            echo $q = "insert into supplier values(null,'$name','$company','$contact','$email','$address','$date','','$createdBy','')";
            mysql_query($q);
            $op = "added $qty supplier ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=supplier&&msg=added");
        }
        
        function updatesupplier(){
            $this->load->model('Supplier_model');
            $name = $this->input->post('name');
            $company = $this->input->post('company');
            $contact = $this->input->post('contact');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $date = date('m/d/Y H:i');
            $updatedBy = $this->session->userdata('fullname');        
            $id = $_GET['id'];

            echo $q = "UPDATE supplier set name='$name', company='$company', contact='$contact', email='$email', address='$address', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";

            mysql_query($q);
            $op = "updated supplier ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=supplier&&msg=updated"); 
        }
        
        function getsuppliers(){            
           $q = "select * from supplier order by name asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getsupplierbyid($id){
            
            $q = "select * from supplier where id=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchsupplier(){
            $this->load->model('Supplier_model');
            
            $search = $this->input->post('search');
            $q = "SELECT * FROM supplier where name like '%$search%' or company like '%$search%' order by name asc";
            $result = mysql_query($q);
            if(mysql_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysql_fetch_array($result)):
                echo '
                    <tr>
                        <td><a href="editsupplier.php?id='.$row['id'].'">'.$row['name'].'</a></td>
                        <td class="text-center">'.$row['company'].'</td>
                        <td class="text-center">'.$row['contact'].'</td>
                        <td class="text-center">'.$row['email'].'</td>

                    </tr>
            ';
            
            endwhile;
        }

        function error(){
            //header("location:index.php");   
        }
	

	
}	