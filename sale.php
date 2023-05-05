<?php
include("header.php");
include("config.php");
$query="select * from tbl_sale order by sale_id desc";
$result=mysqli_query($connect,$query);
?>
<section id="category">
 <div class="container-fluid bg-gradient-danger"style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow">
            <div class="card-header border-0">
             <p class="mb-0"data-aos="fade-up" style="font-size: 19px;font-weight: bold;">Manage <span class="text-danger display-4">Sales</span></p>
             <a href="buy.php"><button type="button"data-aos="fade-down" class="btn text-white bg-gradient-danger float-right mr-3"><img src="images/baseline_add_circle_outline_white_18dp.png" class="img-fluid"> Add Sale</button></a>
            </div>
            
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Contact</th>                 
                   <th scope="col">Price (<i class="fa fa-rupee"></i>)</th>
                   <th scope="col">Discount</th>
                   <th scope="col">Total Amo.</th>
                    <th scope="col">Pay Amo. (<i class="fa fa-rupee"></i>)</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $a=0;
                     while ($row=mysqli_fetch_array($result)) {
                       $a++;
                     $pro_id=$row["product"];
                     $query2="select * from tbl_product where pro_id='$pro_id'";
                    $result2=mysqli_query($connect,$query2);
                     if($row2=mysqli_fetch_array($result2))
                     {
                       $proname=$row2['pname'];
                     }
                 ?>
                  <tr>
                    <th>
                      <?php echo $a; ?>.
                    </th>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                           <span class="mb-0 text-sm text-wrap"><?php echo $row["clientname"]; ?></span>
                        </div>
                      </div>
                    </th>
                     <td>
                      
                       <span ><?php echo $row['sale_date'];?></span>
               
                    </td>
                    <td>
                     <span class="mb-0 text-sm text-wrap"><?php echo $proname ?></span> 
                    </td>
                     <td>
                     <span><?php  echo $row['curquan'];?></span>
                    </td>
                    <td>
                     <span><?php echo $row['contact']; ?></span>
                    </td>
                     <td>
                      <span >
                       <?php echo $row['price']; ?> 
                      </span>
                    </td>
                    <td>
                      <span >
                       <?php echo $row['discount']; ?> %
                      </span>
                    </td>
                    <td>
                    <span><?php echo $row['total']; ?></span>
                    </td>
                    <td>
                    <span><?php echo $row['payamount']; ?></span>
                    </td>
                    
                    
                     <td><a href="code/saledelete.php?sale_id=<?php echo $row['sale_id'];?>"><button class="btn text-danger"><i class="fa fa-trash"style="font-size: 19px"></button></a></td>
                  </tr>
               <?php }?>

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