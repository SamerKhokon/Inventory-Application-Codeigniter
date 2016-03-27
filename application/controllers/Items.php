<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	public function index()
	{
		$this->load->model('Items_model');
		$data['items'] = $this->Items_model->getAllItems();
		$data['total_item'] = $this->Items_model->getTotalItems();
		$this->load->view('items_index',$data);
	}
	
	
	function logs($operation){    
		$this->load->model('Items_model');            
		$user = $this->session->userdata('fullname');
		$date = date('m/d/Y H:i');
		$q = "insert into logs values(null,'$user',
		'$operation','$date')";
		mysql_query($q);
		return true;
	}
        
        function additem(){
            $this->load->model('Items_model');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $qty = $this->input->post('qty');
            $unit = $this->input->post('unit');
            $unitsign = $this->input->post('unitsign');
            $remarks = $this->input->post('remarks');
            $supplier = $this->input->post('supplier');
            $image = $name.'-'.$_FILES["image"]["name"];
            $date = date('m/d/Y H:i');
            $createdBy = $this->sessopm->userdata('fullname');
            $image_size= getimagesize($_FILES['image']['tmp_name']);
            if ($image_size==FALSE) {
                $image = 'default.jpg';
            }else{
                move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $image);
            }
            echo $q = "insert into items values(null,'$name','$description','$qty','$unit','$unitsign','$remarks','$image','$supplier','$date','','$createdBy','')";
            mysql_query($q);
            $op = "added $qty item ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=item&&msg=added");
        }
        
        function updateitem(){
            $this->load->model('Items_model');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $qty = $this->input->post('qty');
            $unit = $this->input->post('unit');
            $unitsign = $this->input->post('unitsign');
            $remarks = $this->input->post('remarks');
            $supplier = $this->input->post('supplier');
            $image = $name.'-'.$_FILES["image"]["name"];
            $date = date('m/d/Y H:i');
            $updatedBy = $this->session->userdata('fullname');
            $image_size= getimagesize($_FILES['image']['tmp_name']);            
            $id = $_GET['id'];
            if($image == $name.'-'){
                $q = "UPDATE items set name='$name', 
					description='$description', qty='$qty', 
					unit='$unit', unitsign='$unitsign', 
					remark='$remarks', supplier='$supplier', 
					dateUpdated='$date', updatedBy='$updatedBy' 
				where id=$id";
            }else{
                if ($image_size==FALSE) {
                    $image = 'default.jpg';
                }else{
                    move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" .$image);   
                }
                $q = "UPDATE items set name='$name', description='$description', qty='$qty', unit='$unit', unitsign='$unitsign', remark='$remarks',image='$image', supplier='$supplier', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";
            }
           
            mysql_query($q);
            $op = "updated $qty item ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=item&&msg=updated"); 
        }
        function getitems(){            
           $q = "select * from items order by name asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getitembyid($id){
            
            $q = "select * from items where id=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchitem(){
            $this->load->model('Items_model');            
            $search = $this->input->post('search');
            $q = "SELECT * FROM items where name like '%$search%' order by name asc";
            $result = mysql_query($q);
            
            if(mysql_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysql_fetch_array($result)):
            if($row['remark']=='Functional'){
                $class = "fa fa-thumbs-o-up fa-lg text-success";
                $op = 'disable';
            }else{
                $class = "fa fa-thumbs-o-down fa-lg text-danger";
                $op = 'enable';
            }
            echo '  <tr>
                    <td><a href="edititem.php?id='.$row['id'].'">'.$row['name'].'</a></td>
                    <td class="text-center">
                        <a href="data/item.php?p=updateqty&op=plus&id='.$row['id'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>&nbsp; 
                        '.$row['qty'].'
                        &nbsp;<a href="data/item.php?p=updateqty&op=minus&id='.$row['id'].'"><i class="text-danger fa fa-minus-circle fa-lg"></i></a></td>
                    <td class="text-center">
                        <a href="data/item.php?p=updateunit&op=plus&id='.$row['id'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>
                        &nbsp; '.$row['unit'].' '.$row['unitsign'].' &nbsp;
                        <a href="data/item.php?p=updateunit&op=minus&id='.$row['id'].'"><i class="text-danger fa fa-minus-circle fa-lg"></i></a>
                        </td>
                        <td class="text-center">  
                        <a href="data/item.php?p=updateremark&op='.$op.'&id='.$row['id'].'"<i class="'.$class.'"></i>
                        </td>
                </tr>';
            endwhile;
        }
        
        function updateqty(){
            $this->load->model('Items_model');
            $id = $_GET['id'];
            $q = "select * from items where id=$id";
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
            $date = date('m/d/Y H:i');
            $updatedBy = $this->session->userdata('fullname');
            $initial = $row['qty'];
            mysql_query("Update items set qty='$qty', dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated quantity from $initial to $qty of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=quantity");
        }
        
        function updateunit(){
            $this->load->model('Items_model');
            $id = $_GET['id'];
            $q = "select * from items where id=$id";
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
            $updatedBy = $this->session->userdata('fullname');
            mysql_query("Update items set unit='$unit',dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated unit from $initial to $unit of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=unit");
        }
        
        function updateremark(){
            $this->load->model('Items_model');
            $id = $_GET['id'];
            $q = "select * from items where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($_GET['op'] == 'enable'){
                $remark = 'Functional';
            }else{
                $remark = 'Not Functional';
            }
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysql_query("Update items set remark='$remark',dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated item to $remark of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=");
        }
        
        
        function error(){
            //header("location:index.php");   
        }
	
}	