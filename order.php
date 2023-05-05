<?php
include("header.php");
include("config.php");
$query="select * from tbl_purchases order by purch_id desc";
$result=mysqli_query($connect,$query);
?>
<section id="category">
 <div class="container-fluid bg-gradient-danger" style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow">
            <div class="card-header border-0">
              <p class="mb-0"data-aos="fade-up" style="font-size: 19px;font-weight: bold;">Manage <span class="text-danger display-4">Purchases</span></p>
              <a href="purchases.php"><button type="button"data-aos="fade-down" class="btn text-white bg-gradient-danger float-right mr-3"><img src="images/baseline_add_circle_outline_white_18dp.png" class="img-fluid"> Add Purchases</button></a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                     <th scope="col">SN</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>                 
                    <th scope="col">Price (<i class="fa fa-rupee"></i>)</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete </th>
                  </tr>
                </thead>
                <tbody>
                     <?php 
                    $a=0;
                     while ($row=mysqli_fetch_array($result)) {
                       $a++;
                       $categoryid=$row["purcategory"];
                     $query3="select * from tbl_category where cate_id='$categoryid'";
                     $result3=mysqli_query($connect,$query3);
                     $row3=mysqli_fetch_array($result3);

                     $brandid=$row["purbrand"];
                     $query4="select * from tbl_brand where brand_id='$brandid'";
                     $result4=mysqli_query($connect,$query4);
                     $row4=mysqli_fetch_array($result4);
                       ?>
                  <tr data-aos="fade-right">
                    <td><?php echo $a;; ?></td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm text-wrap"><?php echo $row["purname"]; ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="text-wrap">
                      <?php echo $row["purquantity"]; ?>
                    </td>
                    <td class="text-wrap">
                      <?php echo $row4["bname"]; ?>
                    </td>
                    <td class="text-wrap">
                    <?php echo $row3["cname"]; ?>
                    </td>
                     <td>
                     <?php echo $row["purprice"]; ?>
                    </td>
                     <td class="text-wrap">
                      <?php echo $row["puraddress"]; ?>
                    </td>
                     <td>
                   <?php echo $row["purcontact"];?>
                    </td>
                    <td>
                     <a href="editpurchases.php?pid=<?php echo $row['purch_id'];?>"><button class="btn"><i class="fa fa-edit" style="font-size: 19px"></i></button></a>
                    </td>
                    <td><a href="code/purchasesdelete.php?purid=<?php echo $row['purch_id'];?>"><button class="btn text-danger"><i class="fa fa-trash"style="font-size: 19px"></button></a></td>
                  </tr>
               <?php } ?>
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

