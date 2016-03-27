<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
<?php 
    //include('data/chemical_model.php');    
    //$datachemical = new Chemical_data();
?>
           
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Chemicals
                        </h1>
                        <div class="input-group">
                            <span class="input-group-addon alert-danger"><a href="#addchemical_modal" data-toggle="modal">Add New</a></span>
                            <input type="text" class="form-control" id="searchchemical" placeholder="search chemical...">
                        </div>
                        <br />
                        
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li class="active">Chemicals</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                            Chemical <?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
                        </div>  
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Chemical Name</th>
                                        <th>Qty</th>
                                        <th>Units</th>                                        
                                    </tr>
                                </thead>
                                <tbody class="table-chemical">
                                       
                                        <?php if($total_chemical==0): ?>
                                            <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                        <?php endif; ?>
                                        <?php foreach($chemicals->result() as $row): ?>
                                            <tr>
                                                <td><a href="editchemical.php?id=<?php echo $row->id;?>"><?php echo $row->name;?></a></td>
                                                <td class="text-center">
                                                    <a href="data/chemical_model.php?p=updateqty&op=plus&id=<?php echo $row->id;?>"><i class="text-success fa fa-plus-circle fa-lg"></a></i> 
                                                    &nbsp;<?php echo $row->qty;?>&nbsp;
                                                    <a href="data/chemical_model.php?p=updateqty&op=minus&id=<?php echo $row->id;?>"><i class="text-danger fa fa-minus-circle fa-lg"></a></i>
                                                </td>
                                                <td class="text-center">
                                                    <a href="data/chemical_model.php?p=updateunit&op=plus&id=<?php echo $row->id;?>"><i class="text-success fa fa-plus-circle fa-lg"></i></a>&nbsp;
                                                    <?php echo $row->unit;?> grams
                                                    &nbsp;<a href="data/chemical_model.php?p=updateunit&op=minus&id=<?php echo $row->id;?>"><i class="text-danger fa fa-minus-circle fa-lg"></a></i>
                                                </td>                                                
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- /.row -->

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php $this->load->view('include/modal'); ?>
<?php $this->load->view('include/footer'); ?>
