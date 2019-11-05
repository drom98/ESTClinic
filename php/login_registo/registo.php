<?php 

include '../basedados.h';
include '../utils.php';
include($_SERVER['DOCUMENT_ROOT'].PHP.'login_registo/querys.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
    
    if(queryNomeUser($conn, $nome)) {
      
    } else {
      //Username não existe
      header("Location: ../../pages/registo.php?erro=nome");
    }
}

?>