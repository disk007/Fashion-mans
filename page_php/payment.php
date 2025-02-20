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
$sql1 = "SELECT * FROM members WHERE Username = '" . $_SESSION['Username'] . "' ";
$result1 = mysqli_query($link, $sql1);
$row = mysqli_Fetch_array($result1);
$Username = $_SESSION['Username'];
$sql = "SELECT * FROM list WHERE Status = 'ยังไม่ชำระ' AND Username = '$Username' ";
$result = mysqli_query($link, $sql);


?>
<style>
	.con {
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
						<li class="list-group-item "><a href="profile.php"><i class=" fas fa-user" aria-hidden="true"></i>&nbsp;บัญชีของฉัน</a></li>
						<li class="list-group-item"><a href="address.php"><i class="fas fa-address-card" aria-hidden="true"></i>&nbsp;ที่อยู่ของฉัน</a></li>
						<!-- <li class="list-group-item"><a href="#"><i class="fas fa-shopping-cart" aria-hidden="true"></i>&nbsp;รายการสั่งซื้อ</a></li> -->
						<li class="list-group-item"><a href="history_order.php"><i class="fas fa-history" aria-hidden="true"></i>&nbsp;ประวัติการซื้อของฉัน</a></li>
						<li class="list-group-item"><a href="payment.php"style="color: #0d6efd;"><i class="fas fa-money-check" aria-hidden="true"></i>&nbsp;ชำระเงิน</a></li>
						<li class="list-group-item"><a href="change_password.php" ><i class="fas fa-key" aria-hidden="true"></i>&nbsp;เปลี่ยนรหัสผ่าน</a></li>
						<li class="list-group-item"><a href="../page_php/logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp;ออกจากระบบ</a></li>
					</ul>
				</div>
			</div>
			<div class="border-2 border-secondary rounded-2 col-md-8  mx-auto p-3">
				<h4 class="text-info pb-0">แจ้งชำระเงิน</h4>
				<h5 class="mb-2 pb-0 fs-6 text-center">หากท่านสั่งซื้อโดยการสมัครสมาชิก โปรด login ก่อนแจ้งชำระเงิน</h5>
		

				
					<div class="row justify-content-center mx-0">
						<div class="col col-md-4 mb-0 ">
							<form action="../php/pay.php" method="POST" name="addprd" class="form-horizontal text-start" id="addprd" enctype="multipart/form-data">
								<div class="form-group">
									<div class="col mb-1">
										<select class="form-control select_id" id="select_id" name="select_id">
											<option value="" selected disabled>เลือกรหัสการสั่งซื้อ</option>
											<?php
											$id_code = "";
												while($value = mysqli_Fetch_array($result)){
													if ($id_code != $value['id_order']) {
                            								$id_code = $value['id_order'];
											?>
													<option value="<?php echo $value['id_order'] ?>"><?php echo $id_code; ?></option>
											<?php
													}
												}
											?>	
										</select>
										<!-- <select id="A">
                                    <option value="" selected disabled>จำนวน</option>
                                </select>&nbsp;&nbsp; -->
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="col mb-1">
										<label> เบอร์โทรศัพท์</label>
										<input type="text" class="form-control" required placeholder="เบอร์โทรศัพท์"  value="<?php echo $row['Phone'] ?>" disabled/>
										<input type="text" name="pay_tel"  id="pay_tel" class="form-control" required placeholder="เบอร์โทรศัพท์"  value="<?php echo $row['Phone'] ?>" hidden/>
									</div>
								</div>
								<div class="form-group">
									<div class="col mb-1-sm-3">
										<select class="form-control pay_money" id="pay_money" name="pay_money">
											<option value="" selected disabled>จำนวนเงิน</option>n>
										</select>
									</div>
								</div>
								<label for="">ธนาคาร</label>
								<select name="pay_bank" class="form-control">
	
									<option value="กรุงไทย">กรุงไทย</option>
								</select>
								<div class="form-group">
									<div class="col mb-1">
										<label for="">วัน</label>
										<input type="date" name="pay_date" class="form-control" required placeholder="วัน" />
									</div>
								</div>
								<div class="form-group">
									<div class="col mb-1">
										<label> เวลาโอน</label>
										<input type="time" name="pay_time" class="form-control" required placeholder="เวลา" />
									</div>
								</div>
								<div class="form-group">
									<div class="col mb-1-sm-8 info">
										<label> หลักฐานการโอน </label>
										<input type="file" name="pay_img" class="form-control" accept="image/*"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col mb-1">
										<input type="hidden" name="pay_status" class="form-control" value="2" />
									</div>
								</div>
								<div class="form-group">

									<div class="col mb-1 pt-2 ">
										<button type="submit" class="btn btn-primary" name="btnadd"> แจ้งชำระเงิน </button>
									</div>
								</div>
							</form>

						</div>
						<div class="col-md-6 col-lg-5 col-xl-5 ">

							<div>
								<img src="../img/pic all/g.png" class="rounded mx-auto d-block" alt="">
							</div>
							<h4 class="p-0 pb-0" style="color:#3498db">	เลขบัญชี:319-3-05896-3 
						
							<h4 class="p-2 pb-0" style="color:rgb(231, 76, 60)">
								"ขอบคุณที่ให้ข้อมูลเพื่อใช้ในการตรวจสอบ "
							</h4>
							<button class="fs-5" style="color:#3498db"> <a href="../page_php/form_contact.php">>>หากมีข้อสังสัยกรุณาติดต่อเรา<<</a></button>
							<p>
								คลิกข้อความด้านบนเพื่อเข้าสู่หน้าติดต่อเรา
							</p>
							



						</div>

					</div>
					
				</div>

			</div>
		</div>
	</div>
	</div>


	<!-- กก -->

	<!-- กก -->
	<!-- ส่วนล่าง -->
	<!-- ส่วนล่าง -->
	<br>
	<?php
	include("../php/ajax_pay.php");
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