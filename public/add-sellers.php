<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;


if (isset($_POST['btnAdd'])) {
    $error = array();
    $name = $db->escapeString($fn->xss_clean($_POST['name']));
    $email = $db->escapeString($fn->xss_clean($_POST['email']));
    $mobile = $db->escapeString($fn->xss_clean($_POST['mobile']));
    $password = $db->escapeString($fn->xss_clean($_POST['password']));
    $street = $db->escapeString($fn->xss_clean($_POST['street']));
    $pincode = $db->escapeString($fn->xss_clean($_POST['pincode']));
    $city = $db->escapeString($fn->xss_clean($_POST['city']));
    $state = $db->escapeString($fn->xss_clean($_POST['state']));
 
    $sql = "INSERT INTO sellers (name,email,mobile,password,street,pincode,city,state) VALUES('$name','$email','$mobile','$password','$street','$pincode','$city','$state')";
    $db->sql($sql);
    $sellers_result = $db->getResult();

    if (!empty($sellers_result)) {
         
        $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['add_menu'] = "<span class='label label-success'>Success</span>";

    }
}



?>
<section class="content-header">
    <h1>Add sellers</h1>
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
                                    <label for="exampleInputEmail1">  Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Email</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="email" id="email" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Mobile</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="mobile" id="mobile" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Password</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="password" id="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Street</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="street" id="street"  required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> pincode</label> <i class="text-danger asterik">*</i><?php echo isset($error['pincode']) ? $error['pincode'] : ''; ?>
                                    <select id='pincode_id' name="pincode_id" class='form-control' required>
                                    <option value="">Select Pincode</option>
                                                <?php
                                                $sql = "SELECT * FROM `pincode`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['id'] ?>'><?= $value['pincode'] ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> City</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="city" id="city" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> State</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="state" id="state" required>
                                </div>
                            </div>
                        </div>

                    <div class="box-footer ">
                       
                        <input type="submit" class="btn-primary btn"  value="Add" name="btnAdd" />&nbsp;
                        <!-- <input type="reset" class="btn-danger btn" value="Clear" id="btnClear" /> -->
                        <!--<div  id="res"></div>-->
                    </div>
                </form>
            </div>
            <!-- php echo isset($error['check_permission']) ? $error['check_permission'] : '';  -->
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
