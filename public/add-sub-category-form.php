<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;


if (isset($_POST['btnAdd'])) {
    $error = array();
    $categories = $db->escapeString($fn->xss_clean($_POST['categories']));
    $sub_category = $db->escapeString($fn->xss_clean($_POST['sub_category']));
    $sql = "INSERT INTO sub_category (categories,sub_category) VALUES('$categories','$sub_category')";
    $db->sql($sql);
    $Result = $db->getResult();
    if (!empty($Result)) {
        $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['add_menu'] = " <span class='label label-success'>Success</span>";
    }

} 

?>
<section class="content-header">
    <h1>Add Sub-Category</h1>
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
                <form id='add_sub_category_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-3'>
                                <label for="exampleInputEmail1"> Categories</label> <i class="text-danger asterik">*</i><?php echo isset($error['categories']) ? $error['categories'] : ''; ?>
                                    <select id='category_id' name="categories" class='form-control' required>
                                    <option value="">Categories</option>
                                                <?php
                                                $sql = "SELECT * FROM `categories`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['id'] ?>'><?= $value['name'] ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Sub-Category</label> <i class="text-danger asterik">*</i><?php echo isset($error['sub_category']) ? $error['sub_category'] : ''; ?>
                                    <input type="text" class="form-control" name="sub_category" id = "sub_category"required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                       
                        
                        <div class="col-md-3">
                            <input type="submit" class="btn-primary btn" value="Add" name="btnAdd" />&nbsp;
                            <!-- <input type="reset" class="btn-danger btn" value="Clear" id="btnClear" /> -->
                            <!--<div  id="res"></div>-->
                        </div>
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
