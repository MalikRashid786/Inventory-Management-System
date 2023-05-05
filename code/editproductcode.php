<?php 
include '../config.php';
$proid=$_POST['proid'];
$purname=$_POST['purname'];
$purquantity=$_POST['purquantity'];
$purbrand=$_POST['purbrand'];
$purcategory=$_POST['purcategory'];
$purprice=$_POST['purprice'];
$query="update tbl_product set pname='$purname',pquantity='$purquantity',pbrand='$purbrand',pcategory='$purcategory',price='$purprice',date=now() where pro_id='$proid'";
mysqli_query($connect,$query);
header("location:../product.php");
?>
