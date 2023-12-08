<?php

require_once __DIR__.'/db.php';

$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `email` = :email");
$stmt->execute(['email' => $_POST['email']]);
if ($stmt->rowCount() > 0) {
    flash('Это имя пользователя уже занято.');
    header('Location: /');
    die;
}

$stmt = pdo()->prepare("INSERT INTO `users` (`email`,`username`, `password`) VALUES (:email,:username, :password)");
$stmt->execute([
    'email' => $_POST['email'],
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
]);


$to  = "<".$_POST['email'].">" ; 


$subject = "Регистрация на сайте"; 

$message = ' <p>Ваш логин: '.$_POST['email'].'</p>';
$message .= ' <p>Ваш пароль: '.$_POST['password'].'</p>';

$headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
$headers .= "From: От кого письмо <from@example.com>\r\n"; 
$headers .= "Reply-To: reply-to@example.com\r\n"; 

mail($to, $subject, $message, $headers); 


header('Location: login.php');