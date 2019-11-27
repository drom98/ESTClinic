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

?>