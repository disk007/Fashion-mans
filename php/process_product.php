<?php

include('connect.php'); 


  if (isset($_POST['function']) && $_POST['function'] == 'select_size') {
  	$size = $_POST['id'];
    $id_code = $_POST['code'];
    $sql = "SELECT * FROM product WHERE id_code = '$id_code'";
  	$result = mysqli_query($link, $sql);
  	$value = mysqli_Fetch_array($result);
    if($size == "S"){
      $value = $value['Amount_S'];
      for($i=1; $i<=$value ;$i++){
        echo "<option value=$i>$i</option>";
        echo "<br>";
      }
    }
    else if($size == "M"){
      $value = $value['Amount_M'];
      for($i=1; $i<=$value ;$i++){
        echo "<option value=$i>$i</option>";
        echo "<br>";
      }
    }
     else if($size == "L"){
      $value = $value['Amount_L'];
      for($i=1; $i<=$value ;$i++){
        echo "<option value=$i>$i</option>";
        echo "<br>";
      }
    }
     else if($size == "XL"){
      $value = $value['Amount_XL'];
      for($i=1; $i<=$value ;$i++){
        echo "<option value=$i>$i</option>";
        echo "<br>";
      }
    }
  }
?>