<?php
foreach ($_FILES['upload']['tmp_name'] as $key => $value) {
	$file_names = $_FILES['upload']['name'];
	$new_name = $file_names[$key];
	if(move_uploaded_file($_FILES['upload']['tmp_name'][$key],"php/".$new_name)){
		
	}
	echo '<pre>';
	print_r($new_name);
	echo '</pre>';
}
?>