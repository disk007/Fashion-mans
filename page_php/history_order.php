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


        .ca {
            display: flexbox;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: nowrap;
        }

        #detail {
            text-decoration: underline;
            color: #54C8F2;
        }

        #detail:hover {
            color: blue;
        }
        #cancel {
            text-decoration: underline;
            color: red;
        }

        #cancel:hover {
            color: red;
        }

        /* /*  */
    </style>

</header>

<body>
    <div class="con container">
        <div class="row mt-4 p-2 d-flex">
            <div class="col-sm-3 hidden-xs hidden-md hidden-sm">
                <div class="menu-settings  border-2 border-secondary rounded-2">
                    <ul class="list-group list-group-flush pb-2 settings  ">
                        <li class="list-group-item "><a href="profile.php"><i class=" fas fa-user" aria-hidden=" true"></i>&nbsp;บัญชีของฉัน</a></li>
                        <li class="list-group-item"><a href="address.php"><i class="fas fa-address-card" aria-hidden="true"></i>&nbsp;ที่อยู่ของฉัน</a></li>
                        <!-- <li class="list-group-item"><a href="#"><i class="fas fa-shopping-cart" aria-hidden="true"></i>&nbsp;รายการสั่งซื้อ</a></li> -->
                        <li class="list-group-item"><a href="history_order.php " style="color: #0d6efd;">
                                <i class="fas fa-history" aria-hidden="true"></i>&nbsp;ประวัติการซื้อของฉัน</a></li>
                        <li class="list-group-item"><a href="payment.php"><i class="fas fa-money-check" aria-hidden="true"></i>&nbsp;ชำระเงิน</a></li>
                        <li class="list-group-item"><a href="change_password.php"><i class="fas fa-key" aria-hidden="true"></i>&nbsp;เปลี่ยนรหัสผ่าน</a></li>
                        <li class="list-group-item"><a href="../page_php/logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp;ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-2 border-secondary rounded-2 col-md-8  mx-auto p-3">
                <h4>ประวัติการสั่งซื้อของฉัน</h4>
            
                <h5 class="mb-0 pb-0 fs-6 text-center ">ดูรายละเอียด ติดตาม </h5>
                <br>
                
                <div class="container" style="padding-left:10%">
                    <?php
                    $id_code = "";
                    $sql = "SELECT * FROM list WHERE Username = '" . $_SESSION['Username'] . "' ORDER BY id DESC";
                    $result = mysqli_query($link, $sql);
                    while ($values = mysqli_Fetch_array($result)) {
                        if ($id_code != $values['id_order']) {
                            $id_code = $values['id_order'];
                    ?>
                     <div class="row d-flex flex-wrap">
              
                            <p></p><hr>
                            <div>
                            <a id="detail" href="detail_order.php?id=<?php echo $id_code; ?>">ดูรายละเอียด</a>&nbsp;
                            <?php if($values['Status'] != "ชำระแล้ว" AND $values['Status'] != "ยกเลิกสินค้า"){?>
                            <a href="../php/cancel_order.php?id=<?php echo $values["id_order"]; ?>" id="cancel" class="cancel-btn">ยกเลิกสินค้า</a>
                            <?php } ?>
                            </div>
                            <div style="font-size:18px;font-weight: bold;">รหัสการสั่งซื้อ <?php echo $values['id_order']; ?></div>
                            <div style="font-size:16px; font-weight:bold; color: red"><?php echo "ราคาสุทธิ " . number_format($values['total']) . " บาท<br>"; ?></div>
                            <div><?php
                                    if ($values['Status'] == "ยังไม่ชำระ" or $values['Status'] == "ยกเลิกสินค้า") {
                                        echo "<font color=red>" . $values['Status'] . "</font> เลขพัสดุ " . $values['parcel'];
                                    } elseif ($values['Status'] == "ชำระแล้ว") {
                                        echo "<font color=green>" . $values['Status'] . "</font> เลขพัสดุ " . $values['parcel'];
                                    } else {
                                        echo "<font color=blue>" . $values['Status'] . "</font> เลขพัสดุ " . $values['parcel'];
                                    }
                                    ?>
                            </div>
                        <?php
                        
                        }   
                        echo "
                        
                        <div class=col-3 m-2 p-2>
                          
                        <img src=../admin/image/product/$values[Picture] >
        
                        </div><br>"; 
                        
                    }
                    ?>
                    </div>
                </div>
                <!-- <div class="row justify-content-center d-flex"></div> -->

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
    include ("../php/confirm_cancel.php");
?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../javascript/profile.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
