<!DOCTYPE html>
<html lang="en">
<?php
    $link = mysqli_connect("localhost", "root");
    mysqli_set_charset($link, 'utf8');
    mysqli_query($link, "Use project;");   // เรียกใช้ฐานข้อมูล
    session_start();
    if(empty($_SESSION['P_Username'])){
        header("location:form_login.php");
    }
    ?>
<?php if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id ='$id'";
    $result = mysqli_query($link, $sql);
    $data = mysqli_Fetch_array($result);
    // $sql1 = "SELECT * FROM deimage WHERE id ='$id_order'";
    // $result1 = mysqli_query($link, $sql1);
    // $data1 = mysqli_Fetch_array($result1);
?>

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

        <!-- Template Stylesheet -->
        <link href="../css/style.css" rel="stylesheet">
        <style>

        </style>
    </head>

    <body>
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
                        <a href="index.html" class="nav-item nav-link active"><i class="fa fal fa-users me-2"></i>Members</a>

                        <a href="../page_php/product.php" class="nav-item nav-link  "><i class="fa fal fa-store me-2"></i>Product</a>
                        <a href="../page_php/message.php" class="nav-item nav-link"><i class="fa fal fa-comment-alt me-2"></i>Message</a>
                        <a href="../page_php/order.php" class="nav-item nav-link"><i class="fa fal fa-shopping-cart me-2"></i>Order</a>

                        <a href="../page_php/pay.php" class="nav-item nav-link "> <i class="fa fal fa-wallet me-2"></i>Pay</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="signin.html" class="dropdown-item">Sign In</a>
                                <a href="signup.html" class="dropdown-item">Sign Up</a>
                                <a href="404.html" class="dropdown-item ">404 Error</a>
                                <a href="blank.html" class="dropdown-item">Blank Page</a>
                            </div>
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
                <h3 class="text-center text-primary pt-3 mt-4 justify-content-center">เพิ่มสินค้า</h3>
                <div class="row justify-content-center">
                    <form class=" col col-md-5 " action="../php/update_product.php" method="post" enctype="multipart/form-data">
                        <div class="">
                            <label for="Name" id="product" >ชื่อสินค้า</label>
                            <input type="text" class="form-control" name="Name" id="Name" value="<?php echo $data['Name']; ?>" required>
                        </div>
                        <div class="row  d-flex  ">
                            <div class="col-3"> Size : S
                                <input type="text" class="form-control" placeholder="จำนวน" name="Amount_S" value="<?php echo $data['Amount_S']; ?>" required>
                            </div>
                            <div class="col-3">

                                Size : M<input type="text" class="form-control" placeholder="จำนวน" name="Amount_M" value="<?php echo $data['Amount_M']; ?>" required>
                            </div>
                            <div class="col-3">
                                Size : L<input type="text" class="form-control" placeholder="จำนวน" name="Amount_L" value="<?php echo $data['Amount_L']; ?>" required></div>
                            <div class="col-3">
                                Size : XL<input type="text" class="form-control" placeholder="จำนวน" name="Amount_XL" value="<?php echo $data['Amount_XL']; ?>" required></div>
                            <input type="text" name="id" value="<?php echo $data['id']; ?>" hidden>


                        </div>

                        <div class="">
                            <label for="Price">ราคา</label>
                            <input type="text" class="form-control" name="Price" id="Price" name="Price" value="<?php echo $data['Price']; ?>" required>
                            <label for="Type">ชนิดเสื้อ</label>
                            <input type="text" class="form-control" name="Type" id="Type" name="Type" value="<?php echo $data['Type']; ?>" required>
                        </div>

                        <label>รูปภาพ</label>
                        <input type="file" style="cursor: 
                    pointer;" class="form-control" name="Picture">
                        <label>รูปภาพเพิ่มเติม</label>
                    <input type="file" style="cursor: 
                    pointer;" class="form-control" name="upload[]" multiple="multiple" accept="image/*">
                    <input type="type" name="id_code" value="<?php echo $data['id_code']; ?>" hidden>

                        <div class="">
                            <label for="Detail" style="font-size: 18px;">รายละเอียด</label>
                            <textarea class="form-control" class="detail" id="Detail" rows="10" name="Detail" required><?php echo $data['Detail']; ?>"</textarea>
                        </div>
                        <div class="p-3">
                            <button type="submit" name="edit" class="btn btn-outline-primary">อัตเดตสินค้า</button>
                        </div>
                    </form>
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

        <!-- Template Javascript -->
        <script src="../js/main.js"></script>
    </body>

</html>
<?php
} else {
    header("location:../page_php/product.php");
}
?>