<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;


if (isset($_POST['btnAdd'])) {
    $error = array();
    $name = $db->escapeString($fn->xss_clean($_POST['name']));
    $seller = $db->escapeString($fn->xss_clean($_POST['seller']));
    $measurement = $db->escapeString($fn->xss_clean($_POST['measurement']));
    $stock = $db->escapeString($fn->xss_clean($_POST['stock']));
    $price = $db->escapeString($fn->xss_clean($_POST['price']));
    $category = $db->escapeString($fn->xss_clean($_POST['category']));
    $description = $db->escapeString($fn->xss_clean($_POST['description']));
    $sql = "INSERT INTO products (name,seller,measurement,stock,price,category,description) VALUES('$name','$seller','$measurement','$stock','$price','$category','$description')";
    $db->sql($sql);
    $products_result = $db->getResult();
    if (!empty($products_result)) {
        $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['add_menu'] = " <span class='label label-success'>Success</span>";
    }

} 

?>
<section class="content-header">
    <h1>Add Products</h1>
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
                                    <label for="exampleInputEmail1">Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="name" id = "category-name"required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Seller</label> <i class="text-danger asterik">*</i><?php echo isset($error['seller']) ? $error['seller'] : ''; ?>
                                    <input type="text" class="form-control" name="seller" id = "category-name"required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Measurement</label> <i class="text-danger asterik">*</i><?php echo isset($error['measurement']) ? $error['measurement'] : ''; ?>
                                    <input type="text" class="form-control" name="measurement" id = "category-name"required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Stock</label> <i class="text-danger asterik">*</i><?php echo isset($error['stock']) ? $error['stock'] : ''; ?>
                                    <input type="text" class="form-control" name="stock" id = "category-name"required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Price</label> <i class="text-danger asterik">*</i><?php echo isset($error['price']) ? $error['price'] : ''; ?>
                                    <input type="text" class="form-control" name="price" id = "category-name"required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Category</label> <i class="text-danger asterik">*</i><?php echo isset($error['category']) ? $error['category'] : ''; ?>
                                    <input type="text" class="form-control" name="category" id = "category-name"required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                    <input type="text" class="form-control" name="description" id = "category-name"required>
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
