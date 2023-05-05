<?php
include '../config.php';
$pid=$_REQUEST["pid"];
$query="delete from tbl_product where pro_id='$pid'";
mysqli_query($connect, $query);
header('location:../product.php');
?>