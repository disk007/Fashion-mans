<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<?php
  // $link = mysqli_connect("localhost", "root");
  // mysqli_set_charset($link,'utf8');
  // mysqli_query($link,"Use project;");   // เรียกใช้ฐานข้อมูล
  $sql = "SELECT * FROM cart WHERE Username = '" . $_SESSION['Username'] . "' ";
  $result = mysqli_query($link,$sql);
  $count_pro = mysqli_num_rows($result);
?>

<div id="cart_product" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <a href="#" class="btn btn-sm btn-outline-light m-0 p-1"><i class="fas fa-shopping-cart"></i>&nbsp; <?php echo $count_pro; ?>  ชิ้น</a>
</div>
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ตะกร้าสินค้า</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="clear:both"></div>  
        <br>  
        <h3>รายการในตะกร้า</h3><br>  
          <div class="table-responsive">
          <?php
            $total = 0;
            if($count_pro == 0){
          ?>
              <div class="alert alert-warning">
                ไม่มีสินค้าในตะกร้า
              </div>
          <?php
            }
            else{
          ?>  
              <form action="confirm_product.php" method="post">
              <table class="table table-bordered text-center">  
                <tr> 
                   <th width="20%">รูปภาพ</th> 
                   <th width="20%">ชื่อสินค้า</th>  
                   <th width="10%">จำนวน</th>
                   <th width="10%">ขนาด</th>   
                   <th width="10%">ราคา</th>  
                   <th width="15%">ราคารวม</th>  
                   <th width="5%">ลบ</th>  
                </tr>  
            <?php
                while($values = mysqli_Fetch_array($result)){
              ?> 
                <tr>
                  <?php
                   echo "<td><img src=../admin/image/product/$values[Picture] width=60></td>";  
                  ?>
                   <td><?php echo $values["Product"]; ?></td>  
                   <td><?php echo $values["Amount"]; ?></td>
                   <td><?php echo $values["Size"]; ?></td>    
                   <td><?php echo number_format($values["Price"]); ?></td>  
                   <td> <?php echo number_format($values["Amount"] * $values["Price"]); ?></td>  
                   <td><a style="color: red;" href="../php/del_cart.php?size=<?php echo $values["Size"]; ?>&id_code=<?php echo $values["id_code"]; ?>" onclick="return confirm('คุณต่อการลบสินค้านี้ออกจากตะกร้าใช่ไหม')"><i class="fas fa-trash-alt"></i></a></td>  
              </tr>  
            <?php  
                  $total = $total + ($values["Amount"] * $values["Price"]);  
               }  
            ?>
            <tr><td colspan="100%" style="padding-left:50%;"><div style="font-size:20px; padding: 5px">ราคารวม <?php echo number_format($total); ?> บาท</div></td></tr>
            </table><br>
            <?php
              }
            ?>
    
          </div>
      </div>
      <?php
        if($count_pro == 0){ 
      ?>
      <div class="d-grid gap-2" style="margin:15px;">
        <input type="submit" name="submit" class="btn btn-secondary" value="สั่งซื้อสินค้า" disabled>
      </div>
      <?php
        }
        else{
      ?>
      <div class="d-grid gap-2" style="margin:15px;">
        <input type="submit" name="submit" class="btn btn-primary" value="สั่งซื้อสินค้า">
      </div>
      <?php
        }
      ?>

      <br>
    </div>
  </form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>