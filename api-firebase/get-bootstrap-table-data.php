<?php
session_start();

// set time for session timeout
$currentTime = time() + 25200;
$expired = 3600;

// if session not set go to login page
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}

// if current time is more than session timeout back to login page
if ($currentTime > $_SESSION['timeout']) {
    session_destroy();
    header("location:index.php");
}

// destroy previous session timeout and create new one
unset($_SESSION['timeout']);
$_SESSION['timeout'] = $currentTime + $expired;

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


include_once('../includes/custom-functions.php');
$fn = new custom_functions;
include_once('../includes/crud.php');
include_once('../includes/variables.php');
$db = new Database();
$db->connect();
$config = $fn->get_configurations();


if (isset($_GET['table']) && $_GET['table'] == 'sellers') {
    $sql="SELECT * FROM sellers";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    $bulkData = array();
    foreach ($res as $row) {
        $operate = '<a href="edit-seller.php?id=' . $row['id'] . '" class="label label-primary" title="Edit">Edit</a>';
        
        $tempRow['id'] = $row['id'];
        $tempRow['name'] = $row['name'];
        $tempRow['email'] = $row['email'];
        $tempRow['mobile'] = $row['mobile'];
        $tempRow['pincode'] = $row['pincode'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;

    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));

}

if (isset($_GET['table']) && $_GET['table'] == 'deliveryboys') {
    $sql="SELECT * FROM deliveryboys";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    $bulkData = array();
    foreach ($res as $row) {
        $operate = '<a href="edit-seller.php?id=' . $row['id'] . '" class="label label-primary" title="Edit">Edit</a>';
        
        $tempRow['id'] = $row['id'];
        $tempRow['name'] = $row['name'];
        $tempRow['dob'] = $row['dob'];
        $tempRow['mobile'] = $row['mobile'];
        $tempRow['password'] = $row['password'];
        $tempRow['pincode'] = $row['pincode'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;

    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));

}

if (isset($_GET['table']) && $_GET['table'] == 'categories') {
    $sql="SELECT * FROM categories";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    $bulkData = array();
    foreach ($res as $row) {
        $operate = '<a href="edit-categories.php?id=' . $row['id'] . '" class="label label-primary" title="Edit">Edit</a>';
        
        $tempRow['id'] = $row['id'];
        $tempRow['name'] = $row['name'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;

    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));

}
if (isset($_GET['table']) && $_GET['table'] == 'products') {
    $sql="SELECT *,sellers.name AS seller_name FROM products,sellers WHERE products.seller_id = sellers.id";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    $bulkData = array();
    foreach ($res as $row) {
        $operate = '<a href="edit-products.php?id=' . $row['id'] . '" class="label label-primary" title="Edit">Edit</a>';
        
        $tempRow['id'] = $row['id'];
        $tempRow['name'] = $row['name'];
        $tempRow['seller_id'] = $row['seller_id'];
        $tempRow['seller_name'] = $row['seller_name'];
        $tempRow['measurement'] = $row['measurement'];
        $tempRow['stock'] = $row['stock'];
        $tempRow['price'] = $row['price'];
        $tempRow['category_id'] = $row['category_id'];
        $tempRow['description'] = $row['description'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;

    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));

}
if (isset($_GET['table']) && $_GET['table'] == 'notification') {
    $sql="SELECT * FROM notification";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    $bulkData = array();
    foreach ($res as $row) {
        $operate = '<a href="edit-notification.php?id=' . $row['id'] . '" class="label label-primary" title="Edit">Edit</a>';
        
        $tempRow['id'] = $row['id'];
        $tempRow['title'] = $row['title'];
        $tempRow['message'] = $row['message'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;

    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));

}
if (isset($_GET['table']) && $_GET['table'] == 'pincode') {
    $sql="SELECT * FROM pincode";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    $bulkData = array();
    foreach ($res as $row) {
        $operate = '<a href="edit-pincode.php?id=' . $row['id'] . '" class="label label-primary" title="Edit">Edit</a>';
        
        $tempRow['id'] = $row['id'];
        $tempRow['pincode'] = $row['pincode'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;

    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));

}
$db->disconnect();
