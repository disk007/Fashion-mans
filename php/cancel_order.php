<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
		include "connect.php";
		if (empty($_SESSION['Username'])) {
		        header('location:index.php');
		    }
		$id_order = $_GET['id'];
		$sql = "SELECT * FROM list WHERE id_order ='$id_order' ";
		$result = mysqli_query($link,$sql);
		$count_id = mysqli_num_rows($result);
		for($i=0; $i<$count_id; $i++){
			$sql="UPDATE list SET Status ='ยกเลิกสินค้า' WHERE id_order = '$id_order' ";
			$re=mysqli_query($link,$sql);
		}
		echo "<script>
				$(document).ready(function() {
					Swal.fire({
						title: 'เรียบร้อย!',
						text: 'ยกเลิกสินค้าเรียบร้อย',
						icon: 'success',
						timer: 5000,
						showConfirmButton: false
					});
				})
			</script>";
		header('refresh:2; ' . $_SERVER['HTTP_REFERER']);

?>