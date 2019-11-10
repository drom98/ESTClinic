<?php 

require_once '../basedados.h';

if(isset($_GET["userid"])) {
  $userid = $_GET["userid"];
  $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$userid'";
  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
  echo(json_encode($row)); 
} 

/*
elseif(isset($_POST)) {
  var_dump($_POST);
  $dados = json_decode($_POST[], true);
  var_dump($dados);
  $userid = $dados["idUtilizador"];
  $nomeUtilizador = $_POST["nomeUtilizador"];
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $sql = "UPDATE utilizador SET nomeUtilizador = '$nomeUtilizador', nome = '$nome', email = '$email' WHERE idUtilizador = '$userid'";
  if(mysqli_query($conn, $sql)) {
    echo "Deu";
  } else {
    echo "Não deu";
    }
}
*/

?>