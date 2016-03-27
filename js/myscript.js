$(function(){
   
    //login page
    $('#login').on('click',function(){
        var username = $('#username').val();
        var password = $('#password').val();
        $.post('data/data.php?p=verifylogin',
               {
                    username:username,
                    password:password
               }
               ,function(data){
			   //alert(data);
                   $('#login').children().removeClass('fa-lock').addClass('fa-unlock').html(' verifying...');                   
                   if(parseInt(data) == '1'){                      
                        setInterval(function(){
                            window.location = 'index.php';
                        },1500); 
                   }else{
                       setInterval(function(){
                            $('.error').addClass('alert alert-danger').html('Login Failed!<br />Incorrect Username/Password');
                            $('#login').children().removeClass('fa-unlock').addClass('fa-lock').html(' login');                     
                        },1000);
                         
                   }
            
        });
    });
    
    //link
    var pathname = $(location).attr('href');
    $('.side-nav').find('li').children('a[href="'+pathname+'"]').parent().addClass('active');
    
    //search item
    
    $('#searchitem').on('keyup',function(){
        var search = $(this).val();
        $.post('data/item.php?p=searchitem',{ search:search },function(data){
            $('.table-item').html(data);
        });
    });
    
    //search chemical
    $('#searchchemical').on('keyup',function(){
        var search = $(this).val();
        $.post('data/chemical_model.php?p=searchchemical',{ search:search },function(data){
            $('.table-chemical').html(data);
        });
    });
    
    //search supplier
    $('#searchsupplier').on('keyup',function(){
        var search = $(this).val();
        $.post('data/supplier_model.php?p=searchsupplier',{ search:search },function(data){
            $('.table-supplier').html(data);
        });
    });
    
    //search user
    $('#searchuser').on('keyup',function(){
        var search = $(this).val();
        $.post('data/userdata_model.php?p=searchuser',{ search:search },function(data){
            $('.table-user').html(data);
        });
    });
    
    //update item
    $('.updateitem').on('click',function(){
        var id = $(this).parent().siblings('.hidden').val();
        $('#itemid').val(id);
    });
    //confirmation
    $('.confirmation').on('click',function(){
        var confirmation = confirm("Are you sure?");
        if(confirmation){
            return true;   
        }else{
            return false;   
        }
    });
    
    //access key
    $('#access-key').on('keyup',function(){
        var key = $(this).val();    
        $.post('data/data.php?p=verifykey',{ key:key }, function(data){
            if(data == 1){
                $('.hidethis').toggle(300);
            }else {
                $('.hidethis').hide(300);
            }
        });
    });
    
    //check username
    $('.username').on('keyup',function(){
        var username = $(this).val();    
        $.post('data/data.php?p=verifyusername',{ username:username }, function(data){
            if(data == 1){
                $('.error').addClass('alert alert-danger').html('Username is not available!');
            }else{
                $('.error').removeClass('alert alert-danger').html('');
            }
        });
    });  
    
    //print report
    $('.filter').on('change',function(){
        showreports();
    });
    //btnreport
    $('.btnreport').on('click',function(){
        showreports();
    });
    
   //daterange
    $( "#dateFrom" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#dateTo" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#dateTo" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#dateFrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    
   
});

function showreports(){
    var datefrom = $('#dateFrom').val();
        var dateto = $('#dateTo').val();
        var report = $('.filter').val();
        $.post('data/report_model.php',
       {
           datefrom:datefrom,
           dateto:dateto,
           report:report
       },function(data){
            $('.reports').html(data);
       });   
}