<?php
include '../config.php';
$bid=$_REQUEST["bid"];
$query="delete from tbl_brand where brand_id='$bid'";
mysqli_query($connect, $query);
header('location:../brand.php');
?>