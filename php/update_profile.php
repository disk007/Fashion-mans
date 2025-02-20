<?php
	if(isset($_POST['edit_profile'])){
		include('connect.php');
		$id = $_GET['id'];
		$Full_name = $_POST['Full_name'];
		$Email = $_POST['Email'];
		$Age = $_POST['Age'];
		$Phone = $_POST['Phone'];

		$sql="UPDATE members SET Full_name='$Full_name',Email='$Email',Age='$Age',Phone='$Phone' WHERE id=$id;";
		$result=mysqli_query($link,$sql);

		if($result){
			header("location:../page_php/profile.php");
		}
		else{
			echo "ผิดพลาด";
		}
	}
?>