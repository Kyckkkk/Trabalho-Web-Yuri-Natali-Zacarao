<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="login-bg">
	<div class="logo">
		<img src="imagens/logo.jpg" class="logo">
	</div>

  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Senha</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Entrar</button>
  	</div>
  	<p class="rodape">		
  		Não tem uma conta? <a href="register.php">Cadastrar</a>
  	</p>
  </form>
</body>
</html>