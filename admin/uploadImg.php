<?php
	$end = strrpos($_FILES['f']['name'],'.');
	$name = substr($_FILES['f']['name'],$end);
	$newName = time().rand(100000,999999).$name;
	if(move_uploaded_file($_FILES['f']['tmp_name'],'./upload/'. $newName)){
		echo '/admin/upload/'.$newName;
	}else{
		echo 2;
	}
?>