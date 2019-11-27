<?php 

include_once '../basedados.h';
include_once '../utils.php';
include($_SERVER['DOCUMENT_ROOT'].BACKEND.'login_registo/querys.php');

if(isset($_POST["nome"]) && isset($_POST["password"])) {
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
  
  if(fetchUserByNomeUtilizador($conn, $nome)) {
    $user = fetchUserByNomeUtilizador($conn, $nome);
    $userPassword = $user["password"];
    if($password == $userPassword) {
      $row = queryUserPassword($conn, $nome, $password);
      if($row['tipoUtilizador'] != 4) {
        defineSessionVariables($row);
        logLogin();
        verificarTipoUtilizador($row['tipoUtilizador']);
      } else {
        header("Location: ../../pages/login.php?erro=aprovar");  
      }
    } else {
      //Password errada
      header("Location: ../../pages/login.php?erro=password");
    }
  } else {
    //Username não existe
    header("Location: ../../pages/login.php?erro=nome");
  }
}

//Funções
function defineSessionVariables($row) {
  session_start();
  $_SESSION["idUser"] = $row["idUtilizador"];
  $_SESSION["nomeUtilizador"] = $row["nomeUtilizador"];
  $_SESSION["nome"] = $row["nome"];
  $_SESSION["email"] = $row["email"];
  $_SESSION["password"] = $row["password"];
  $_SESSION["tipoUtilizador"] = $row["tipoUtilizador"];
  $_SESSION["dataUtilizador"] = $row["data"];
}

function logLogin() {
  $flog = fopen('../../logs.txt', 'a') or die('Não encotrou ficheiro');
  date_default_timezone_set('Europe/Lisbon');
  $data = time();
  $texto = ('Login: ' . date('d-m-Y H:i:s', $data) . ' ' . $_SESSION['nome']."\n");
  fprintf($flog, $texto);
  fclose($flog);
}

?>