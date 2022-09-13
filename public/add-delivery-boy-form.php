<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;



if (isset($_POST['btnAdd'])) {
    $error = array();
    $name = $db->escapeString($fn->xss_clean($_POST['name']));
    $mobile = $db->escapeString($fn->xss_clean($_POST['mobile']));
    $dob = $db->escapeString($fn->xss_clean($_POST['dob']));
    $password = $db->escapeString($fn->xss_clean($_POST['password']));
    $pincode = $db->escapeString($fn->xss_clean($_POST['pincode']));

    $sql = "INSERT INTO deliveryboys (name,mobile,dob,password,pincode) VALUES('$name','$mobile','$dob','$password','$pincode')";
    $db->sql($sql);
    $deliveryboys_result = $db->getResult();

    if (!empty($deliveryboys_result)) {
        $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
        
    } else {
        $error['add_menu'] = " <span class='label label-success'>Success</span>";
    }
}

    


        
        

?>
<section class="content-header">
    <h1>Add Delivery boy</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='add_goldsmith_master_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Mobile</label> 
                                    <input type="number" class="form-control" name="mobile" >
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Date Of Birth</label> 
                                    <input type="text" class="form-control" name="dob" >
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Password</label> 
                                    <input type="password" class="form-control" name="password" >
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Pincode</label> 
                                    <input type="text" class="form-control" name="pincode" >
                                </div>
                            </div>

                        </div>
                        
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Add delivery boy" name="btnAdd" />&nbsp;
                        <!-- <input type="reset" class="btn-danger btn" value="Clear" id="btnClear" /> -->
                        <!--<div  id="res"></div>-->
                    </div> 
                </form>
            </div>

            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_goldsmith_master_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
         }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });

</script>
