<?php 

session_start();

include '../basedados.h';

if(isset($_POST["nome"]) && isset($_POST["password"])) {
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$password = md5(mysqli_real_escape_string($conn, $_POST['password']));

	
}

?>