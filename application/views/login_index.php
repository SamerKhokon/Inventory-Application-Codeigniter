<?php
   /* if(isset($this->session->userdata('login'))){
        header('location: '.site_url().'/dashboard/');   
    }*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>(:: Inventory System ::) </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/myscript.js"></script>
</head>
<body>

<div class="container">

<!-- IPad Login - START -->
<div class="container">
    <div class="row">
        <div class="contcustom">
            <span class="fa fa-user bigicon"></span>
            <h2>Admin Panel</h2>          
            <div>
                <div class="error"></div>
                <input type="text" placeholder="username" name="username" id="username" autofocus />
                <input type="password" placeholder="password" name="password" id="password" />
                
                <button class="btn btn-default wide" id="login">
				<span class="fa fa-lock med"> login</span></button>
            </div>         
        </div>
    </div>
</div>


<style>
body {
    background-color: #F0EEEE;
}

.row {
    padding:20px 0px;
    margin-top: 5%;
}

.bigicon {
    font-size:97px;
    color: #f96145;
}

.contcustom {
    text-align: center;
    width: 300px;
    border-radius: 0.5rem;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 10px auto;
    background-color: white;
    padding: 20px;
}   

input {
    width: 100%;
    margin-bottom: 17px;
    padding: 15px;
    background-color: #ECF4F4;
    border-radius: 2px;
    border: none;
}

h2 {
    margin-bottom: 20px;
    font-weight: bold;
    color: #ABABAB;
}

.btn {
    border-radius: 2px;
    padding: 10px;     
}

.med {
    font-size: 27px;
    color: white;
}

.wide {
    background-color: #8EB7E4;
    width: 100%;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    -moz-border-radius-topright: 0;
    -moz-border-radius-bottomright: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
</style>

<!-- IPad Login - END -->
</div>

</body>
</html>