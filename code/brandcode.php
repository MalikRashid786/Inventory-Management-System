<?php
include"../config.php";
$brandname=$_POST["bname"];
$query="insert into tbl_brand(bname,date) values('$brandname',now())";
mysqli_query($connect,$query);
header("location:../brand.php");
?>