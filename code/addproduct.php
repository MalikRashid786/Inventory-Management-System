<?php
include("../config.php");
$pname=$_POST["pname"];
$pquantity=$_POST["pquantity"];
$pbrand=$_POST["pbrand"];
$pcategory=$_POST["pcategory"];
$price=$_POST["price"];
$query="insert into tbl_product(pname,pquantity,pbrand,pcategory,price,date) values('$pname','$pquantity','$pbrand','$pcategory','$price',now())";
mysqli_query($connect,$query);
header("location:../product.php");
?>