<?php
    session_start();
	$link = mysqli_connect("localhost", "root");
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"Use project;");   // เรียกใช้ฐานข้อมูล
?>