<?php
include("header.php");
include("config.php");
$bfid=$_REQUEST["bfid"];
$query="select * from tbl_brand";
$result=mysqli_query($connect,$query);
$query1="select * from tbl_category";
$result1=mysqli_query($connect,$query1);
$query2="select * from tbl_product where pbrand='$bfid'";
$result2=mysqli_query($connect,$query2);
$query3="select * from tbl_brand where brand_id='$bfid'";
$result3=mysqli_query($connect,$query3);
?>
<section id="category">
 <div class="container-fluid bg-gradient-danger" style="min-height: 100vh">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow ">
            <div class="card-header border-0">
              <h3 class="mb-0 text-uppercase"data-aos="fade-up"><span class="text-danger display-4"><?php if($row3=mysqli_fetch_array($result3)){
              	echo $row3['bname'];
              } ?></span> <span style="font-size: 14px;">Products</span></h3>
              <a href="brand.php" class="float-right"><button type="button"data-aos="fade-left" class="btn text-white bg-gradient-danger mr-4" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Back</button></a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>                 
                    <th scope="col">Price (<i class="fa fa-rupee"></i>)</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $a=0;
                     while ($row2=mysqli_fetch_array($result2)) {
                       $a++;
                       $categoryid=$row2["pcategory"];
                     $query3="select * from tbl_category where cate_id='$categoryid'";
                     $result3=mysqli_query($connect,$query3);
                     $row3=mysqli_fetch_array($result3);

                     $brandid=$row2["pbrand"];
                     $query4="select * from tbl_brand where brand_id='$brandid'";
                     $result4=mysqli_query($connect,$query4);
                     $row4=mysqli_fetch_array($result4);
                     if ($row2['pquantity']>=3) {
                  ?>
                  <tr  data-aos="fade-right">
                     <td>
                      <?php echo $a,("."); ?>
                    </td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm text-wrap"> <?php echo $row2["pname"]; ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <?php echo $row2["pquantity"]; ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> Available
                      </span>
                    </td>
                    <td>
                      <?php echo $row4["bname"]; ?>
                    </td>
                     <td>
                      <span class="text-wrap"><?php echo $ct=$row3["cname"]; ?></span>
                    </td>
                     <td>
                      <span class="text-wrap"><?php echo $row2["price"]; ?></span>
                    </td>
                    <td>
                      <a href="editproduct.php?pid=<?php echo $row2['pro_id'];?>"><button class="btn"><i class="fa fa-edit" style="font-size: 19px"></i></button></a>
                    </td>
                    <td><a href="code/productdelete.php?pid=<?php echo $row2['pro_id'];?>"><button class="btn text-danger"><i class="fa fa-trash"style="font-size: 19px"></button></a></td>
                  </tr>
                   <?php } 
                    else if ($row2['pquantity']<=3 && $row2['pquantity']>=1) {?>
                      <tbody class="bg-warning text-white"data-aos="fade-right">
                  <tr>
                     <td>
                      <?php echo $a,("."); ?>
                    </td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm text-wrap"> <?php echo $row2["pname"]; ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <?php echo $row2["pquantity"]; ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i> Warnnig
                      </span>
                    </td>
                    <td>
                     <span class="text-wrap"><?php echo $row4["bname"];?></span>
                    </td>
                     <td>
                      <span class="text-wrap"><?php echo $row3["cname"]; ?></span>
                    </td>
                     <td>
                      <?php echo $row2["price"]; ?>
                    </td>
                    <td>
                     <a href="editproduct.php?pid=<?php echo $row2['pro_id'];?>"><button class="btn">
                       <i class="fa fa-edit text-white" style="font-size: 19px"></i>
                     </button></a>
                    </td>
                    <td><a href="code/productdelete.php?pid=<?php echo $row2['pro_id'];?>"><button class="btn text-white"><i class="fa fa-trash"style="font-size: 19px"></i></button></a></td>
                  </tr></tbody>
                    <?php } 
                    if ($row2['pquantity']==0) {?>
                      <tbody class="bg-danger text-white" data-aos="fade-right">
                  <tr>
                     <td>
                      <?php echo $a,("."); ?>
                    </td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm text-wrap"> <?php echo $row2["pname"]; ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <?php echo $row2["pquantity"]; ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> Not Available
                      </span>
                    </td>
                    <td>
                      <span class="text-wrap"><?php echo $row4["bname"]; ?></span>
                    </td>
                     <td>
                      <span class="text-wrap"><?php echo $row3["cname"]; ?></span>
                    </td>
                     <td>
                      <?php echo $row2["price"]; ?>
                    </td>
                    <td>
                     <a href="editproduct.php?pid=<?php echo $row2['pro_id'];?>"><button class="btn text-white" ><i class="fa fa-edit" style="font-size: 19px"></i></button></a>
                    </td>
                    <td><a href="code/productdelete.php?pid=<?php echo $row2['pro_id'];?>"><button class="btn text-white"><i class="fa fa-trash"style="font-size: 19px"></i></button></a></td>
                  </tr></tbody>
                <?php }
                 }?>
                </tbody>
              </table>
            </div>
            <div class="card-footer mt-4">
              
            </div>
          </div>
        </div>
      </div>
 </div>
</section>