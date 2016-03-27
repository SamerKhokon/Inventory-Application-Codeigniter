<?php
    //include('data/getsupplier.php');
?>
<!--modal item -->

<div class="modal fade" id="additem_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-tint"></i> Add Item</h3>
            </div>            
            <form action="data/item.php?p=additem" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                <div class="form-group input-group">
                    <span class="input-group-addon">Item Name</span>
                    <input type="text" autofocus name="name" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="ckeditor" name="description"></textarea>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Quantity</span>
                    <input type="number" min="0" name="qty" value="1" class="form-control"/>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Units</span>
                    <input type="number" min="0" name="unit" value="1" class="form-control"/>
                    <span class="input-group-addon">
                        <select name="unitsign">
                            <option>Pcs.</option>
                            <option>Box</option>
                        </select>
                    </span>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Remarks</span>
                    <select name="remarks" class="form-control">
                        <option>Functional</option>
                        <option>Not Functional</option>
                    </select>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Supplier</span>
                    <select name="supplier" class="form-control">
                        <?php //while($row = mysql_fetch_array($getsupplier)): ?>
                        <option><?php //echo $row['name'];?></option>
                        <?php //endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="image">
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Cancel</a>
                <input type="submit" value="Save" class="btn btn-success">                
            </div>
            </form>
        </div>
    </div>
</div>

<!--chemicals -->
<div class="modal fade" id="addchemical_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-flask"></i> Add Chemical</h3>
            </div>            
            <form action="data/chemical_model.php?p=addchemical" method="POST">
            <div class="modal-body">
                <div class="form-group input-group">
                    <span class="input-group-addon">Chemical Name</span>
                    <input type="text" autofocus name="name" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="ckeditor" name="description"></textarea>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Quantity</span>
                    <input type="number" min="0" name="qty" value="1" class="form-control"/>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Units</span>
                    <input type="number" min="0" name="unit" value="1" class="form-control"/>
                    <span class="input-group-addon">grams</span>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Supplier</span>
                    
                    <select name="supplier" class="form-control">
                        <?php //while($rows = mysql_fetch_array($getsupplier2)): ?>
                        <option><?php //echo $rows['name'];?></option>
                        <?php ///endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Cancel</a>
                <input type="submit" value="Save" class="btn btn-success">                
            </div>
            </form>
        </div>
    </div>
</div>

<!-- suppliers -->
<div class="modal fade" id="addsupplier_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-truck"></i> Add Suppliers</h3>
            </div>            
            <form action="data/supplier_model.php?p=addsupplier" method="POST">
            <div class="modal-body">
                <div class="form-group input-group">
                    <span class="input-group-addon">Supplier Name</span>
                    <input type="text" autofocus name="name" class="form-control" required/>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Company</span>
                    <input type="text" name="company" class="form-control"/>
                </div>      
                <div class="form-group input-group">
                    <span class="input-group-addon">Contact No.</span>
                    <input type="text" name="contact" class="form-control" required/>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Email Address</span>
                    <input type="text" name="email" class="form-control"/>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Address</span>
                    <input type="text" name="address" class="form-control" required/>
                </div>                
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Cancel</a>
                <input type="submit" value="Save" class="btn btn-success">                
            </div>
            </form>
        </div>
    </div>
</div>

<!-- users -->
<div class="modal fade" id="adduser_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-truck"></i> Add Suppliers</h3>
            </div>            
            
            <form action="data/userdata_model.php?p=adduser" method="POST">
            <div class="modal-body">
                <div class="error"></div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Access Key</span>
                    <input type="text" autofocus id="access-key" class="form-control" required/>
                </div>
                <hr />
                <div class="hidethis">
                    <div class="form-group input-group">
                        <span class="input-group-addon">Firstname</span>
                        <input type="text" name="fname" class="form-control" required/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Lastname</span>
                        <input type="text" name="lname" class="form-control" required/>
                    </div>      
                    <div class="form-group input-group">
                        <span class="input-group-addon">Username</span>
                        <input type="text" name="username" class="form-control username" required/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Password</span>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Contact</span>
                        <input type="text" name="contact" class="form-control" required/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Email</span>
                        <input type="email" name="email" class="form-control"/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Address</span>
                        <input type="text" name="address" class="form-control" required/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Cancel</a>
                <input type="submit" value="Save" class="btn btn-success">                
            </div>
            </form>
        </div>
    </div>
</div>