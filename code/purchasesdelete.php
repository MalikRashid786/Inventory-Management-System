<?php
include '../config.php';
$purid=$_REQUEST["purid"];
$query="delete from tbl_purchases where purch_id='$purid'";
mysqli_query($connect, $query);
header('location:../order.php');
?>