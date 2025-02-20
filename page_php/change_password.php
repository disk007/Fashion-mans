<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/change_password.css">
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
	$value = mysqli_Fetch_array($result);


?>
<style>
	.con{
		height: 100%;
	}
</style>
<link rel="stylesheet" href="../css/style_profile.css">


	<body>

		<div class="con container">
			<div class="row mt-4 p-2">
				<div class="col-sm-3 hidden-xs hidden-md hidden-sm">
					<div class="menu-settings  border-2 border-secondary rounded-2">
						<ul class="list-group list-group-flush pb-2 settings  ">
							<li class="list-group-item "><a href="profile.php" ><i class=" fas fa-user" aria-hidden="true"></i>&nbsp;บัญชีของฉัน</a></li>
							<li class="list-group-item"><a href="address.php"><i class="fas fa-address-card" aria-hidden="true"></i>&nbsp;ที่อยู่ของฉัน</a></li>
							<!-- <li class="list-group-item"><a href="#"><i class="fas fa-shopping-cart" aria-hidden="true"></i>&nbsp;รายการสั่งซื้อ</a></li> -->
							<li class="list-group-item"><a href="history_order.php"><i class="fas fa-history" aria-hidden="true"></i>&nbsp;ประวัติการซื้อของฉัน</a></li>
							<li class="list-group-item"><a href="payment.php"><i class="fas fa-money-check" aria-hidden="true"></i>&nbsp;ชำระเงิน</a></li>
							<li class="list-group-item"><a href="change_password.php" style="color: #0d6efd;"><i class="fas fa-key" aria-hidden="true"></i>&nbsp;เปลี่ยนรหัสผ่าน</a></li>
							<li class="list-group-item"><a href="../page_php/logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp;ออกจากระบบ</a></li>
						</ul>
					</div>
				</div>
				<div class="border-2 border-secondary rounded-2 col-md-8  mx-auto p-3">
					<h4>เปลี่ยนรหัสผ่าน</h4>
					<h5 class="mb-2 pb-0 fs-6 text-center">เปลี่ยนรหัสผ่านใหม่ เพื่อให้บัญชีมีความปลอดภัยขึ้น</h5>
					<div class="bg_form">
						<form action="../php/re_pwd.php?id=<?php echo $value["id"]; ?>" method="post">
							<div class="form-group">
								<label for="Password" class="form-label">รหัสผ่านเดิม :</label>
								<input type="password" class="form-control" id="Password" name="Password" required>
							</div><br>
							<div class="form-group">
								<label for="re_password" class="form-label">รหัสผ่านใหม่ :</label>
								<input type="password" class="form-control" id="re_password" name="re_password" required>
							</div><br>
							<div class="form-group">
								<label for="confirm_pwd" class="form-label">ยืนยันรหัสผ่าน :</label>
								<input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" required>
							</div><br>
							<div class="col">
								<button class="btn btn-outline-primary" type="submit" name="re_pwd" id="re_pwd">ยืนยัน</button>
							</div><br>
						</form>
					</div>
			
				</div></div></div></div>


				<!-- กก -->
				
				<!-- กก -->
				<!-- ส่วนล่าง -->
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
	<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
<?php
	include('../php/ajax_address.php');
	include("../php/jquery_click.php");
?>