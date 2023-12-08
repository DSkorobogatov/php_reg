<?php

require_once __DIR__.'/db.php';

if (check_auth()) {
    header('Location: /');
    die;
}

require_once __DIR__.'/header.php';
?>

<body>

<div class="container">
  <div class="row py-5">
    <div class="col-lg-6">

      <h1 class="mb-5">Авторизация на сайте</h1>

        <?php flash() ?>

      <form method="post" action="/assets/do_login.php">
        <div class="mb-3">
          
          <input type="text" class="form-control" id="email" name="email"  placeholder="Введите Ваш email" required>
        </div>
        <div class="mb-3">
          
          <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль"  required>
        </div>
        <div class="d-flex justify-content-between">
         
          <a class="btn btn-outline-primary" href="/index.php">Зарегистрироваться</a>
		   <button type="submit" class="btn btn-primary">Войти</button>
        </div>
      </form>

    </div>
  </div>
</div>

</body>
</html>