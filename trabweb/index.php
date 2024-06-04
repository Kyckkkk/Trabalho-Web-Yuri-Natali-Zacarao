<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styler.css">
    <title>Relógio Digital</title>
    
</head>

<body>
    <div class="relogio">
        <div>
            <span id="horas">00</span>
            <span class="tempo">Horas</span>
        </div>

        <div>
            <span id="minutos">00</span>
            <span class="tempo">Minutos</span>
        </div>

        <div>
            <span id="segundos">00</span>
            <span class="tempo">Segundos</span>
        </div>
    </div>

    <script src="script.js"></script>
    
</body>

</html>
	
<div class="content">
  	<!-- Mensagem de erro -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- Informações/Logout -->
    <?php  if (isset($_SESSION['username'])) :  ?>
    	<p> <a class="log1">Bem vindo <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" class="log">Sair</a> </p>
    <?php endif ?>
</div>

</body>
</html>