<?php 

require_once '../basedados.h';

if(isset($_POST)) {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);
  
  $idUtilizador = $data["idUtilizador"];
  $nomeLogin = $data["nomeUtilizador"];
  $nome = $data["nome"];
  $email = $data["email"];
  $tipoUser = $data["tipoUser"];
  $sql = "UPDATE utilizador SET nomeUtilizador = '$nomeLogin', nome = '$nome', email = '$email', tipoUtilizador = '$tipoUser' WHERE idUtilizador = '$idUtilizador'";
  if(mysqli_query($conn, $sql)) {
    echo(1);
  } else {
    echo(-1);
  }
}

?>