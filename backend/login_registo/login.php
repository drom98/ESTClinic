<?php 

include_once '../basedados.h';
include_once '../utils.php';

if(isset($_POST["nome"]) && isset($_POST["password"])) {
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
  
  if(fetchUserByNomeUtilizador($conn, $nome)) {
    $user = fetchUserByNomeUtilizador($conn, $nome);
    $userPassword = $user["password"];
    if($password == $userPassword) {
      if($user["tipoUtilizador"] != 4) {
        if($user['tipoUtilizador'] == 6) {
          headerTipoUtilizador($user["tipoUtilizador"]);  
        } else {
          defineSessionVariables($user);
          logLogin();
          headerTipoUtilizador($user["tipoUtilizador"]);
        }
      } else {
        headerTipoUtilizador($user["tipoUtilizador"]);  
      }
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