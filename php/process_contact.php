<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
	if(isset($_POST['btn_contact'])){
		include ("connect.php");
		$Name = $_POST['name'];

		if(!($_POST['email'])==""){
			$Email = $_POST['email'];
		}
		else{
			$Email = "-";
		}

		$Title = $_POST['title'];

		if(!($_POST['msg']=="")){
			$Detail = $_POST['msg'];
		}
		else{
			$Detail = "-";
		}

		date_default_timezone_set("Asia/Bangkok");
		$date=date("Y-m-d H:i:s");

		$sql = "INSERT INTO contact(Name,Email,Title,Detail,Created_at) VALUES('$Name','$Email','$Title','$Detail','$date');";
        $result = mysqli_query($link,$sql);
		if ($result) {
			$_SESSION['success'] = 'ข้อความของท่านถูกส่งแล้ว ขอบคุณที่ติดต่อ!';
			echo "<script>
			$(document).ready(function() {
		   Swal.fire({
			   title: 'ขอบคุณที่ติดต่อรา!',
			   text: 'ทำรายการสำเร็จ!',
			   icon: 'success',
			   timer: 5000,
			   showConfirmButton: false
			   });
				})
			   </script>";
		   header("refresh:2; url=../page_php/form_contact.php");
		} else {
			  echo "<script>
			$(document).ready(function() {
				Swal.fire({
					title: 'ไม่สำเร็จ!',
					text: 'กรุณาทำรายการใหม่อีกครั้ง!',
					icon: 'error',
					timer: 5000,
					showConfirmButton: false
				});
			 })
			 </script>";
		header("refresh:2; url=../page_php/form_contact.php");
			   
		}
	} else {
		echo "<script>
		$(document).ready(function() {
			Swal.fire({
				title: 'ไม่สำเร็จ!',
				text: 'ไม่พบฐานข้อมูล!',
				icon: 'error',
				timer: 5000,
				showConfirmButton: false
			});
		 })
		 </script>";
	header("refresh:2; url=../page_phpF/form_contact.php");
		}
		?>