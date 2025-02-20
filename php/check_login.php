<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_POST['login'])) {
	include("connect.php");
	
	$Username = $_POST['Username'];
	$Password = $_POST['password'];

	$sql = "SELECT * FROM members WHERE Username = '$Username' ";
	$result = mysqli_query($link, $sql);
	$row = mysqli_Fetch_array($result);
	if (($_POST['Username']) == "admin" && ($_POST['password'] == "admin")) {
		$_SESSION['id'] = $row['id'];
		$_SESSION['Username'] = $row['Username'];
		$_SESSION['Full_name'] = $row['Full_name'];
		echo "<script>
			$(document).ready(function() {
				Swal.fire({
					title: 'ยินดีต้อนรับ!',
					text: 'เข้าสู่ระบบสำเร็จ!',
					icon: 'success',
					timer: 5000,
					showConfirmButton: false
				});
			})
		</script>";
		header("refresh:2; ../admin/page_php/members.php");
	} else {

		if (!empty($row)) {
			if (password_verify($Password, $row['Password'])) {
				$_SESSION['Username'] = $row['Username'];
				$_SESSION['Full_name'] = $row['Full_name'];
				$_SESSION['id'] = $row['id'];
				echo "<script>
			$(document).ready(function() {
				Swal.fire({
					title: 'ยินดีต้อนรับ!',
					text: 'เข้าสู่ระบบสำเร็จ!',
					icon: 'success',
					timer: 5000,
					showConfirmButton: false
				});
			})
		</script>";
				header("refresh:2; url=../page_php/index.php");
				// header('location:../page/index.php');

			} else {
				echo "<script>
			$(document).ready(function() {
				Swal.fire({
					title: 'รหัสผ่านไม่ถูกต้อง!',
					text: 'กรุณาลองใหม่อีกครั้ง!',
					icon: 'error',
					timer: 5000,
					showConfirmButton: false
				});
			})
		</script>";
				header("refresh:2; url=../page_php/form_login.php");
			}
		} else {
			echo "<script>
			$(document).ready(function() {
				Swal.fire({
					title: 'ไม่พบชื่อบัญชีผู้ใช้งาน!',
					text: 'กรุณาลงทะเบียนก่อน!',
					icon: 'warning',
					timer: 5000,
					showConfirmButton: false
				});
			})
		</script>";
			header("refresh:3; url=../page_php/form_login.php");
		}
	}
}

?>