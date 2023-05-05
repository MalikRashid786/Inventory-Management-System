<?php
include('../config.php');
$categoryname=$_POST["cname"];
$query="insert into tbl_category(cname,date) values('$categoryname',now())";
mysqli_query($connect, $query);
header('location:../category.php');
?>