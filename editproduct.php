<?php 
include('header.php');
include("config.php");
$proid=$_REQUEST['pid'];
$query="select * from tbl_brand";
$result=mysqli_query($connect,$query);
$query1="select * from tbl_category";
$result1=mysqli_query($connect,$query1);
$query2="select * from tbl_product where pro_id='$proid'";
$result2=mysqli_query($connect,$query2);
if($row2=mysqli_fetch_array($result2))
{
	$productname=$row2['pname'];
	$pquantity=$row2['pquantity'];
	$price=$row2['price'];
	$brand=$row2['pbrand'];
  $pcategory=$row2['pcategory'];
}
?>

<div class="container-fluid bg-gradient-danger" style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 150px;">
          <div class="card shadow">
            <div class="card-header border-0">
              <p class="mb-0"data-aos="fade-up" style="font-size: 19px;font-weight: bold;">Edit <span class="text-danger display-4">Product</span></p>
              <a href="product.php" class="float-right"><button type="button"data-aos="fade-left" class="btn text-white bg-gradient-danger mr-4" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Back</button></a>
            </div>
<form class="needs-validation pr-4 pl-4" action="code/editproductcode.php" method="POST" novalidate>
	 <input type="text" name="proid" value="<?php echo $proid ?>" hidden>
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="validationCustom01">Product Name</label>
      <input type="text" name="purname" value="<?php echo $productname ?>" class="form-control" id="validationCustom01" required>
      <div class="invalid-feedback">
       Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Quantity</label>
      <input type="number" name="purquantity"value="<?php echo $pquantity ?>"class="form-control" id="validationCustom02" required>
      <div class="invalid-feedback">
        Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
  	 <div class="col-md-4 mb-3">
      <label for="validationCustom04">Brand</label>
      <select class="custom-select" name="purbrand" id="validationCustom04" required>
        <?php 
          while($row=mysqli_fetch_array($result))
          {
            if($brand==$row['brand_id'])
            {
        ?>
        <option selected value="<?php echo $row['brand_id'];?>"><?php echo $row["bname"];?></option>
      <?php
      } 
       else{ 
        ?>
        <option value="<?php echo $row['brand_id'];?>"><?php echo $row["bname"];?></option>
   <?php
 }
 }
 ?>
      </select>
      <div class="invalid-feedback">
        Please select a brand.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
       <div class="col-md-4 mb-3">
      <label for="validationCustom04">Category</label>
      <select class="custom-select" name="purcategory" id="validationCustom04" required>
       <?php 
          while($row1=mysqli_fetch_array($result1))
          {
            if($pcategory==$row1['cate_id'])
            {
        ?>
        <option selected value="<?php echo $row1['cate_id'];?>"><?php echo $row1["cname"];?></option>
      <?php
      } 
       else{ 
        ?>
        <option value="<?php echo $row1['cate_id'];?>"><?php echo $row1["cname"];?></option>
      <?php
       }
       }
      ?>
      </select>
      <div class="invalid-feedback">
        Please select a category.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom01">Price</label>
      <input type="number" name="purprice"value="<?php echo $price ?>"class="form-control" id="validationCustom01" required>
      <div class="invalid-feedback">
       Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
<button class="btn text-white bg-gradient-danger mb-3 mt-3 mr-3 float-right"type="submit">Update</button>
</form>
</div>
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
