<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

$res = $db->getResult();

$sql_query = "SELECT value FROM settings WHERE variable = 'Currency'";
$pincode_ids_exc = "";
$db->sql($sql_query);
$res_cur = $db->getResult();

if (isset($_POST['btnAdd'])) {
    if ($permissions['goldsmithmaster']['create'] == 1) {
        $error = array();
        $name = $db->escapeString($fn->xss_clean($_POST['name']));
        $sundry = $db->escapeString($fn->xss_clean($_POST['sundry']));
        $open_debit = $db->escapeString($fn->xss_clean($_POST['open_debit']));
        $open_credit = $db->escapeString($fn->xss_clean($_POST['open_credit']));
        $value =$db->escapeString($fn->xss_clean($_POST['value']));
        $place = $db->escapeString($fn->xss_clean($_POST['place']));
        $address = $db->escapeString($fn->xss_clean($_POST['address']));
        $phone = $db->escapeString($fn->xss_clean($_POST['phone']));
        $tngst = $db->escapeString($fn->xss_clean($_POST['tngst']));
        $pure_debit=$db->escapeString($fn->xss_clean($_POST['pure_debit']));
        $pure_credit=$db->escapeString($fn->xss_clean($_POST['pure_credit']));

        
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
       

        if ( !empty($name))
        {
                $sql = "INSERT INTO goldsmith_master (name,sundry,open_debit,open_credit,value,place,address,phone,tngst,pure_debit,pure_credit) VALUES('$name','$sundry','$open_debit','$open_credit','$value','$place','$address','$phone','$tngst','$pure_debit','$pure_credit')";
                $db->sql($sql);
                $goldsmithmaster_result = $db->getResult();
                if (!empty($goldsmithmaster_result)) {
                    $goldsmithmaster_result = 0;
                } else {
                    $goldsmithmaster_result = 1;
                }
                if ($goldsmithmaster_result == 1) {
                    $error['add_menu'] = "<section class='content-header'>
                                                    <span class='label label-success'>Dealer Goldsmith Master Added Successfully</span>
                                                    <h4><small><a  href='goldsmithmasters.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Goldsmith Master</a></small></h4>
                                                     </section>";
                } else {
                    $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
                }

            }else{
                $error['add_menu'] = " <span class='label label-danger'>Dealer Goldsmith Master Already Exists</span>";

            }


        }
    }else{
        $error['check_permission'] = " <section class='content-header'><span class='label label-danger'>You have no permission to create gold smith master</span></section>";

    }

?>
<section class="content-header">
    <h1>Add Categories</h1>
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
                                    <label for="exampleInputEmail1"> Category Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                    <div class="box-footer">
                        <br>
                        <br>
                        <br>
                        <input type="submit" class="btn-primary btn" value="Add" name="btnAdd" />&nbsp;
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
