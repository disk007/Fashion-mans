<?php

include('connect.php'); 


  if (isset($_POST['function']) && $_POST['function'] == 'Status') {
    $id = $_POST['id'];
    $status = $_POST['Status'];
    $sql = "SELECT * FROM list WHERE id_order = '$id'";
    $result = mysqli_query($link, $sql);
    $value = mysqli_Fetch_array($result);
    $count_id = mysqli_num_rows($result);
    if($status == 'ชำระแล้ว'){
      for($i=0; $i<$count_id; $i++){
        $sql="UPDATE list SET Status ='ยังไม่ชำระ' WHERE id_order = '$id' ";
        $re=mysqli_query($link,$sql);
      }
      $sql="UPDATE pay SET Status ='ยังไม่ชำระ' WHERE id_order = '$id' ";
      $result=mysqli_query($link,$sql);
    }
    else{
      for($i=0; $i<$count_id; $i++){
        $sql="UPDATE list SET Status ='ชำระแล้ว' WHERE id_order = '$id' ";
        $re=mysqli_query($link,$sql);
      }
      $sql="UPDATE pay SET Status ='ชำระแล้ว' WHERE id_order = '$id' ";
      $result=mysqli_query($link,$sql);
    }
  }
?>