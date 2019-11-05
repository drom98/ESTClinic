<?php 

include '../basedados.h';

if(isset($_POST["nome"]) && isset($_POST["password"])) {
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
  
  if(queryNomeUser($conn, $nome)) {
    if(queryUserPassword($conn, $nome, $password)) {
      $row = queryUserPassword($conn, $nome, $password);
      defineSessionVariables($row);
      verificarTipoUtilizador($row);
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
function queryNomeUser($conn, $nome) {
  $sql = "SELECT nomeUtilizador FROM utilizador WHERE nomeUtilizador = '$nome'";
  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
  if($row == NULL) {
    return false;
  } else {
    return $row;
  }
}

function queryUserPassword($conn, $nome, $password) {
  $sql = "SELECT * FROM utilizador WHERE nomeUtilizador = '$nome' AND password = '$password'";
  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
  if($row == NULL) {
    return false;
  } else {
    return $row;
  }
}

function defineSessionVariables($row) {
  session_start();
  $_SESSION["idUser"] = $row["idUtilizador"];
  $_SESSION["nomeUtilizador"] = $row["nomeUtilizador"];
  $_SESSION["nome"] = $row["nome"];
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