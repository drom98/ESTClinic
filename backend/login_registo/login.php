<?php 

include_once '../basedados.h';
include_once '../utils.php';

if(isset($_POST["nome"]) && isset($_POST["password"])) {
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
  
  if(fetchUserByNomeUtilizador($conn, $nome)) {
    $user = fetchUserByNomeUtilizador($conn, $nome);
    $userPassword = $user["password"];
    if($password == $userPassword) {
      if($user["tipoUtilizador"] != 4) {
        defineSessionVariables($user);
        logLogin();
        verificarTipoUtilizador($user["tipoUtilizador"]);
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
function defineSessionVariables($user) {
  session_start();
  $_SESSION["idUser"] = $user["idUtilizador"];
  $_SESSION["nomeUtilizador"] = $user["nomeUtilizador"];
  $_SESSION["nome"] = $user["nome"];
  $_SESSION["email"] = $user["email"];
  $_SESSION["password"] = $user["password"];
  $_SESSION["tipoUtilizador"] = $user["tipoUtilizador"];
  $_SESSION["dataUtilizador"] = $user["data"];
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