<?php 

include '../basedados.h';
include '../utils.php';
include($_SERVER['DOCUMENT_ROOT'].PHP.'login_registo/querys.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
    
    if(!queryNomeUser($conn, $nome)) {
      if (registarUser($userName, $nome, $email, $password, '4', $conn)){
        header("Location: ../../pages/registoConcluido.php");
       } else {
        // popup erro ao resgistar
        echo "Erro: " . mysqli_error($conn);
      }
    } else {
      //Username já existe
      header("Location: ../../pages/registo.php?erro=userName");
    }
}

function registarUser($nomeUser, $nome, $email, $password, $tipoUtilizador, $conn) {
  $sql_query = "INSERT INTO utilizador (nomeUtilizador, nome, email, password, tipoUtilizador) VALUES ('$nomeUser', '$nome', '$email', '$password', '$tipoUtilizador')";
  $result = mysqli_query($conn, $sql_query);
  return $result;
}

?>