<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
	if (isset($_POST['btnadd'])) {
		include "connect.php";
		$id_order = $_POST['select_id'];
		$pay_name = $_SESSION['Username'];
		$pay_tel = $_POST['pay_tel'];
		$pay_money = $_POST['pay_money'];
		$pay_bank = $_POST['pay_bank'];
		$pay_date = $_POST['pay_date'];
		$pay_time = $_POST['pay_time'];
		date_default_timezone_set("Asia/Bangkok");
		$date=date("Y-m-d H:i:s");

		$dir = "../admin/image/pay/";
		$fileImage = $dir . $_FILES["pay_img"]["name"];
		$pay_img = $_FILES["pay_img"]["name"];
		if (move_uploaded_file($_FILES["pay_img"]["tmp_name"], $fileImage)) {
			null;
		}
		else{
			echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์ของคุณ";
		}
		$sql = "SELECT * FROM list WHERE id_order ='$id_order' ";
		$result = mysqli_query($link,$sql);
		$count_id = mysqli_num_rows($result);
		for($i=0; $i<$count_id; $i++){
			$sql="UPDATE list SET Status ='รอดำเนินการ' WHERE id_order = '$id_order' ";
			$re=mysqli_query($link,$sql);
		}
		$sql = "INSERT INTO pay(id_order,Name,Phone,Money,Bank,Day,Time,Image,Created_at) 
    			VALUES('$id_order','$pay_name','$pay_tel','$pay_money','$pay_bank','$pay_date','$pay_time','$pay_img','$date');";

    	 $result = mysqli_query($link,$sql);
            if($result){
                    echo "<script>
							$(document).ready(function() {
								Swal.fire({
									title: 'สำเร็จ!',
									text: 'ส่งหลักฐานเรียบร้อย',
									icon: 'success',
									timer: 5000,
									showConfirmButton: false
								});
							})
						</script>";
        			header("refresh:2; url=../page_php/payment.php");
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
        			header("refresh:2; url=../page_php/payment.php"); 
            }
	}
	else{
		header("location:../page_php/mpayment.php");
	}	
?>