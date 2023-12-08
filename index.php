<?php
require_once __DIR__.'/assets/db.php';

$user = null;

if (check_auth()) {
    
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

require_once __DIR__.'/assets/header.php';



?>

<body>

<div class="container">
  <div class="row py-5 mx-auto ">
    <div class="col-lg-6">

        <?php if ($user) { ?>

          <h1>Привет, <?=htmlspecialchars($user['username'])?>!</h1>
		   <a class="btn btn-outline-primary" href="profile.php">Профиль</a>
          <form class="mt-5" method="post" action="/assets/do_logout.php">
            <button type="submit" class="btn btn-primary">Выйти</button>
          </form>

        <?php } else { ?>

          <h1 class="mb-5">Регистрация пользователя</h1>

            <?php flash(); ?>

          <form method="post" action="/assets/do_register.php">
            <div class="mb-3">
              <input type="text" class="form-control" id="email" name="email" placeholder="Введите Ваш email" required>
            </div>
			 <div class="mb-3">
              <input type="text" class="form-control" id="username" name="username"  placeholder="Введите Ваше имя" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password"  placeholder="Введите пароль" required>
            </div>
			
            <div class="d-flex justify-content-between">
              <a class="btn btn-outline-primary" href="/assets/login.php">Авторизация</a>
			  <button type="submit" class="btn btn-primary">Регистрация</button>
            </div>
          </form>

        <?php } ?>

    </div>
  </div>
</div>

</body>
</html>