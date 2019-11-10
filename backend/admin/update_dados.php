<?php 

require_once '../basedados.h';

if(isset($_POST)) {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);
  
  $idUtilizador = $data["idUtilizador"];
  $nomeLogin = $data["nomeUtilizador"];
  $nome = $data["nome"];
  $email = $data["email"];
  $sql = "UPDATE utilizador SET nomeUtilizador = '$nomeLogin', nome = '$nome', email = '$email' WHERE idUtilizador = '$idUtilizador'";
  if(mysqli_query($conn, $sql)) {
    echo "Deu";
  } else {
    echo "Não deu";
    }
}

?>