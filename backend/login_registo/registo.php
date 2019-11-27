<?php 

include '../basedados.h';
include '../utils.php';
include($_SERVER['DOCUMENT_ROOT'].BACKEND.'login_registo/querys.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
    
    if(!fetchUserByNomeUtilizador($conn, $nome)) {
      if (registarUser($userName, $nome, $email, $password, '4', $conn)){
        header("Location: ../../pages/login.php?erro=aprovar");
       } else {
        // popup erro ao resgistar
        echo "Erro: " . mysqli_error($conn);
      }
    } else {
      //Username já existe
      header("Location: ../../pages/registo.php?erro=userName");
    }
}

?>