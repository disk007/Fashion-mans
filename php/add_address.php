<?php
include ("connect.php");
	if(isset($_POST['save_address'])){

		$Fname = $_POST['Fname'];
		$Lname = $_POST['Lname'];
		$House_number = $_POST['House_number'];
		$Ref_prov_id = $_POST['Ref_prov_id'];
		$Ref_dist_id = $_POST['Ref_dist_id'];
		$Ref_subdist_id = $_POST['Ref_subdist_id'];
		$zip_code = $_POST['zip_code'];
		$Phone = $_POST['Phone'];
		$Other = $_POST['Other'];
		$Username = $_SESSION['Username'];
		// $id_user = $_SESSION['id'];

		$sql = "SELECT * FROM members WHERE Username='$Username'";
  		$result = mysqli_query($link, $sql);
  		$data = mysqli_Fetch_array($result);
    	$id = $data['id'];

		$sql = "SELECT * FROM provinces WHERE id='$Ref_prov_id'";
  		$result = mysqli_query($link, $sql);
  		$data = mysqli_Fetch_array($result);
    	$provinces = $data['name_th'];

  		$sql = "SELECT * FROM amphures WHERE id='$Ref_dist_id'";
  		$result = mysqli_query($link, $sql);
  		$data = mysqli_Fetch_array($result);
    	$amphures = $data['name_th'];

  		$sql = "SELECT * FROM districts WHERE id='$Ref_subdist_id'";
  		$result = mysqli_query($link, $sql);
  		$data = mysqli_Fetch_array($result);
    	$districts = $data['name_th'];

    	$sql = "INSERT INTO address(Username,Fname,Lname,Sub_district,District,Province,Postcode,House_number,	 Phone,Other,id_user) 
    			VALUES('$Username','$Fname','$Lname','$districts','$amphures','$provinces','$zip_code','$House_number','$Phone','$Other','$id');";

    	 $result = mysqli_query($link,$sql);
                        if($result){
                                header("location:../page_php/address.php");
                        }
                        else{
                                echo "ไม่เรียบร้อย";  
                        }

	}
?>