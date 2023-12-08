<?php

require_once __DIR__.'/assets/db.php';

if (check_auth()) {
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

require_once __DIR__.'/assets/header.php';


?>

<body>

<div class="container">
  <div class="row py-5">
    <div class="col-lg-6">

      <h1 class="mb-5">Профиль пользователя <?php echo $user['username']?></h1>

        <?php flash() ?>

      <form method="post" enctype="multipart/form-data" action="/assets/do_profile.php">
        <div class="mb-3">
          
          <input type="text" class="form-control" id="email" name="email"  value="<?php echo $user['email']?>" required>
        </div>
		
		<div class="mb-3">
          <input id="userphoto" type="file" name="userphoto" />
        </div>
		<div id="result">
		
		</div>
		<div class="mb-3">
          <input type="text" class="form-control" id="username" name="username"  value="<?php echo $user['username']?>" required>
        </div>
		
		<div class="mb-3">
          <input type="text" class="form-control" id="userphone" name="userphone"  value="<?php echo $user['userphone']?>" placeholder="Укажите телефон">
        </div>
		<div class="mb-3">
          <input type="text" class="form-control" id="usercity" name="usercity"  value="<?php echo $user['usercity']?>" placeholder="Укажите город">
        </div>
		<div class="mb-3">
          <input type="number" class="form-control" id="userage" name="userage"  value="<?php echo $user['userage']?>" placeholder="Укажите Ваш возраст">
        </div>
		
		<div class="mb-3">
		<p>Если вы хотите сменить пароль, заполните два последующих поля</p>
		</div>
        <div class="mb-3">
          
          <input type="text" class="form-control" id="newpassword" name="newpassword" value=""  placeholder="Новый пароль">
        </div>
		<div class="mb-3">
          
          <input type="text" class="form-control" id="newpassword2" name="newpassword2" value=""  placeholder="Новый пароль (еще раз)">
        </div>
        <div class="d-flex justify-content-between">
         
          
		   <button type="submit" class="btn btn-primary">Изменить данные</button>
        </div>
		<div class="mb-3">
          
          <input type="hidden" class="form-control" id="userid" name="userid"  value="<?php echo $user['id']?>">
        </div>
      </form>

    </div>
  </div>
</div>

<script>
 
	
	
$('#userphoto').change(function() {
	
	var file_data = $('#userphoto').prop('files')[0];   
    var form_data = new FormData();   
    var userid = $('#userid').val();
	
    form_data.append('file', file_data);
    form_data.append('userid', userid);
      
    $.ajax({
        url: '/assets/upload_ajax.php', // 
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(data){
            $('#result').html('<img src="/uploads/' + data +'" width="100">');
			console.log(data);
        }
     });
	
});
</script>

</body>
</html>