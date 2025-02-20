<?php
	if(isset($_GET['id'])){
		include("connect.php");
		$id = $_GET['id'];
		
		$sql="DELETE FROM deimage WHERE id_product ='$id'";
		$result=mysqli_query($link,$sql);
		$sql="DELETE FROM product WHERE id_code ='$id'";
		$result=mysqli_query($link,$sql);
		if($result){
			header("location:../page_php/product.php");
		}
		else{
			echo "<script>
					$(document).ready(function() {
						Swal.fire({
							title: 'ล้มเหลว',
							text: 'ไม่สำเร็จ',
							icon: ''error'',
							timer: 5000,
							showConfirmButton: false
						});
					})
				</script>";
			header("refresh:2; url=../page_php/product.php"); ;
		}
	}
	else{
		header("location:../page_php/product.php");
	}
?>