<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata extends CI_Controller {

	public function index()
	{
		$this->load->model('Userdata_model');
		$data['users'] = $this->Userdata_model->getAllUserdata();
		$data['total_user'] = $this->Userdata_model->getTotalUserdata();
		$this->load->view('userdata_index',$data);
	}
	
	
	
	function logs($operation){    
           $this->load->model('Userdata_model');      
            $user = $this->session->userdata('fullname');
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }
        
        function adduser(){
            $this->load->model('Userdata_model');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $username = $this->input->post('username');
            $password = sha1($this->input->post('password'));
            $contact = $this->input->post('contact');
            $address = $this->input->post('address');
            $email = $this->input->post('email');
            $date = date('m/d/Y H:i');
            echo $q = "insert into userdata values(null,'$fname','$lname','$username','$password','$contact','$email','$address','$date','')";
            mysql_query($q);
            $op = "added $fname $lastname";
            $this->logs($op);
            header("Location:../success.php?cat=user&&msg=added");
        }
        
        function updateuser(){
            $this->load->model('Userdata_model');
             $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $username = $this->input->post('username');
            $password = sha1($this->input->post('password'));
            $contact = $this->input->post('contact');
            $address = $this->input->post('address');
            $email = $this->input->post('email');
            $date = date('m/d/Y H:i');      
            $id = $_GET['id'];

            echo $q = "UPDATE userdata set fname='$fname',lname='$lname',username='$username',password='$password', contact='$contact', email='$email', address='$address', dateUpdated='$date' where id=$id";

            mysql_query($q);
            $op = "updated $fname $lname";
            $this->logs($op);
            header("Location:../success.php?cat=user&&msg=updated"); 
        }
        
        function getusers(){            
           $q = "select * from userdata order by fname asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getuserbyid($id){
            
            $q = "select * from userdata where id=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchuser(){
           $this->load->model('Userdata_model');
            
            $search = $this->input->post('search');
            $q = "SELECT * FROM userdata where fname like '%$search%' or lname like '%$search%' or username like '%$search%' order by fname asc";
            $result = mysql_query($q);
            if(mysql_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            while($row = mysql_fetch_array($result)):
               echo ' <tr>
                    <td class="text-center"><a href="edituserdata.php?id='.$row['id'].'">'.$row['fname'].'</a></td>
                    <td class="text-center">'.$row['lname'].'</td>
                    <td class="text-center">'.$row['username'].'</td>
                    <td class="text-center">'.$row['contact'].'</td>
                    <td class="text-center">'.$row['email'].'</td>                                                
                </tr>';
            endwhile;
        }

        function error(){
            //header("location:index.php");   
        }
	
}	
