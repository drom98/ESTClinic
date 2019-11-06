<?php 

include_once '../utils.php';
include_once($_SERVER['DOCUMENT_ROOT'].PHP.'basedados.h');

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
?>