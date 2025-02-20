<?php

include('connect.php'); 


  if (isset($_POST['function']) && $_POST['function'] == 'select_id') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM list WHERE id_order = '$id'";
    $result = mysqli_query($link, $sql);
    $value = mysqli_Fetch_array($result);
    echo '<option value="'.$value['total'].'">'.$value['total'].'</option>';
  }
?>