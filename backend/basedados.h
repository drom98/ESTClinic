<?php
	if(!defined('USER_BD'))	define("USER_BD", "root");
	if(!defined('PASS_BD')) define("PASS_BD", "");
	if(!defined('NOME_BD')) define("NOME_BD", "ESTClinic");
  if(!defined('HOST')) define("HOST", "localhost");
	//$hostname_conn = "localhost";
	$conn = mysqli_connect(HOST, USER_BD, PASS_BD);
	
	if(!$conn) {
		die("Erro ao ligar a BD");
	}
	// Selecionamos nossa base de dados MySQL
	mysqli_select_db($conn, NOME_BD);
?>
