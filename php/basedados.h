<?php
	define("USER_BD", "root");
	define("PASS_BD", "");
	define("NOME_BD", "ESTClinic");
	$hostname_conn = "localhost";
	$conn = mysqli_connect($hostname_conn, USER_BD, PASS_BD);
	
	if(!$conn) {
		die("Erro ao ligar a BD");
	}
	// Selecionamos nossa base de dados MySQL
	mysqli_select_db($conn, NOME_BD);

?>
