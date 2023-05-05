<?php
 error_reporting(0);
include("header.php");
 $msg=$_REQUEST['msg'];
function load_state()
{  
   include("config.php");
   $output='';
   $query="select * from tbl_product";
   $result=mysqli_query($connect,$query);
  while($row=mysqli_fetch_array($result))
  { 
      if ($row['pquantity']!=0)
      {
        $output .='<option value="'.$row["pro_id"].'">'.$row['pname'].'</option>';
      }
  }
  return $output;
}
?>

 <div class="container-fluid bg-gradient-danger" style="min-height: 100vh">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow">
            <div class="card-header border-0">
              <p class="mb-0"data-aos="fade-up" style="font-size: 19px;font-weight: bold;">Add <span class="text-danger display-4">Sales</span></p>
              <a href="sale.php" class="float-right"><button type="button" class="btn text-white bg-gradient-danger mr-4" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Back</button></a>
            </div>

  <?php 
     if($msg==1)
     {
   ?>
<script type="text/javascript">alert("Please Check Available Quantity.")</script>
<?php
   }?>
<form class="needs-validation pr-4 pl-4" action="code/buycode.php" method="POST" novalidate>
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="validationCustom01">Client Name</label>
      <input type="text" name="clientname"placeholder="Client Name" class="form-control" id="validationCustom01" required>
      <div class="invalid-feedback">
       Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Sale Date</label>
      <input type="date" name="date" placeholder="Quantity"class="form-control" id="validationCustom02" required>
      <div class="invalid-feedback">
        Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
<!-- 

    <button type="button" class="btn bg-danger btnadd float-right mb-5 mr-4" style="width: 20px;height: 30px">
    <img src="images/baseline_add_circle_outline_white_18dp.png" style="margin-left: -9px;margin-top: -14px" >
    </button> -->


  <hr/>
  <div class="form-row prowrapper">
     <div class="col-md-3 mb-3">
      <label for="validationCustom04">Product</label>
      <select class="custom-select" name="pro" id="product" required>
        <option value="">Choose product</option>
        <?php echo load_state(); ?>
      </select>
      <div class="invalid-feedback">
        Please select a brand.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
       <div class="col-md-1 mb-3" >
      <label for="validationCustom05">Price</label>
      <span id="price"></span>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom01">Conform Price</label>
      <input type="text" oninput="Myprice()" name="Confprice"placeholder="Conf. Price." class="form-control" id="cprice" required>
      <div class="invalid-feedback">
       Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
     <div class="col-md-2 mb-3">
      <label>Available Qty.</label>
     <br/>
      <span id="quant"></span>
    </div>
    <div class="col-md-1 mb-3">
      <label for="validationCustom01">Qty</label>
      <input type="number" oninput="Myinput()"name="curquan"placeholder="Quantity" class="form-control" id="qtyv" required>
      <div class="invalid-feedback">
       Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
        <div class="col-md-1 mb-3">
      <label for="validationCustom01">Dis.(%)</label>
      <input type="text" name="dis"placeholder="Dis." oninput="Mydis()"value="0" class="form-control" id="dis" required>
      <div class="invalid-feedback">
       Please fill this field.
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom01">Total</label>
      <input type="text" name="ta" class="form-control" placeholder="Total" id="amo">
    </div>
  </div>
  <hr/>
  <div class="form-row">
        <div class="col-md-4 mb-3">
      <label for="validationCustom01">Pay Amount</label>
      <input type="number" name="puramount"placeholder="Pay Ammount" class="form-control" id="validationCustom01" required>
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
        <input type="text" maxlength="10" class="form-control" name="purcontact" placeholder="Mobile No" >
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please fill this field.
      </div>
    </div>
  </div>
<button class="btn text-white bg-gradient-danger mb-3 mt-3 mr-4 float-right" type="submit">Sale</button>
</form>
</div>
</div>
</div>
</div><br/>
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


var pr=0;
$(document).ready(function(){
       $('#product').change(function(){
         var  bid=$(this).val();
           // alert(bid);
         $.ajax({
          url:"buyproduct.php",
          method:"POST",
          data:{id:bid},
          dataType:"text",
          success:function(data)
          {
            $('#price').html(data);
          }
         })
       });
        $('#product').change(function(){
         var  bid=$(this).val();
            // alert(bid);
         $.ajax({
          url:"buyproduct1.php",
          method:"POST",
          data:{id:bid},
          dataType:"text",
          success:function(data)
          {
            $('#quant').html(data);
          }
         })
       });
// ------------------------------------Add Product Row------------------------------
   // var max_fields =10;
   // var wrapper=$(".prowrapper");
   // var add_button=$(".btnadd");

   // var x=1;
   // $(add_button).click(function(e){
   //  e.preventDefault();
   //  if(x<max_fields){
   //    x++;
   //    $(wrapper).append('  <div class="form-row prowrapper"><div class="col-md-3 mb-3"><labelfor="validationCustom04">Product</label><select class="custom-select" name="pro" id="product" required><option>Choose product</option><?php echo load_state(); ?>      </select>  <div class="invalid-feedback">        Please select a brand.      </div>      <div class="valid-feedback">        Looks good!      </div>    </div>       <div class="col-md-1 mb-3" >      <label for="validationCustom05">Price</label>      <span id="price"></span>    </div>    <div class="col-md-2 mb-3">      <label for="validationCustom01">Conf. Price</label>      <input type="text" oninput="Myprice()" name="Confprice"placeholder="Conf. Price." class="form-control" id="cprice" required>      <div class="invalid-feedback">       Please fill this field.      </div>      <div class="valid-feedback">        Looks good!      </div>    </div>     <div class="col-md-1 mb-3">      <label>Avialable</label>     <br/>      <span id="quant"></span>    </div>    <div class="col-md-2 mb-3">      <label for="validationCustom01">Quantity</label>      <input type="number" oninput="Myinput()"name="curquan"placeholder="Quantity" class="form-control" id="qtyv" required>      <div class="invalid-feedback">       Please fill this field.      </div>      <div class="valid-feedback">        Looks good!      </div>    </div>        <div class="col-md-1 mb-3">      <label for="validationCustom01">Dis.(%)</label>      <input type="text" name="dis"placeholder="Dis." oninput="Mydis()" class="form-control" id="dis" required>      <div class="invalid-feedback">       Please fill this field.      </div>      <div class="valid-feedback">        Looks good!      </div>    </div>    <div class="col-md-2 mb-3">      <label for="validationCustom01">Total</label>      <input type="text" name="ta" class="form-control" id="amo">    </div><a href="#" class="remove_field"><button class="btn btn-danger"><i class="fa fa-trash float-right"></i>  </button</a>  </div>')
   //  }

   // });


   // $(wrapper).on("click",".remove_field",function(e){
   //  e.preventDefault();
   //  $(this).parent('div').remove();
   //  x--;
   // });
// ----------------------End Add Product Row Code----------------------
 });
var pr=0;
var qt=1;
var contact=0;
var am=0;

function Myprice() {
  pr = document.getElementById("cprice").value;
}
function Myinput() {
    qt = parseInt(document.getElementById("qtyv").value);
    am=qt*pr;
    document.getElementById("amo").value=am;
}
function Mydis() {
    var dis=0;
    dis = parseInt(document.getElementById("dis").value);
    var odis=(pr*dis)/100;
    var fulam=pr-odis;
    document.getElementById("amo").value=fulam;
}


</script>
