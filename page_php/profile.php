<header>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600&display=swap" rel="stylesheet">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- <script type="text/javascript" src="javascript/profile.js"></script> -->

  <?php
  ob_start();
  include('../php/connect.php');
  include("navbar.php");
  include("../page_php/head.php");
  if (empty($_SESSION['Username'])) {
    header('location:index.php');
  }
 


    $sql = "SELECT * FROM members WHERE Username = '" . $_SESSION['Username'] . "' ";
    $result = mysqli_query($link, $sql);
    $row = mysqli_Fetch_array($result);
    $id = $row['id'];
  ?>
    <style>
      #data {
        border: 5 px solid black;
        border-radius: 3px;
      }

      .con {
        height: 100%;
      }



      /* /*  */

    </style>

</header>

<body>
  <div class="con container">
    <div class="row mt-4 p-2">
      <div class="col-sm-3 hidden-xs hidden-md hidden-sm">
        <div class="menu-settings  border-2 border-secondary rounded-2">
          <ul class="list-group list-group-flush pb-2 settings  ">
            <li class="list-group-item "><a href="profile.php" style="color: #0d6efd;"><i class=" fas fa-user"  aria-hidden=" true"></i>&nbsp;บัญชีของฉัน</a></li>
            <li class="list-group-item"><a href="address.php"><i class="fas fa-address-card" aria-hidden="true"></i>&nbsp;ที่อยู่ของฉัน</a></li>
            <!-- <li class="list-group-item"><a href="#"><i class="fas fa-shopping-cart" aria-hidden="true"></i>&nbsp;รายการสั่งซื้อ</a></li> -->
            <li class="list-group-item"><a href="history_order.php"><i class="fas fa-history" aria-hidden="true"></i>&nbsp;ประวัติการซื้อของฉัน</a></li>
            <li class="list-group-item"><a href="payment.php"><i class="fas fa-money-check" aria-hidden="true"></i>&nbsp;ชำระเงิน</a></li>
            <li class="list-group-item"><a href="change_password.php"><i class="fas fa-key" aria-hidden="true"></i>&nbsp;เปลี่ยนรหัสผ่าน</a></li>
            <li class="list-group-item"><a href="../page_php/logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp;ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
      <div class="border-2 border-secondary rounded-2 col-md-8  mx-auto p-3">
        <h4>ข้อมูลส่วนตัว</h4>
        <h5 class="mb-0 pb-0 fs-6 text-center">ข้อมูลพื้นฐาน เช่น ชื่อ</h5>

        <div class="mb-2">
          <div class="logo"><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">

              <button type="button" class="editImg btn btn-outline-primary">แก้ไขข้อมูลของฉัน</button>
            </a></div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลของฉัน</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <p>Username : <?php echo $row['Username']; ?></p>
                  <?php echo "<form action=../php/update_profile.php?id=$id method=post>" ?>
                  <div class="form-group">
                    <label for="Full_name">ชื่อ-สกุล</label>
                    <input type="text" name="Full_name" class="form-control" id="Full_name" value="<?php echo $row['Full_name'] ?>">
                  </div><br>
                  <div class="form-group">
                    <label for="Email">อีเมล์</label>
                    <input type="email" na class="form-control" id="Email" value="<?php echo $row['Email'] ?>" name="Email">
                  </div><br>
                  <div class="form-group">
                    <label for="Age">อายุ</label>
                    <input type="text" class="form-control" id="Age" name="Age" value="<?php echo $row['Age'] ?>">
                  </div><br>
                  <div class="form-group">
                    <label for="Phone">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" id="Phone" name="Phone" value="<?php echo $row['Phone'] ?>">
                  </div>

                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" name="edit_profile" value="Save">
                  <input class="btn btn-secondary" value="Close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </form>

                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="dataUser">Username : &nbsp;&nbsp;&nbsp;<b><?php echo $row["Username"] ?></b></div>
          <div class="dataUser">ชื่อ-สกุล : &nbsp;&nbsp;&nbsp;<b><?php echo $row["Full_name"] ?></b></div>
          <div class="dataUser">อีเมล์ : &nbsp;&nbsp;&nbsp;<b><?php echo $row["Email"] ?></b></div>
          <div class="dataUser">อายุ : &nbsp;&nbsp;&nbsp;<b><?php echo $row["Age"] ?></b></div>
          <div class="dataUser">เบอร์โทรศัพท์ : &nbsp;&nbsp;&nbsp;<b><?php echo $row["Phone"] ?></b></div>
        </div>
        <br>
      </div>

    </div>

  </div>
  <!-- <aside class="row">
        <ul class="foot">

          <li class="active"><a href="profile.php"><i class="fas fa-user"></i>&nbsp;บัญชีของฉัน</a></li>
          <li><a href="address.php" style="color:black;"><i class="fas fa-address-card"></i>&nbsp;ที่อยู่ของฉัน</a></li>
          <li><a href="history_order.php" style="color:black;"><i class="fas fa-history"></i>&nbsp;ประวัติการซื้อของฉัน</a></li>
          <li><a href="change_password.php" style="color:black;"><i class="fas fa-key"></i>&nbsp;เปลี่ยนรหัสผ่าน</a></li>
          <li><a href="../php/logout.php" style="color:black;"><i class="fas fa-sign-out-alt"></i>&nbsp;ออกจากระบบ</a></li>
        </ul>
      </aside> -->


  <!-- ส่วนล่าง -->
  <?php
    include('footer.php');
  ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../javascript/profile.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
