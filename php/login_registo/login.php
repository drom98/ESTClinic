<?php 

include '../basedados.h';

if(isset($_POST["nome"]) && isset($_POST["password"])) {
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$password = md5(mysqli_real_escape_string($conn, $_POST['password']));

	$sql = "SELECT * FROM utilizador WHERE login = '$nome' AND password = '$password' AND tipoUtilizador != 6";
	$retval = mysqli_query($conn, $sql);
	if(! $retval ){
		die('Could not get data: ' . mysqli_error($conn));
	}
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);

  if($row != NULL) {
    session_start();
    defineSessionVariables($row);
    verificarTipoUtilizador($row);
  } else {
    header("Location: ../../pages/login.php?erro=erro");
  }
}

//Funções
function defineSessionVariables($row) {
  $_SESSION["idUser"] = $row["idUtilizador"];
  $_SESSION["login"] = $row["login"];
  $_SESSION["utilizador"] = $row["nome"];
  $_SESSION["email"] = $row["email"];
  $_SESSION["password"] = $row["password"];
  $_SESSION["tipoUtilizador"] = $row["tipoUtilizador"];
}

function verificarTipoUtilizador($row) {
  if ($row['tipoUtilizador'] == 1){
    header("Location: ../../pages/admin.php");
  } else if ($row['tipoUtilizador'] == 2){
    header("Location: ../../pages/medico.php");
  } else if ($row['tipoUtilizador'] == 3){
    header("Location: ../../pages/enfermeiro.php");
  } else if ($row['tipoUtilizador'] == 4){
    header("Location: ../../pages/utente_nv.php");
  } else if ($row['tipoUtilizador'] == 5){
    header("Location: ../../pages/utente.php");
  }
}

?>