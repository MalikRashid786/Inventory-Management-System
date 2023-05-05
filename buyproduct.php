<?php
include("config.php");
$id=$_POST['id'];
$output='';
if($id!="")
{
$query="Select * from tbl_product where pro_id= '".$id."' order by price";
$res=mysqli_query($connect, $query);
$output='';
while($row = mysqli_fetch_array($res))
{
	$output = '<input type="text"class="form-control" id="pri"readonly name="pri" value="'.$row['price'].'">';
}
echo $output;
}
?>