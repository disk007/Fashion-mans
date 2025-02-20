<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style_index.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <style>
    #dropdown-menu-right {
      right: 0;
      left: auto;
    }

    nav {
      font-size: 1.2rem !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="../img/logo/logo.svg" width="45px" height="20" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">หน้าแรก</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="hto.php">วิธีการสั่งซื้อ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about_us.php">เกี่ยวกับเรา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form_contact.php">ติดต่อเรา</a>
          </li>

        </ul>
        <?php if (isset($_SESSION['Username'])) {
          include("cart_product.php");
        ?>


          <div class="nav-item dropdown navbar-nav ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['Full_name']; ?>
            </a>
            <ul id="dropdown-menu-right" class="dropdown-menu  " aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i>&nbsp;บัญชีของฉัน</a></li>
              <li><a class="dropdown-item" href="address.php"><i class="fas fa-address-card"></i>&nbsp;ที่อยู่ของฉัน</a></li>
              <li><a class="dropdown-item" href="history_order.php"><i class="fas fa-history"></i>&nbsp;ประวัติการซื้อของฉัน</a></li>
              <li><a class="dropdown-item" href="payment.php"><i class="fas fa-money-check"></i>&nbsp;ชำระเงิน</a></li>
              <li><a class="dropdown-item" href="change_password.php"><i class="fas fa-key"></i>&nbsp;เปลี่ยนรหัสผ่าน</a></li>
              <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;ออกจากระบบ</a></li>
            </ul>
          </div>

        <?php } else { ?>
          <div class="navbar-nav ms-auto">

            <div class="ms-3" style="margin-top: 8px;"></div>
            <a href="form_login.php" class="nav-link">เข้าสู่ระบบ</a>
            <a href="form_register.php" class="nav-item nav-link">สมัครสมาชิก</a>
          </div>
        <?php } ?>

        <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      </div>
    </div>
  </nav>
</body>

</html>