<?php 
include '../config.php';
$purch_id=$_POST['purch_id'];
$purname=$_POST['purname'];
$purquantity=$_POST['purquantity'];
$purbrand=$_POST['purbrand'];
$purcategory=$_POST['purcategory'];
$purprice=$_POST['purprice'];
$puraddress=$_POST['puraddress'];
$purcontact=$_POST['purcontact'];
$query="update tbl_purchases set purname='$purname',purquantity='$purquantity',purbrand='$purbrand',purcategory='$purcategory',purprice='$purprice',puraddress='$puraddress',purcontact='$purcontact',date=now() where purch_id='$purch_id'";
mysqli_query($connect,$query);
header("location:../order.php");
?>
