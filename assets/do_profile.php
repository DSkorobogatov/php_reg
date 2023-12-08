<?php

require_once __DIR__.'/db.php';

if(isset($_POST['userid']))
{
	
	if (($_POST['newpassword']!="" && $_POST['newpassword2']!="") && ($_POST['newpassword']===$_POST['newpassword2']))
	{
		$stmt = pdo()->prepare("UPDATE `users` SET `password` = :newpassword,`email` = :email,`username` = :username WHERE `users`.`id` = :userid");
		$stmt->execute([
			'newpassword' => password_hash($_POST['newpassword'], PASSWORD_DEFAULT),
			'email' => $_POST['email'],
			'username' => $_POST['username'],
			'userid' => $_POST['userid']
		]);
		flash('<b>Данные изменены, пароль изменен</b>.','success');
		header('Location: /profile.php');
		
	}
	else 
	{
		$stmt = pdo()->prepare("UPDATE `users` SET `email` = :email,`username` = :username WHERE `users`.`id` = :userid");
		$stmt->execute([
			'email' => $_POST['email'],
			'username' => $_POST['username'],
			'userid' => $_POST['userid']
		]);
		flash('<b>Данные изменены</b>.','success');
		header('Location: /profile.php');
	}
}