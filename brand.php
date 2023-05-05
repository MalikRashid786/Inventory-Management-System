<?php
include("header.php");
include("config.php");
$query="select * from tbl_brand order by brand_id desc";
$result=mysqli_query($connect,$query);
?>
<section id="category">
 <div class="container-fluid bg-gradient-danger" style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow">
            <div class="card-header border-0">
              <p class="mb-0"data-aos="fade-up" style="font-size: 19px;font-weight: bold;">Manage <span class="text-danger display-4">Brand</span></p>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
             <button type="button" class="btn text-white bg-gradient-danger mr-4 mb-3 float-right"data-aos="fade-down" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><img src="images/baseline_add_circle_outline_white_18dp.png" class="img-fluid"> Add Brand</button>
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $a=0;
                     while($row=mysqli_fetch_array($result))
                     {
                      $a++;
                  ?>
                  <tr data-aos="fade-right">
                    <td>
                       <?php echo $a,("."); ?>
                    </td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                  <span class="mb-0 text-sm text-wrap"><a href="brandfilter.php?bfid=<?php echo $row['brand_id'];?>"><?php echo $row['bname']; ?></a></span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <a href="code/branddelete.php?bid=<?php echo $row['brand_id'];?>"><button class="btn text-danger"><i class="fa fa-trash"style="font-size: 19px"></i></button></a>
                    </td>
                  </tr>
                  <?php
                }
                ?>
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
      <form class="needs-validation" novalidate action="code/brandcode.php" method="post">
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom01">Brand Name</label>
      <input type="text" class="form-control" name="bname" id="validationCustom04" required>
      <div class="invalid-feedback">
        Please fill brand name.
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
