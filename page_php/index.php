<?php include ("../php/connect.php"); ?>
<!doctype html>
<html lang="en">

<head>
  <?php
  include('head.php');
  ?>

  <title>Fashion-Men-Shop</title>
  <style>
    div.col-3 {
      background-color: palevioletred;
    }

    div.col-9 {
      background-color: cadetblue;
    }

    .banner {

      position: relative;
      box-sizing: border-box;
    }

    .text_show {
      display: block;
      position: absolute;
      z-index: 1;
      left: 0px;
      box-sizing: border-box;
    }
    .con{
    height: 100%;
  }
  </style>

</head>

<body>
  <header>
    <?php
    include('navbar.php');
    ?>
  </header>
  <!-- โปรโมท -->

  <img class="row justify-content-center col-12 d-block w-100 " src="../img/caro/01.jpg" alt="">

  <!-- Section-->
  
  <H4 class="text-dark text-center fs-3 m-0 p-3">>>สินค้าทั้งหมด<<</H4>
      <?php
        include ("homepage_product.php");
      ?>
   

   
 
  <!-- ส่วนล่าง -->
  <?php
  include('footer.php');
  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- Optional JavaScript; choose one of the two! -->
 


  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>