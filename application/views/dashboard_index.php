<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
<?php
    /*$r1 = mysql_query("select * from items");
    $r2 = mysql_query("select * from chemicals");
    $r3 = mysql_query("select * from supplier");
    $r4 = mysql_query("select * from userdata");
    $logs = mysql_query("select * from logs order by date desc limit 0,20");
    $countitem = mysql_num_rows($r1);
    $countchemical = mysql_num_rows($r2);
    $countsupplier = mysql_num_rows($r3);
    $countuser = mysql_num_rows($r4);
    */
	
	$r1 = $items;
	$r2 = $chemicals;
	$r3 = $suppliers;
	$r4 = $userdata;
	$countitem = $total_item;
    $countchemical = $total_chemicals;
    $countsupplier = $total_suppliers;
    $countuser = $total_userdata;
	
	//echo ;
	
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tint fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countitem; ?></div>
                                        <div>Items!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url();?>/items">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-flask fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countchemical; ?></div>
                                        <div>Chemicals!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url();?>/chemicals">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-truck fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countsupplier; ?></div>
                                        <div>Suppliers!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url();?>/supplier">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countuser; ?></div>
                                        <div>Users!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url();?>/userdata">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Logs</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php foreach($logs->result() as $row){ ?>
                                    <a href="#" class="list-group-item">
                                        <span class="badge"><?php echo $row->date;?></span>
                                        <i class="fa fa-fw fa-calendar"></i>
                                        <?php echo $row->user.' '.$row->operation; ?>
                                    </a>
                                    <?php }; ?>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo site_url();?>/reports">View All Activity 
									<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
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

<?php $this->load->view('include/footer'); ?>
