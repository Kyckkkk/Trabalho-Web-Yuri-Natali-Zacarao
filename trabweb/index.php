<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Voce deve se logar primeiro.";
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
    <meta name="viewport" content="width=device-width,">
    <link rel="stylesheet" href="styler.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <title>Loja Zacarao</title>
    
</head>

<body>
    <h1><img src="imagens/logo.jpg" class="logo"></h1>
    <div class="relogio">
    <button id="cart-button" class="cart-button" onclick="viewCart()">Carrinho</button>
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

	<!-- Mensagem de erro -->

<div class="content">
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
    
    <!-- Catalogo -->

</div>
<div class="container" id="products">
    <a class="slick-prev" href="#">&#9664;</a>
    <div class="product-card">
        <img src="imagens/bulova1.jpg">
        <div class="product-name">Relógio Bulova Marine Star Precisionist 96B426</div>
        <div class="product-price">R$5490,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/bulova2.jpg">
        <div class="product-name">Relógio Bulova Marine Star
            Precisionist 96B421</div>
        <div class="product-price">R$5490,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/casio1.jpg">
        <div class="product-name">Relógio Casio G-Shock G-Squad
            DW-H5600-1A2DR</div>
        <div class="product-price">R$2599,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
        <img src="imagens/casio2.jpg">
        <div class="product-name">Relógio Casio G-Shock G-Squad
            DW-H5600-1A7DR</div>
        <div class="product-price">R$2599,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/gshock.jpg">
        <div class="product-name">Relógio G-Shock Hidden Glow
        GA-2100HD-8ADR</div>
        <div class="product-price">R$953,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/seiko1.jpg">
        <div class="product-name">Relógio Seiko Prospex
                        SpeedTimer Cronógrafo Solar
                            SSC941</div>
        <div class="product-price">R$4999,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/seiko2.jpg">
        <div class="product-name">Relógio Seiko Prospex
                        SpeedTimer Cronógrafo Solar
                            SSC939</div>
        <div class="product-price">R$4999,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/orient.jpg">
        <div class="product-name">Relógio Orient Solartech Diver
        MBSS1471 D1SX</div>
        <div class="product-price">R$998,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/venez1.jpg">
        <div class="product-name">Relogio Venezianico Redentore
        40 - 1221507C</div>
        <div class="product-price">R$3599,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/venez2.jpg">
        <div class="product-name">Relógio Venezianico Redentore
        40 - 1221507C</div>
        <div class="product-price">R$3599,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/venez3.jpg">
        <div class="product-name">Relógio Venezianico Redentore
        40 - 1221503C</div>
        <div class="product-price">R$998,00</div>
        <button class="add-to-cart"></button>
    </div>
    <div class="product-card">
    <img src="imagens/venez4.jpg">
        <div class="product-name">Relógio Venezianico Redentore
        40 - 1221501C</div>
        <div class="product-price">R$3599,00</div>
        <button class="add-to-cart"></button>
    </div>
    <a class="slick-next" href="#">&#9654;</a>

</div>


 <!-- Modal -->

<div id="cart-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Carrinho</h2>
    <div id="cart-items">

    </div>
    <p id="total">Total: R$0</p>
  </div>
</div>

</body>
</html>