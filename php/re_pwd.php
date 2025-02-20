<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
	if(isset($_GET['id'])){

		include("connect.php");

		$default_pwd = $_POST['Password'];
		$re_pwd = $_POST['re_password'];
		$confirm_pwd = $_POST['confirm_pwd'];
		$id = $_GET['id'];

		if($re_pwd == $confirm_pwd){
			$sql = "SELECT * FROM members WHERE id = '$id'";
  			$result = mysqli_query($link, $sql);
  			$row = mysqli_Fetch_array($result);

  			if(password_verify($default_pwd, $row['Password'])){
  				$hashed_password = password_hash($re_pwd, PASSWORD_DEFAULT);
   				$sql = "UPDATE members SET Password = '$hashed_password' WHERE id = '$id';";
   				$result = mysqli_query($link,$sql);

   				if($result){
   					echo "<script>
							$(document).ready(function() {
								Swal.fire({
									title: 'สำเร็จ!',
									text: 'เปลี่ยนรหัสผ่านใหม่สำเร็จแล้ว',
									icon: 'success',
									timer: 5000,
									showConfirmButton: false
								});
							})
						</script>";
        			header("refresh:2; url=../page_php/change_password.php");
				}
  			}
  			else{
  				echo "<script>
							$(document).ready(function() {
								Swal.fire({
									title: 'ไม่สำเร็จ!',
									text: 'รหัสผ่านเดิมไม่ถูกต้อง',
									icon: 'error',
									timer: 5000,
									showConfirmButton: false
								});
							})
						</script>";
        		header("refresh:2; url=../page_php/change_password.php");
   			}	
		}
		else{
				echo "<script>
							$(document).ready(function() {
								Swal.fire({
									title: 'ไม่สำเร็จ!',
									text: 'รหัสผ่านใหม่ไม่ตรงกัน',
									icon: 'error',
									timer: 5000,
									showConfirmButton: false
								});
							})
						</script>";
        		header("refresh:2; url=../page_php/change_password.php");
        	}
	}
	else{
		header("location:../page_php/change_password.php");
	}
?>