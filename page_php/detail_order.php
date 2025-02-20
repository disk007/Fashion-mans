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
                        <li class="list-group-item "><a href="profile.php" ><i class=" fas fa-user" aria-hidden=" true"></i>&nbsp;บัญชีของฉัน</a></li>
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
                <div style="text-align:center;">ดูรายละเอียด ติดตาม </div>
                <br>
                        <?php
                        $total = 0;
                        $id_order = $_GET['id'];
                        $sql = "SELECT * FROM list WHERE id_order = '$id_order';";
                        $result = mysqli_query($link, $sql);
                        $value = mysqli_Fetch_array($result);
                        ?>
                        <div>
                            <div style="font-size:18px;font-weight: bold;">ที่อยู่ผู้รับ</div>
                            <?php echo $value['Address']; ?><p></p>
                            <div style="font-size:18px;font-weight: bold;">วิธีการชำระเงิน</div>
                            <?php echo $value['Delivery']; ?><p></p>
                            <div style="font-size:18px;font-weight: bold;">สถานะ</div>
                            <?php
                            $total = $value['total'];
                            if ($value['Status'] == "ยังไม่ชำระ") {
                                echo "<font color=red>$value[Status]</font>";
                            } elseif ($value['Status'] == "ชำระแล้ว") {
                                echo "<font color=green>$value[Status]</font>";
                            } else {
                                echo "<font color=blue>$value[Status]</font>";
                            }
                            ?>

                        </div><br>
                        <div style="font-size:18px;font-weight: bold;">รายการสินค้าที่สั่งซื้อ</div><br>
                        <?php
                        $sql = "SELECT * FROM list WHERE id_order = '$id_order';";
                        $result = mysqli_query($link, $sql);
                        while ($values = mysqli_Fetch_array($result)) {
                        ?>
                            <div><?php
                                    echo "<img src=../admin/image/product/$values[Picture] width=15%>";
                                    ?>
                            </div>
                            <div>
                                <?php
                                echo "<b>$values[Name_product]</b>" . "&nbsp; ราคาต่อชิ้น " . number_format($values['Price']) . " บาท<br>";
                                echo "จำนวน " . $values['Amount'] . "&nbsp; ราคารวม " . number_format($values['total_price']) . " บาท<br>";
                                ?>
                            </div>
                            <hr>
                        <?php
                        }

                        ?>
                        <br>
                        <div style="font-size:18px; font-weight: bold; text-align:right; ">ราคาสุทธิ &nbsp;<?php echo number_format($total,); ?>&nbsp;บาท</div>
                    </div>

            </div>

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

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../javascript/profile.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>