<?php
include("header.php");
include("config.php");
$query="select * from tbl_brand";
$result=mysqli_query($connect,$query);
$query1="select * from tbl_category";
$result1=mysqli_query($connect,$query1);
$query2="select * from tbl_product order by pro_id desc";
$result2=mysqli_query($connect,$query2);
?>
<section id="category">
 <div class="container-fluid bg-gradient-danger" style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow ">
            <div class="card-header border-0">
            <p class="mb-0"data-aos="fade-up" style="font-size: 19px;font-weight: bold;">Manage <span class="text-danger display-4">Product</span></p>
             <button type="button" class="btn text-white bg-gradient-danger float-right mr-4"data-aos="fade-down" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><img src="images/baseline_add_circle_outline_white_18dp.png" class="img-fluid"> Add Product</button>
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
                    <td class="text-wrap">
                      <?php echo $row4["bname"]; ?>
                    </td>
                     <td class="text-wrap">
                      <?php echo $row3["cname"]; ?>
                    </td>
                     <td>
                      <?php echo $row2["price"]; ?>
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
                      <span class="text-wrap"><?php echo $row4["bname"]; ?></span>
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



<!-----------Modal Here---------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Add Brand</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class="needs-validation" action="code/addproduct.php" method="POST" novalidate>
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="validationCustom01">Product Name</label>
      <input type="text" name="pname" class="form-control" id="validationCustom04" required>
       <div class="invalid-feedback">
        Please fill product.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Quantity</label>
      <input type="number" name="pquantity" class="form-control" id="validationCustom04" required>
       <div class="invalid-feedback">
        Please fill quantity.
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom04">Brand</label>
      <select class="custom-select" name="pbrand" id="validationCustom04" required>
        <?php 
          while($row=mysqli_fetch_array($result))
          {
        ?>
        <option value="<?php echo $row['brand_id'];?>"><?php echo $row["bname"];?></option>

   <?php
 }
 ?>
      </select>
      <div class="invalid-feedback">
        Please select a brand.
      </div>
    </div>
  </div>
    <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom04">Category</label>
      <select class="custom-select" name="pcategory" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <?php 
          while($row1=mysqli_fetch_array($result1))
          {
        ?>
        <option value="<?php echo $row1['cate_id'];?>"><?php echo $row1["cname"];?></option>

   <?php
 }
 ?>
      </select>
      <div class="invalid-feedback">
        Please select a category.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Price</label>
      <input type="text" name="price" class="form-control" id="validationCustom04" required>
      <div class="invalid-feedback">
        Please fill prices.
      </div>
    </div>
  </div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button class="btn text-white bg-gradient-danger" type="submit">Save</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>
