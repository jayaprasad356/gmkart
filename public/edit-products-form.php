<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnUpdate'])) {
    $error = array();
    $name = $db->escapeString($fn->xss_clean($_POST['name']));
    $seller = $db->escapeString($fn->xss_clean($_POST['seller']));
    $measurement = $db->escapeString($fn->xss_clean($_POST['measurement']));
    $stock = $db->escapeString($fn->xss_clean($_POST['stock']));
    $price = $db->escapeString($fn->xss_clean($_POST['price']));
    $category = $db->escapeString($fn->xss_clean($_POST['category']));
    $description = $db->escapeString($fn->xss_clean($_POST['description']));
    $sql = "UPDATE products SET name='$name',seller='$seller',measurement='$measurement',stock='$stock',price='$price',category='$category', description ='$description' WHERE id = '$ID'";
    $db->sql($sql);
    $products_result = $db->getResult();
    if (!empty($products_result)) {
        $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['add_menu'] = " <span class='label label-success'>Success</span>";
    }
    
}

$data = array();

$sql_query = "SELECT * FROM `products` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();
foreach ($res as $row)
$data = $row;

?>
<section class="content-header">
    <h1>Edit Products</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_categories_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="name" value="<?php echo $data['name']?>" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Seller</label> <i class="text-danger asterik">*</i><?php echo isset($error['seller']) ? $error['seller'] : ''; ?>
                                    <input type="text" class="form-control" name="seller" value="<?php echo $data['seller']?>" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Measurement</label> <i class="text-danger asterik">*</i><?php echo isset($error['measurement']) ? $error['measurement'] : ''; ?>
                                    <input type="text" class="form-control" name="measurement" value="<?php echo $data['measurement']?>" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Stock</label> <i class="text-danger asterik">*</i><?php echo isset($error['stock']) ? $error['stock'] : ''; ?>
                                    <input type="text" class="form-control" name="stock" value="<?php echo $data['stock']?>" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Price</label> <i class="text-danger asterik">*</i><?php echo isset($error['price']) ? $error['price'] : ''; ?>
                                    <input type="text" class="form-control" name="price" value="<?php echo $data['price']?>" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Category</label> <i class="text-danger asterik">*</i><?php echo isset($error['category']) ? $error['category'] : ''; ?>
                                    <input type="text" class="form-control" name="category" value="<?php echo $data['category']?>" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1"> Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                    <input type="text" class="form-control" name="description" value="<?php echo $data['description']?>" required>
                                </div>
                            </div>
                        <hr>

                </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
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