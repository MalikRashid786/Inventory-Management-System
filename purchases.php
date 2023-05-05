<?php
include("header.php");
include("config.php");
$query="select * from tbl_brand";
$result=mysqli_query($connect,$query);
$query1="select * from tbl_category";
$result1=mysqli_query($connect,$query1);
?>

 <div class="container-fluid bg-gradient-danger" style="min-height: 100vh">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 100px;">
          <div class="card shadow">
            <div class="card-header border-0">
              <p class="mb-0"data-aos="fade-up" style="font-size: 19px;font-weight: bold;">Add <span class="text-danger display-4">Purchases</span></p>
              <a href="order.php" class="float-right"><button type="button"data-aos="fade-left" class="btn text-white bg-gradient-danger mr-4" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Back</button></a>
            </div>
<form class="needs-validation pr-4 pl-4" action="code/purchasescode.php" method="POST" novalidate>
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="validationCustom01">Product Name</label>
      <input type="text" name="purname"placeholder="Product Name" class="form-control" id="validationCustom01" required>
      <div class="invalid-feedback">
       Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Quantity</label>
      <input type="number" name="purquantity" placeholder="Quantity"class="form-control" id="validationCustom02" required>
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
        ?>
        <option value="<?php echo $row['brand_id'];?>"><?php echo $row["bname"];?></option>

   <?php
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
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom01">Price</label>
      <input type="number" name="purprice"placeholder="Price" class="form-control" id="validationCustom01" required>
      <div class="invalid-feedback">
       Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-8 mb-3">
      <label for="validationCustom05">Address</label>
      <input type="text" name="puraddress" class="form-control" id="validationCustom05"placeholder="Address" required>
      <div class="invalid-feedback">
        Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
      <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Mobile No</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">+91</div>
        </div>
        <input type="text" maxlength="10" class="form-control" name="purcontact" id="validationCustomUsername" placeholder="Mobile No" value="--">
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please fill this field.
      </div>
    </div>
     
  </div>
<button class="btn text-white bg-gradient-danger mb-3 mt-3 mr-3 float-right" type="submit">Save</button>
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
