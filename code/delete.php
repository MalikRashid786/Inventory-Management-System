<?php
include '../config.php';
$cid=$_REQUEST["cid"];
$query="delete from tbl_category where cate_id='$cid'";
mysqli_query($connect, $query);
header('location:../category.php');
?>