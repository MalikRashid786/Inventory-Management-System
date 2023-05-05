<?php
include"../config.php";
$purname=$_POST["purname"];
$purquantity=$_POST["purquantity"];
$purbrand =$_POST["purbrand"];
$purcategory =$_POST["purcategory"];
$purprice =$_POST["purprice"];
$puraddress=$_POST["puraddress"];
$purcontact=$_POST['purcontact'];
$query="insert into tbl_purchases(purname,purquantity,purbrand,purcategory,purprice,puraddress,purcontact,date) values('$purname','$purquantity','$purbrand','$purcategory','$purprice','$puraddress','$purcontact',now())";
mysqli_query($connect,$query);
header("location:../order.php");
?>