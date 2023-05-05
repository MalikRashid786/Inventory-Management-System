<?php 
include("../config.php");
$clientname=$_POST['clientname'];
$date=$_POST['date'];
$product=$_POST['pro'];
$price=$_POST['pri'];
$confprice=$_POST['Confprice'];
$quantity=$_POST['quan'];
$curquan=$_POST['curquan'];
$dis=$_POST['dis'];
$total=$_POST['ta'];
$puramount=$_POST['puramount'];
$purcontact=$_POST['purcontact'];
if($purcontact=="")
{
	$purcontact="--";
}

$avaquant=$quantity-$curquan;
if($curquan>$quantity)
{
	echo "<script>alert('Sorry! We Are out of stock');window.location.href='../buy.php';</script>";
	
}
else{
	//echo "Qty available";
	$query="insert into tbl_sale(clientname,sale_date,product,price,confprice,quantity,curquan,	discount,total,payamount,contact,date) values('$clientname','$date','$product','$price','$confprice','$quantity','$curquan','$dis','$total','$puramount','$purcontact',now())";
	$check=mysqli_query($connect,$query);
	if($check==true)
	{
       $query2="update tbl_product set pquantity='$avaquant' where pro_id='$product'";
       mysqli_query($connect,$query2);
       header("location:../sale.php");
	}
	else{
	  echo "Updattion Error";
	}
}
?>