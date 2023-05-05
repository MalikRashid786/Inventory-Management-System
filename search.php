<?php
include("config.php");
if(isset ($_POST["query"]))
{
	$output='';
	$query="select * from tbl_product where pname like '%".$_POST["query"]."%'";
	$result = mysqli_query($connect,$query);
	$output= '<ol class="list-unstlyed">';
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			$output .='<a href="searchproduct.php?ser_id='.$row["pro_id"].'"><li style="padding-top:10px">'.$row["pname"].'</li></a>';
		}
	}
	else
	{
		$output .= '<li style="list-style-type:none;margin-top:20px;font-size:19px;"> Product Not Found</li>';
	}
	$output .='</ol>';
	echo $output;
}
?>