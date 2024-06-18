<?php
session_start();

// Inicio
$username = "";
$email    = "";
$errors = array(); 

// Conexão com bd
$db = mysqli_connect('localhost', 'root', '', 'cadastro');

// Registro
if (isset($_POST['reg_user'])) {
  // Recebe dados do form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Valida dados
  // Retorna mensagens de erro
  if (empty($username)) { array_push($errors, "Por favor digite seu usuario"); }
  if (empty($email)) { array_push($errors, "Por favor digite seu email"); }
  if (empty($password_1)) { array_push($errors, "Por favor digite sua senha"); }
  if ($password_1 != $password_2) {
	array_push($errors, "As senhas devem ser iguais");
  }

  // Confere se não há duplicidade de dados
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // Se usuário ja existe
    if ($user['username'] === $username) {
      array_push($errors, "Usuario já cadastrado");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email já cadastrado");
    }
  }

  // Se não ouver erros, registra o usuario
  if (count($errors) == 0) {
  	$password = md5($password_1);//Encripta a senha antes de salvar

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = 	header('location: index.php');
  }
}

// Login
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Por favor digite seu usuario");
  }
  if (empty($password)) {
  	array_push($errors, "Por favor digite sua senha");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] =  header('location: index.php');
  	}else {
  		array_push($errors, "Usuario ou senha incorretos");
  	}
  }
}

?>