<?php 

if(!defined('JS')) define("JS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/lib/');
if(!defined('BACKEND')) define("BACKEND", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/backend/');
if(!defined('ADMIN_USERS')) define("ADMIN_USERS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/backend/admin/utilizadores/');
if(!defined('PAGES')) define("PAGES", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/pages/');
if(!defined('CSS'))define("CSS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/css/');
if(!defined('ASSETS')) define("ASSETS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/assets/');


//Verificar sessão
function verificarSessao() {
  if(!isset($_SESSION["idUser"])) {
    return true;
  } else {
    return false;
  }
}

//Verificar tipo de utilizador
function verificarTipoUtilizador($tipoUtilizador) {
  if ($tipoUtilizador == 1){
    header("Location: ../../pages/admin/admin.php");
  } else if ($tipoUtilizador == 2){
    header("Location: ../../pages/medico.php");
  } else if ($tipoUtilizador == 3){
    header("Location: ../../pages/enfermeiro.php");
  } else if ($tipoUtilizador == 4){
    header("Location: ../../pages/login.php?erro=aprovar");
  } else if ($tipoUtilizador == 5){
    header("Location: ../../pages/utente/utente.php");
  }
}

//Registar login e logout no ficheiro logs.txt
function logLogin() {
  $flog = fopen('../../logs.txt', 'a') or die('Não encotrou ficheiro');
  date_default_timezone_set('Europe/Lisbon');
  $data = time();
  $texto = ('Login: ' . date('d-m-Y H:i:s', $data) . ' ' . $_SESSION['nome']."\n");
  fprintf($flog, $texto);
  fclose($flog);
}

//Definir as variáveis de sessão
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

//Fetch dos dados do utilizador
function fetchUserById($conn, $id) {
  $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$id'";
  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
  if($row == NULL) {
    return false;
  } else {
    return $row;
  }
}

function fetchUserByNomeUtilizador($conn, $nomeUtilizador) {
  $sql = "SELECT * FROM utilizador WHERE nomeUtilizador = '$nomeUtilizador'";
  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
  if($row == NULL) {
    return false;
  } else {
    return $row;
  }
}

//Registar utilizadores
function registarUser($nomeUser, $nome, $email, $password, $tipoUtilizador, $conn) {
  $sql_query = "INSERT INTO utilizador (nomeUtilizador, nome, email, password, Data, tipoUtilizador) VALUES ('$nomeUser', '$nome', '$email', '$password', now(), '$tipoUtilizador')";
  $result = mysqli_query($conn, $sql_query);
  return $result;
}

?>