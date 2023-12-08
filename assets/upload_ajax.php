<?php 
require_once __DIR__.'/db.php'; 

if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
	
		
		
		$ext = end(explode(".", $_FILES['file']['name']));
		
		  $filename=md5($_POST['userid']).".".$ext ;
	
		
		
        move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$filename);
		
		$stmt = pdo()->prepare("UPDATE `users` SET `userphoto` = :userphoto WHERE `users`.`id` = :userid");
	$stmt->execute([
		'userphoto' => $filename,
		
		'userid' => $_POST['userid']
	]);
	flash('<b>Файл загружен</b>.','success');
	
		echo $filename;
    }