<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_POST['A_login'])) {
	include("connect.php");

	$Username = $_POST['P_Username'];
	$Password = $_POST['P_Password'];

	$sql="SELECT * FROM admin WHERE Username='$Username' AND Password='$Password'";
	$result=mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	if($row){
		$_SESSION['P_Username'] = $row['Username'];
		$_SESSION['P_id'] = $row['id'];
		echo "<script>
			$(document).ready(function() {
		Swal.fire({
			title: 'ยินดีต้อนรับ!',
			text: 'เข้าสู่ระบบสำเร็จ!',
			icon: 'success',
			timer: 2000,
			showConfirmButton: false
		});
		})
		</script>";
		header("refresh:2; url=../page_php/members.php");

			} 
		else {
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
	}
	else{
		header('Location: ../page_php/form_login.php');
	}
	
?>