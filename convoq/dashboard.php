<?php
include "connection.php";
?>



<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Inance</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>


  <!-- service section -->

  <section class="service_section layout_padding">
  <div class="container ">
    <div class="heading_container heading_center">
      <h2>CONVOQ</h2>
    </div>
    <div class="row">
    <a href="option.php" style="text-decoration: none; color: inherit;">
      <div class="col-sm-6 col-md-4 mx-auto">
        <div class="box">
          <div class="img-box">
            <img src="images/student.png" alt="" />
          </div>
          <div class="detail-box">
            <h5>
              Registeration</a>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mx-auto">
      <a href="graduationList.php" style="text-decoration: none; color: inherit;">
        <div class="box">
          <div class="img-box">
            <img src="images/campus1.png" alt="" />
          </div>
          <div class="detail-box">
            <h5>
              Graduation List</a>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mx-auto">
      <a href="scannerRFID.php" style="text-decoration: none; color: inherit;">
        <div class="box">
          <div class="img-box">
            <img src="images/rfid.png" alt="" />
          </div>
          <div class="detail-box">
            <h5>
              RFID Scanner</a>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mx-auto">
      <a href="scannerBarcode.php" style="text-decoration: none; color: inherit;">
        <div class="box">
          <div class="img-box">
            <img src="images/barcode.png" alt="" />
          </div>
          <div class="detail-box">
            <h5>
              Barcode Scanner</a>
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- end service section -->
<center>
  <form action="logout.php" method="post">
     <button class="btn btn-danger" type="submit" name="logout">Logout</button>
  </form>
</center>



 

 

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->


</body>

</html>