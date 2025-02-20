<?php

include('connect.php'); 


  if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
  	$id = $_POST['id'];
  	$sql = "SELECT * FROM amphures WHERE province_id='$id'";
  	$result = mysqli_query($link, $sql);
  	echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
  	foreach ($result as $value) {
  		echo '<option value="'.$value['id'].'">'.$value['name_th'].'</option>';
  		
  	}
  }


if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM districts WHERE amphure_id='$id'";
    $result = mysqli_query($link, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($result as $value2) {
      echo '<option value="'.$value2['id'].'">'.$value2['name_th'].'</option>';
      
    }
  }

  if (isset($_POST['function']) && $_POST['function'] == 'districts') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM districts WHERE id='$id'";
    $query = mysqli_query($link, $sql);
    $result = mysqli_Fetch_array($query);
    echo $result['zip_code'];
    exit();
  }
?>