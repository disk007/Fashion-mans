<?php
	if(isset($_POST['add'])){

		include ("connect.php");

		$Name = $_POST['Name'];
		$Amount_S = "";
		$Amount_M = "";
		$Amount_L = "";
		$Amount_XL = "";
		$Price = $_POST['Price'];
		$Type = $_POST['Type'];
		$Detail = $_POST['Detail'];
		$Amount_S = $_POST['Amount_S'];
		$Amount_M = $_POST['Amount_M'];
		$Amount_L = $_POST['Amount_L'];
		$Amount_XL = $_POST['Amount_XL'];
		date_default_timezone_set("Asia/Bangkok");
		$date=date("Y-m-d H:i:s");
		$id_code = uniqid('p');
		
		$dir = "../image/product/";
		$fileImage = $dir . $_FILES["Picture"]["name"];
		$Picture = $_FILES["Picture"]["name"];
		
		if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $fileImage)) {
			null;
		}
		else{
			echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์ของคุณ";
		}

		foreach ($_FILES['upload']['tmp_name'] as $key => $value) {
			$file_names = $_FILES['upload']['name'];
			$new_name = $file_names[$key];
			if(move_uploaded_file($_FILES['upload']['tmp_name'][$key],"../image/detail_image/".$new_name)){
				$sql = "INSERT INTO deimage(Name,id_product,Created_at) 
    			VALUES('$new_name','$id_code','$date');";
    	 		$result = mysqli_query($link,$sql);
			}
		}

		$sql = "INSERT INTO product(Name,id_code,Price,Type,Detail,Picture,Amount_S,Amount_M,Amount_L,Amount_XL,Created_at) 
    			VALUES('$Name','$id_code','$Price','$Type','$Detail','$Picture','$Amount_S','$Amount_M','$Amount_L','$Amount_XL','$date');";

    	 $result = mysqli_query($link,$sql);
            if($result){
                    header("location:../page_php/product.php");
            }
            else{
                    echo "ไม่เรียบร้อย";  
            }
	}

?>