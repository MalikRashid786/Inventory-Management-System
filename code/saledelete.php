<?php
include '../config.php';
$cid=$_REQUEST["sale_id"];
$query="delete from tbl_sale where sale_id='$cid'";
mysqli_query($connect, $query);
header('location:../sale.php');
?>