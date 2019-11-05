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

?>