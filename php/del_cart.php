<?php
	if(isset($_GET['id_code'])){
		include("connect.php");
		$id_code = $_GET['id_code'];
		$size = $_GET['size'];
		$sql="DELETE FROM cart WHERE id_code ='$id_code' AND Size = '$size' ";
		$result=mysqli_query($link,$sql);
		if($result){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else{
			echo "<script>
			alert('ลบข้อมูลไม่สำเร็จ');
			</script>";
		}
	}
	else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>