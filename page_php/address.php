<header>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/style_address.css">
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
	?>
		<link rel="stylesheet" href="../css/style_profile.css">
		<style>
		 .con{
    height: 100%;
  }
		</style>
		
</header>

<body>
	<div class="con container">
		<div class="row mt-4 p-2">
			<div class="col-sm-3 hidden-xs hidden-md hidden-sm">
				<div class="menu-settings  border-2 border-secondary rounded-2">
					<ul class="list-group list-group-flush pb-2 settings  ">
						<li class="list-group-item "><a href="profile.php"><i class=" fas fa-user" aria-hidden="true"></i>&nbsp;บัญชีของฉัน</a></li>
						<li class="list-group-item"><a href="address.php" style="color: #0d6efd;"><i class="fas fa-address-card" aria-hidden="true"></i>&nbsp;ที่อยู่ของฉัน</a></li>
						<!-- <li class="list-group-item"><a href="#"><i class="fas fa-shopping-cart" aria-hidden="true"></i>&nbsp;รายการสั่งซื้อ</a></li> -->
						<li class="list-group-item"><a href="history_order.php"><i class="fas fa-history" aria-hidden="true"></i>&nbsp;ประวัติการซื้อของฉัน</a></li>
						<li class="list-group-item"><a href="payment.php"><i class="fas fa-money-check" aria-hidden="true"></i>&nbsp;ชำระเงิน</a></li>
						<li class="list-group-item"><a href="change_password.php"><i class="fas fa-key" aria-hidden="true"></i>&nbsp;เปลี่ยนรหัสผ่าน</a></li>
						<li class="list-group-item"><a href="../page_php/logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp;ออกจากระบบ</a></li>
					</ul>
				</div>
			</div>
			<!-- dd -->
			<div class="border-2 border-secondary rounded-2 col-md-8  mx-auto p-3">
				<h4 class="text-left pb-1">ที่อยู่ของฉัน</h4>
				<h5 class="mb-0 pb-0 fs-6 text-center ">ที่อยู่เพิ่มเติม เช่น ที่พักอาศัย ที่ทำงาน เป็นต้น</h5>

				<div class=""><button data-bs-toggle="modal" class="btn btn-outline-primary" data-bs-target="#exampleModal"><img class="editImg">เพิ่มที่อยู่</button></div>
				<hr>
				<?php
				$i = 1;
				$sql = "SELECT * FROM address WHERE Username = '" . $_SESSION['Username'] . "' ";
				$result = mysqli_query($link, $sql);

				while ($value = mysqli_Fetch_array($result)) {

					echo "<div class=box1 >";
					echo  "<img class='pic' src='../img/logo/house.png' alt=''>";
					echo "<div class=box2><b>ที่อยู่ : <font color=red>", $i++, "</font></b>";
				?>
					<span class="logo_del"><a name="del_address" class="btn_del"  href="../php/del_address.php?id=<?php echo $value["id"]; ?>"><button class="btn-sm btn-danger">ลบข้อมูล</button></a></span>

			</div>
		<?php
					echo "<p><div class=box3>ชื่อ: $value[Fname] <br>
						ที่อยู่: $value[House_number] ตำบล: $value[Sub_district] อำเภอ:$value[District]<br> จังหวัด: $value[Province]    รหัสไปรษณีย์: $value[Postcode]<br>
						เบอร์โทรศัพท์: $value[Phone]</div><p>";

					echo "</div> <hr>";
				}



				?>
		


		</div>

		</div>
		<!-- dd -->


		<!-- Modal -->
		<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="col modal-title text-center" id="exampleModalLabel">เพิ่มที่อยู่ของฉัน</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<div class="modal-body">
						<?php
						$sql = "SELECT * FROM provinces";
						$result = mysqli_query($link, $sql);
						?>
						<form action="../php/add_address.php" method="post">

							<div class="form-group  ">
								<label for="Fname" class=" col-form-label">ชื่อ :</label>
								<div class="col col-md">
									<input type="text" class="form-control  " id="Fname" name="Fname" required>
								</div>
							</div><br>

							<div class="form-group  ">
								<label for="Lname" class=" col-form-label">นามสกุล :</label>
								<div class="col col-md">
									<input type="text" class="form-control " id="Lname" name="Lname" required>
								</div>
							</div><br>

							<div class="form-group  ">
								<label for="House_number" class=" col-form-label">บ้านเลขที่ :</label>
								<div class="col col-md">
									<input type="text" class="form-control  " id="House_number" name="House_number" required>
								</div>
							</div><br>

							<div class="form-group  ">
								<label for="provinces" class=" col-form-label">จังหวัด :</label>
								<div class="col col-md">
									<select class="form-select " name="Ref_prov_id" id="provinces" aria-label=".form-select-md example">
										<option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
										<?php foreach ($result as $value) { ?>
											<option value="<?= $value['id'] ?>"><?= $value['name_th'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div><br>

							<div class="form-group  ">
								<label for="sel1" class=" col-form-label">อำเภอ :</label>
								<div class="col col-md">
									<select class="form-control" name="Ref_dist_id" id="amphures" aria-label=".form-select-md example"></select>
								</div>
							</div><br>

							<div class="form-group  ">
								<label for="sel1" class=" col-form-label">ตำบล :</label>
								<div class="col col-md">
									<select class="form-control" name="Ref_subdist_id" id="districts" aria-label=".form-select-md example"></select>
								</div>
							</div><br>

							<div class="form-group  ">
								<label for="sel1" class=" col-form-label">รหัสไปรษณีย์ :</label>
								<div class="col col-md">
									<input type="text" class="form-control " name="zip_code" id="zip_code" required>
								</div>
							</div><br>

							<div class="form-group  ">
								<label for="Phone" class=" col-form-label">เบอร์โทรศัพท์ :</label>
								<div class="col col-md">
									<input type="text" class="form-control" id="Phone" name="Phone" required>
								</div>
							</div><br>

							<div class="form-group  ">
								<label for="Other" class=" col-form-label">อื่นๆ :</label>
								<div class="col col-md">
									<textarea class="form-control" name="Other" id="Other" rows="5"></textarea>
								</div>
							</div><br>

					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="save_address" value="Save">
						<input class="btn btn-secondary" value="Close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						</form>

					</div>
				</div>
			</div>
		</div>
		</div>
  <!-- ส่วนล่าง -->
  <?php
  include('../php/confirm_address.php');
  include('footer.php');
  ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../javascript/profile.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<?php
		include('../php/ajax_address.php');
		include("../php/jquery_click.php");
?>