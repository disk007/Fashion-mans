<?php
	if(isset($_GET['id'])){
		include("connect.php");
		$id = $_GET['id'];

		$sql="DELETE FROM address WHERE id='$id'";
		$result=mysqli_query($link,$sql);
		if($result){
			header("location:../page_php/address.php");
		}
		else{
			echo "<script>
			alert('ลบข้อมูลไม่สำเร็จ');
			</script>";
		}
	}
	else{
		header("location:../page_php/address.php");
	}
?>