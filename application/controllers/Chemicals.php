<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chemicals extends CI_Controller {

	public function index()
	{
		$this->load->model('Chemicals_model');
		$data['chemicals'] = $this->Chemicals_model->getAllChemicals();
		$data['total_chemical'] = $this->Chemicals_model->getTotalChemicals();
		$this->load->view('chemicals_index',$data);
	}
	

        function logs($operation){    
            $this->load->model('Chemicals_model');            
            $user = $this->session->userdata('fullname');
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user',
			'$operation','$date')";
            mysql_query($q);
            return true;
        }
        
        function addchemical(){
            $this->load->model('Chemicals_model');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $qty = $this->input->post('qty');
            $unit = $this->input->post('unit');
            $supplier = $this->input->post('supplier');
            $date = date('m/d/Y H:i');
            $createdBy = $this->session->userdata('fullname');
            echo $q = "insert into chemicals values(null,'$name',
			'$description','$qty','$unit','$supplier','$date','',
			'$createdBy','')";
            mysql_query($q);
            $op = "added $qty chemical ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=chemical&&msg=added");
        }
        
        function updatechemical(){
            $this->load->model('Chemicals_model');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $qty = $this->input->post('qty');
            $unit = $this->input->post('unit');
            $supplier = $this->input->post('supplier');
            $date = date('m/d/Y H:i');
            $updatedBy = $this->session->userdata('fullname');        
            $id = $_GET['id'];

            $q = "UPDATE chemicals set name='$name', description='$description', qty='$qty', unit='$unit', supplier='$supplier', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";

            mysql_query($q);
            $op = "updated $qty chemicals ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=chemical&&msg=updated"); 
        }
        function getchemicals(){            
           $q = "select * from chemicals order by name asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getchemicalbyid($id){
            
            $q = "select * from chemicals where id=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchchemical(){
            $this->load->model('Chemicals_model');
            
            $search = $this->input->post('search');
            $q = "SELECT * FROM chemicals where name like '%$search%' order by name asc";
            $result = mysql_query($q);
            
            if(mysql_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysql_fetch_array($result)):
            echo '
                <tr>
                    <td><a href="editchemical.php?id='.$row['id'].'">'.$row['name'].'</a></td>
                    <td class="text-center">
                        <a href="data/chemical_model.php?p=updateqty&op=plus&id='.$row['id'].'"><i class="text-success fa fa-plus-circle fa-lg"></a></i> 
                        &nbsp;'.$row['qty'].'&nbsp;
                        <a href="data/chemical_model.php?p=updateqty&op=minus&id='.$row['id'].'"><i class="text-danger fa fa-minus-circle fa-lg"></a></i>
                    </td>
                    <td class="text-center">
                        <a href="data/chemical_model.php?p=updateunit&op=plus&id='.$row['id'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>&nbsp;
                        '.$row['unit'].' grams
                        &nbsp;<a href="data/chemical_model.php?p=updateunit&op=minus&id='.$row['id'].'"><i class="text-danger fa fa-minus-circle fa-lg"></a></i>
                    </td>                                                

                </tr>
            ';
            
            endwhile;
        }
        
        function updateqty(){
            $this->load->model('Chemicals_model');
            $id = $_GET['id'];
            $q = "select * from chemicals where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($_GET['op'] == 'plus'){
                $qty = $row['qty'] + 1;
            }else{
                $qty = $row['qty'] - 1;
            }
            if($qty == -1){
                $qty = 0;   
            }
            $initial = $row['qty'];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysql_query("Update chemicals set qty='$qty', dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated quantity from $initial to $qty of chemical ($row[name])";
            $this->logs($op);
            header("Location:../chemicals.php?q=updated&cat=quantity");
        }
        
        function updateunit(){
            $this->load->model('Chemicals_model');
            $id = $_GET['id'];
            $q = "select * from chemicals where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($_GET['op'] == 'plus'){
                $unit = $row['unit'] + 1;
            }else{
                $unit = $row['unit'] - 1;
            }
            if($unit == -1){
                $unit = 0;   
            }
            $initial = $row['unit'];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysql_query("Update chemicals set unit='$unit', dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated unit from $initial to $unit of chemical ($row[name])";
            $this->logs($op);
            header("Location:../chemicals.php?q=updated&cat=unit");
        }
        
        function updateremark(){
            $this->load->model('Chemicals_model');
            $id = $_GET['id'];
            $q = "select * from items where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($_GET['op'] == 'enable'){
                $remark = 'Functional';
            }else{
                $remark = 'Not Functional';
            }

            mysql_query("Update items set remark='$remark' where id=$id");
            $op = "updated item to $remark of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=");
        }
        
        
        function error(){
            //header("location:index.php");   
        }	
	
}	