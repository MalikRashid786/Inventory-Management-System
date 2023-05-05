<?php

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory Management</title>
	<link rel="icon" href="images/download.png" >
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/aos.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/argon-dashboard.css">
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <style type="text/css">
  </style>
</head>
<body>
<!--------------------Menu Section----------------->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->

      <a class="navbar-brand pt-0" href="index.php">
       <h1><span class="text-danger" style="font-size: 23px">Inventory</span><sub><sub><sub><sub><sub><span style="font-size:30px;margin-left: -80px"><sub><span class="text-danger">M</span><span style="font-size: 20px">anagement</span></sub><sub><sub><sub><sub><sub><sub><sub><sub><sub><sub><sub><span style="font-size:25px; margin-left: -50px;"><span class="text-danger">s</span><span style="font-size: 18px">ystem</span></span></sub></sub></sub></sub></sub></sub></sub></sub></sub></sub></sub></span></sub></sub></sub></sub></sub></h1>
      </a>
              <!-- Form -->
        
         <button type="button" class="navbar-search navbar-search-dark mr-3 d-md-none ml-lg-auto btn navbar mt-2 mr-4 float-right"data-aos="fade-down" data-toggle="modal" data-target="#example" data-whatever="@mdo"><i class="fa fa-search" style="font-size: 20px"></i></button>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="index.php">
              <h1><span class="text-danger">Inventory</span><sub><sub><sub><sub><sub><span style="font-size:13px;margin-left: -50px"><span class="text-danger">M</span>anagement<sub><sub><sub><sub><sub><sub><sub><sub><sub><sub><sub><span style="font-size:13px; margin-left: -40px;"><span class="text-danger">s</span>ystem</span></sub></sub></sub></sub></sub></sub></sub></sub></sub></sub></sub></span></sub></sub></sub></sub></sub></h1>  
              </a>

            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item display-4">
          <a class=" nav-link display-4" href="index.php"> <i class="fa fa-tv text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item display-4 py-3">
            <a class="nav-link " href="category.php">
              <i class="fa fa-list text-blue"></i> Category
            </a>
          </li>
          <li class="nav-item display-4">
            <a class="nav-link " href="brand.php">
              <i class="fa fa-bold text-orange"></i> Brand
            </a>
          </li>
          <li class="nav-item display-4 py-3">
            <a class="nav-link " href="product.php">
              <i class="fa fa-gift text-yellow"></i> Product
            </a>
          </li>
          <li class="nav-item display-4">
            <a class="nav-link " href="order.php">
              <i class="fa fa-product-hunt text-red"></i> Purchases
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link display-4 py-4" href="sale.php">
              <i class="fa fa-tag text-info"></i> Sales
            </a>
          </li>
        </ul>
       
      </div>
    </div>
  </nav>
  <div class="main-content" style="overflow-x: hidden;" >
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-light" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Dashboard</a>
        <!-- Form -->
                 <button type="button" class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto btn navbar text-white bg-gradient-danger mr-4 mb-3 float-right"data-aos="fade-down"><i class="fa fa-search" style="font-size: 20px"></i></button>
      </div>
    </nav>
<!-----------Modal Here---------->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"> Search Here</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form  action="code/categorycode.php" method="post">
    <div class="form-row">
    <div class="col-md-12 mb-3">
      <input type="text" class="form-control" placeholder="Search Here.." name="cname" id="ser" required>
    </div>
    <div id="searchlist"></div>
   </div>
    </form>
      </div>
    </div>
  </div>
</div>

<!--------------------End Menu Section----------------->

<script type="text/javascript">
   $(document).ready(function(){
         $('#ser').keyup(function(){
             var query = $(this).val();
             //alert(query);
             if(query!='')
             {
              $.ajax({
                  url:"search.php",
                  method:"POST",
                  data:{query:query},
                  success:function(data)
                  {
                    $('#searchlist').fadeIn();
                    $('#searchlist').html(data);
                  }
              });
             }
             else
             {
                    $('#searchlist').fadeOut();
                    $('#searchlist').html("");
             }
         });
   });

</script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/aos.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/argon-dashboard.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>