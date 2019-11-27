<?php 

include_once 'basedados.h';
include_once 'utils.php';

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

function fetchUserByNomeUtilizador($nomeUtilizador) {
  $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$id'";
  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
  if($row == NULL) {
    return false;
  } else {
    return $row;
  }
}

?>