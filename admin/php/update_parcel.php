<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
	if($_POST['btn_Parcel']){
		include "connect.php";
		$id_order = $_POST['id_order'];
		$parcel = $_POST['Parcel'];
		$sql = "SELECT * FROM list WHERE id_order ='$id_order' ";
		$result = mysqli_query($link,$sql);
		$count_id = mysqli_num_rows($result);
		for($i=0; $i<$count_id; $i++){
			$sql="UPDATE list SET parcel ='$parcel' WHERE id_order = '$id_order' ";
			$re=mysqli_query($link,$sql);
		}
		echo "<script>
				$(document).ready(function() {
					Swal.fire({
						title: 'อัตเดต!',
						text: 'อัตเดตเรียบร้อย',
						icon: 'success',
						timer: 5000,
						showConfirmButton: false
					});
				})
			</script>";
		header('refresh:2; ' . $_SERVER['HTTP_REFERER']);
	}
	else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>