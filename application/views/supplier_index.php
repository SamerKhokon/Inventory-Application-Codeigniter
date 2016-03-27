<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
<?php 
    //include('data/supplier_model.php');    
    //$datasupplier = new Supplier_data();
?>
           
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Suppliers
                        </h1>
                        <div class="input-group">
                            <span class="input-group-addon alert-danger"><a href="#addsupplier_modal" data-toggle="modal">Add New</a></span>
                            <input type="text" class="form-control" id="searchsupplier" placeholder="search supplier...">
                        </div>
                        <br />
                        
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li class="active">Supplier</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                            Supplier <?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
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
                                        <th>Supplier Name</th>
                                        <th>Company</th>
                                        <th>Contact</th>                                        
                                        <th>Email</th>                                                                        
                                    </tr>
                                </thead>
                                <tbody class="table-supplier">
                                        <?php //$supplier = $datasupplier->getsuppliers(); ?>
                                        <?php if($total_supplier==0): ?>
                                            <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                        <?php endif; ?>
                                        <?php foreach($suppliers->result() as $row): ?>
                                            <tr>
                                                <td><a href="editsupplier.php?id=<?php echo $row->id;?>"><?php echo $row->name;?></a></td>
                                                <td class="text-center"><?php echo $row->company;?></td>
                                                <td class="text-center"><?php echo $row->contact;?></td>
                                                <td class="text-center"><?php echo $row->email;?></td>
                                                                                
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
