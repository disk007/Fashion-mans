<?php
include("../php/connect.php");
$sql = "INSERT INTO list(Username) 
    	VALUES('Username1');";
		$result = mysqli_query($link,$sql);
			if($result){
				echo "เรียบร้อย";
			}
			else{
				echo "ไม่เรียบร้อย";  
			}
?>