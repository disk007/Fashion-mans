<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <style>
        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
<?php
    $link = mysqli_connect("localhost", "root");
    mysqli_set_charset($link, 'utf8');
    mysqli_query($link, "Use project;");   // เรียกใช้ฐานข้อมูล
    session_start();
    if(empty($_SESSION['P_Username'])){
        header("location:form_login.php");
    }
    ?>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">

                <div class="d-flex align-items-center ms-4 mb-4">

                    <div class="ms-3 pt-2">
                        <h5 class="mb-0 text-primiry"><?php echo $_SESSION['P_Username']; ?></h5>
                        <span>James&Dis</span>
                    </div>
                </div>

                <div class="navbar-nav w-100">
                    <a href="../page_php/members.php" class="nav-item nav-link "><i class="fa fal fa-users me-2"></i>Members</a>

                    <a href="../page_php/product.php" class="nav-item nav-link  "><i class="fa fal fa-store me-2"></i>Product</a>



                    <a href="../page_php/message.php" class="nav-item nav-link "><i class="fa fal fa-comment-alt me-2"></i>Message</a>
                    <a href="../page_php/order.php" class="nav-item nav-link "><i class="fa fal fa-shopping-cart me-2"></i>Order</a>
                    <a href="pay.php" class="nav-item nav-link active"> <i class="fa fal fa-wallet me-2"></i>Pay</a>
                    <a href="../php/logout.php" class="nav-item nav-link "><i class="fa fas fa-sign-out-alt me-2"></i>Logout</a>
                   
                </div>
        </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class=""></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>


        </nav>
        <!-- Navbar End -->


        <!-- 404 Start -->
        <div class="container-fluid pt-4 px-4">
            <?php
            $sql = "SELECT * FROM pay ORDER BY 
                         CASE `Status`
                         WHEN 'ยังไม่ชำระ' THEN 1
                         WHEN 'รอดำเนินการ' THEN 2
                         WHEN 'ยกเลิกสินค้า' THEN 3
                         WHEN 'เงินไม่พอ' THEN 4
                         WHEN 'ชำระแล้ว' THEN 5
                         ELSE 6
                         END";            
            $result = mysqli_query($link, $sql);
            ?>

            <h3 class="text-center text-primary">แจ้งชำระเงิน</h3><br>
            <table id="myTable">
                <thead>
                    <th>ลำดับ</th>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อ</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>จำนวนเงิน</th>
                    <th>เวลาโอน</th>
                    <th>สถานะ</th>
                    <th>รูปภาพ</th>
                    <th>Created_at</th>
                </thead>
                <?php
                $i = 1;
                foreach ($result as $value) {
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value['id_order']; ?></td>
                        <td><?php echo $value['Name']; ?></td>
                        <td><?php echo $value['Phone']; ?></td>
                        <td><?php echo number_format($value['Money']) . " บาท <br>" . $value['Bank']; ?></td>
                        <td><?php echo $value['Day'] . " " . $value['Time']; ?></td>
                        <td>
                            <form action="../php/update_status.php" method="post">
                                <input class="form-control" type="text" name="Status" value="<?php echo $value['Status']; ?>">
                                <input type="text" name="id_order" value="<?php echo $value['id_order']; ?>" hidden>
                                <input class="form-control btn btn-primary" style="color:blue;margin-top: 5px;" type="submit" name="btn_Status" value="เปลี่ยนสถานะ">
                            </form>
                        </td>
                        <td><?php echo "<img src=../image/pay/$value[Image] . width=150 height=120 >" ?></td>
                        <td><?php echo $value['Created_at']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
        <!-- 404 End -->


        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <script type="text/javascript" src="../js/members.js"></script>
</body>

</html>