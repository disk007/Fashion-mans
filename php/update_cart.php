<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if(isset($_POST['select_size'])){
    session_start();
    $link = mysqli_connect("localhost", "root");
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"Use project;");   // เรียกใช้ฐานข้อมูล
    $total = 0;
    $id = $_POST['id'];
    $Picture = $_POST['Picture'];
    $act = $_GET['act'];
    $Name = $_POST['Name'];
    $Size = $_POST['select_size'];
    $amount = $_POST['select_amount'];
    $Price = $_POST['Price'];
    $Id_code = $_POST['Id_code'];
    $Username = $_SESSION['Username'];
    $sql = "SELECT * FROM cart WHERE id_code = '$Id_code' AND Size = '$Size'";
    $result = mysqli_query($link,$sql);

    if(mysqli_num_rows($result)>0){
      $sql = "SELECT * FROM cart WHERE id_code = '$Id_code' AND Size = '$Size'";
      $re = mysqli_query($link,$sql);
      $value = mysqli_Fetch_array($re);
      $total = $value['Amount']+$amount;
        
      $sql="UPDATE cart SET Amount ='$total' WHERE id_code = '$Id_code' AND Size = '$Size' ";
      $re=mysqli_query($link,$sql);
      if($re){
        header("location:../page_php/page_product.php?id=$id");
      }
      else{
        echo("ผืดพลาด");
      }      
    }
    else{
      $sql = "INSERT INTO cart (Product,Picture,id_code,Size,Amount,Price,Username) 
              VALUES ('$Name','$Picture','$Id_code','$Size','$amount','$Price','$Username');";
      $result = mysqli_query($link,$sql);
      if($result){
        header("location:../page_php/page_product.php?id=$id");
      }
      else{
        echo "<script>
        $(document).ready(function() {
          Swal.fire({
            title: 'ผิดพลาด!',
            text: 'กรุณาลองใหม่อีกครั้ง!',
            icon: 'error',
            timer: 5000,
            showConfirmButton: false
          });
        })
      </script>";
          // header("refresh:2; url=../page_php/page_product.php");
          header('refresh:2; ' . $_SERVER['HTTP_REFERER']);
        }
      }
    }
else{
	echo "<script>
			$(document).ready(function() {
				Swal.fire({
					title: 'ยังไม่ได้กรอกข้อมูล!',
					text: 'กรุณาลองใหม่อีกครั้ง!',
					icon: 'error',
					timer: 5000,
					showConfirmButton: false
				});
			})
		</script>";
				// header("refresh:2; url=../page_php/page_product.php");
        header('refresh:2; ' . $_SERVER['HTTP_REFERER']);

			}


?>