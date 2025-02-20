้<header>
  <?php
  include('head.php');
  ?>
<style type="text/css">
  #prd_detail{
    color: black;
    text-decoration: none;
  }
  #prd_detail:hover{
    color: blue;
  }
  .con{
    height: 100%;
  }
</style>
</header>
<body>
  <div class="con container"></div>

<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> 
 <?php
  // include("../php/connect.php");
 	$link = mysqli_connect("localhost", "root");
  mysqli_set_charset($link,'utf8');
  mysqli_query($link,"Use project;");   // เรียกใช้ฐานข้อมูล
 	$sql = "SELECT * FROM product ";
	$result = mysqli_query($link,$sql);
	while ($value = mysqli_Fetch_array($result)) {
 ?>
      &nbsp;
      <div class="col mb-5">
      
          <div class="card h-100" style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);">
              <!-- Product image-->
              <?php echo "<img class=card-img-top src=../admin/image/product/$value[Picture]  />"; ?>
              <!-- Product details-->
             
              <div class="card-body p-4">
              <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                  <div class="text-center">
                      <!-- Product name-->
                      <h5 class="fw-bolder"><?php echo $value["Name"]; ?></h5>
                      <!-- Product price-->
                      <?php echo number_format($value["Price"]); ?> บาท
                  </div>
              </div>
              
              <!-- Product actions-->
              <?php
                if($value['Amount_S']<1 AND $value['Amount_M']<1 AND $value['Amount_L']<1 AND $value['Amount_XL']<1){
              ?>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                      <div class="text-center d-grid gap-2">
                        <button class="btn btn-secondary mt-auto" type="submit" disabled>สินค้าหมด</button>
                      </div>                     
                  </div>
              <?php
                }
                else{
              ?>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                      <div class="text-center d-grid gap-2">
                        <a class="btn btn-primary mt-auto" href="page_product.php?id=<?php echo $value['id']; ?>">ดูรายละเอียด</a>
                      </div>
                  </div>
              <?php
                }
              ?>
          </div>
      </div>
<?php
}
?>
</div>  
</body>