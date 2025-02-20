<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<!-- font CSS -->
<link rel="stylesheet" href="../css/confirm_product.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
	ob_start();
	include("../php/connect.php");
	if(isset($_SESSION['Username'])){

		if(isset($_POST['btn_confirm'])){
			$Username = $_SESSION['Username'];
			$Total = $_POST['Total'];
			$Delivery = $_POST['Delivery'];
			$count_address = $_POST['count_address'];
			$order_address = "";
			$Names = array();
			$id_product = array();
			$address = array();
			$quantity = array();
			$Sizes = array();
			$Prices = array();
			$Images = array();

			for($i=0; $i<count($_POST['address']); $i++){
				$address[] = $_POST['address'][$i];
				if($count_address == $i){
					$order_address = $address[$i];
					break;
				}
			}


			for($i=0; $i < count($_POST['Name']);$i++){
				$Names[]  = $_POST['Name'][$i];
				$quantity[] = $_POST['Amount'][$i];
				$Sizes[] = $_POST['Size'][$i];
				$Prices[] = $_POST['Price'][$i];
				$Images[] = $_POST['Image'][$i];
				$id_product[] = $_POST['id_code'][$i];
			}

			$total = 0;
			$total_prices = array();
			for($i=0; $i<count($Prices); $i++){
				$total += $Prices[$i]*$quantity[$i];
				$total_prices[] = $Prices[$i]*$quantity[$i];
			}
			$id_order = uniqid('order');
			$Username = $_SESSION['Username'];

			for($i=0;$i<count($Names);$i++){
				$sql = "INSERT INTO list(id_order,Username,Address,Delivery,Name_product,Size,Amount,Picture,Price,total_price,total) 
						VALUES('$id_order','$Username','$order_address','$Delivery','$Names[$i]','$Sizes[$i]','$quantity[$i]','$Images[$i]','$Prices[$i]',$total_prices[$i],$total);";
				$result = mysqli_query($link,$sql);
			}
			$total_amount = array();
     		$id_code = array();

			for($i=0; $i<count($quantity); $i++){
				if($Sizes[$i]=="S"){
					$sql = "SELECT * FROM product WHERE id_code ='$id_product[$i]' ";
					$result = mysqli_query($link,$sql);
					while($row = mysqli_Fetch_array($result)){
						 $total_amount[] = $row['Amount_S']-$quantity[$i];
						 $id_code[] = $row['id_code'];
					}
					$sql="UPDATE product SET Amount_S ='$total_amount[$i]' WHERE id_code = '$id_code[$i]' ";
					$re=mysqli_query($link,$sql);

			   }
			   if($Sizes[$i]=="M"){
					$sql = "SELECT * FROM product WHERE id_code ='$id_product[$i]' ";
					$result = mysqli_query($link,$sql);
					while($row = mysqli_Fetch_array($result)){
						 $total_amount[] = $row['Amount_M']-$quantity[$i];
						 $id_code[] = $row['id_code'];
					}
					$sql="UPDATE product SET Amount_M ='$total_amount[$i]' WHERE id_code = '$id_code[$i]' ";
					$re=mysqli_query($link,$sql);
			   }
			   if($Sizes[$i]=="L"){
					$sql = "SELECT * FROM product WHERE id_code ='$id_product[$i]' ";
					$result = mysqli_query($link,$sql);
					while($row = mysqli_Fetch_array($result)){
						 $total_amount[] = $row['Amount_L']-$quantity[$i];
						 $id_code[] = $row['id_code'];
					}
					$sql="UPDATE product SET Amount_L ='$total_amount[$i]' WHERE id_code = '$id_code[$i]' ";
					$re=mysqli_query($link,$sql);
			   }
			   if($Sizes[$i]=="XL"){
					$sql = "SELECT * FROM product WHERE id_code ='$id_product[$i]' ";
					$result = mysqli_query($link,$sql);
					while($row = mysqli_Fetch_array($result)){
						 $total_amount[] = $row['Amount_XL']-$quantity[$i];
						 $id_code[] = $row['id_code'];
					}
					$sql="UPDATE product SET Amount_XL ='$total_amount[$i]' WHERE id_code = '$id_code[$i]' ";
					$re=mysqli_query($link,$sql);
			   }
			}
			$sql="DELETE FROM cart WHERE Username='$Username'";
			$result=mysqli_query($link,$sql);
			if($result){
				echo "<script>
							$(document).ready(function() {
								Swal.fire({
									title: 'สำเร็จ!',
									text: 'ทำรายการสำเร็จ',
									icon: 'success',
									timer: 2000,
									showConfirmButton: false
								});
							})
					</script>";
        		header("refresh:2; url=index.php");
			}
			else{
				echo "<script>
							$(document).ready(function() {
								Swal.fire({
									title: 'ล้มเหลว',
									text: 'ทำรายการไม่สำเร็จ',
									icon: ''error'',
									timer: 5000,
									showConfirmButton: false
								});
							})
						</script>";
        		header("refresh:2; url=index.php"); 
			}
			
		}
		else{
			include("navbar.php");
			$total=0;
  			$sql = "SELECT * FROM cart WHERE Username = '" . $_SESSION['Username'] . "' ";
  			$result = mysqli_query($link,$sql);
?>
	  		<br><br><br><br>
	  		<div class="container" style="width:60%;">
	  		<div style="font-size: 28px; text-align: center;">รายละเอียดในการสั่งซื้อ</div><br>
	  		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	              <table class="table table-bordered text-center">  
	                <tr> 
	                   <th width="20%">รูปภาพ</th> 
	                   <th width="20%">ชื่อสินค้า</th>  
	                   <th width="10%">จำนวน</th>
	                   <th width="10%">ขนาด</th>   
	                   <th width="10%">ราคา</th>  
	                   <th width="15%">ราคารวม</th>  
	                   <th width="5%">ลบ</th>  
	                </tr>
  		<?php
  					while($values = mysqli_Fetch_array($result)){
  		?>
		  				<input type="text" name="id_code[]" value="<?php echo $values["id_code"]; ?>" hidden>
		  				<input type="text" name="Name[]" value="<?php echo $values["Product"]; ?>" hidden>
		                <input type="text" name="Amount[]" value="<?php echo $values["Amount"]; ?>" hidden>
		                <input type="text" name="Size[]" value="<?php echo $values["Size"]; ?>" hidden>
		                <input type="text" name="Price[]" value="<?php echo $values["Price"]; ?>" hidden>
		                <input type="text" name="Image[]" value="<?php echo $values["Picture"]; ?>" hidden>
		  				<tr>
  		<?php
  						echo "<td><img src=../admin/image/product/$values[Picture] width=80></td>";
  		?>
		  				<td><?php echo $values["Product"]; ?></td>  
		                <td><?php echo $values["Amount"]; ?></td>
		                <td><?php echo $values["Size"]; ?></td>    
		                <td><?php echo number_format($values["Price"]); ?></td>  
		                <td> <?php echo number_format($values["Amount"] * $values["Price"]); ?></td>  
		                <td><a style="color: red;" href="../php/del_cart.php?size=<?php echo $values["Size"]; ?>&id_code=<?php echo $values["id_code"]; ?>" onclick="return confirm('คุณต่อการลบสินค้านี้ออกจากตะกร้าใช่ไหม')"><i class="fas fa-trash-alt"></i></a></td>
		            	</tr>
        <?php
        				$total = $total + ($values["Amount"] * $values["Price"]);
        	}
        ?>
		        		<tr><td colspan="100%" style="padding-left:50%;"><div style="font-size:20px; padding: 5px">ราคารวม <?php echo number_format($total); ?> บาท</div></td></tr>
			        </table><br>
			            <input type="text" name="Total" value="<?php echo $total; ?>" hidden>
			            <div class="form-check">
	    <?php
	    				$i=1;
	        			$sql = "SELECT * FROM address WHERE Username = '".$_SESSION['Username']."' ";
	  					$result = mysqli_query($link, $sql);
	  					$count_address = mysqli_num_rows($result);
	  					if($count_address == 0){
  		?>
	  						<a class="btn btn-primary" href="address.php"><img class="editImg" src="../img/logo/plus-solid.svg">&nbsp;เพิ่มที่อยู่</a><br><br>
	  						<div style="color:red; font-size: 25px; text-align:center;">ไม่มีที่อยู่</div><br>
  		<?php
  						}
  						else{
  		?>
  							<a class="btn btn-primary" href="address.php"><img class="editImg" src="../img/logo/plus-solid.svg">&nbsp;เพิ่มที่อยู่</a><br><br>
  		<?php
		  					$result_address = array();
							$count = 0;
	  						while ($value = mysqli_Fetch_array($result)){
	  	?>	
					            <input class="form-check-input" type="radio"  id="address" name="count_address" value="<?php echo $count; ?>">
					            <label class="form-check-label" for="address">
					              <?php 			      
			  						echo "<b>ที่อยู่ <font color=red>",$i++,"</font></b><br>";
			  						echo "ชื่อ $value[Fname] $value[Lname]<br>";
									echo "$value[House_number] ตำบล $value[Sub_district] อำเภอ $value[District] จังหวัด $value[Province] $value[Postcode]<br>";
									echo "เบอร์โทรศัพท์ $value[Phone] อื่นๆ $value[Other]";
									$result_address[] = "ชื่อ $value[Fname] "."$value[Lname] "."$value[House_number] "."ตำบล $value[Sub_district] "."อำเภอ $value[District] "."จังหวัด $value[Province] "."$value[Postcode] "."เบอร์โทรศัพท์ $value[Phone] "."อื่นๆ $value[Other]";
								  ?>
									<input type="text" name="address[]" value="<?php echo $result_address[$count]; ?>" hidden>
								  <?php
									$count++;
								  ?>
					            </label>
					            <hr>
								<br>
	  	<?php
	  						}
  						}
	    ?>
	    				</div>

			            <div class="form-check">
			            <input class="form-check-input" type="radio" name="Delivery" value="ชำระเงิน" id="flexRadioDefault1" checked>
			            <label class="form-check-label" for="flexRadioDefault1">
			              ชำระเงิน
			            </label>
			            </div>
			            <div class="form-check">
			              <input class="form-check-input" type="radio" name="Delivery" value="เก็บเงินปลายทาง" id="flexRadioDefault2">
			              <label class="form-check-label" for="flexRadioDefault2">
			                เก็บเงินปลายทาง
			              </label>
			            </div><br>

			            <div class="d-grid gap-2">
					    	<input type="submit" name="btn_confirm" class="btn btn-primary" value="สั่งซื้อสินค้า">
					    </div><br>
			</form>
			</div>
<?php
		}
	}
	else{
		header('Location:form_login.php');
	}
?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->