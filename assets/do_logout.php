<?php

require_once __DIR__.'/db.php';


session_start();
unset($_SESSION['user_id']); 
session_destroy();

header('Location: /');