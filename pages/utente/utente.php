<?php 

if(!isset($_SESSION)) {
  session_start();
}

include_once '../../backend/utils.php';
include_once '../../backend/admin/utilizadores/table_querys.php';

//Proteger página
if(isset($_SESSION['tipoUtilizador'])) {
  if(!verificarSessao() && !verificarUtente($_SESSION['tipoUtilizador'])) {
    header('Location: ../login.php?erro=permissao');
  }
} else {
  header('Location: ../login.php?erro=permissao');
}

function verificarUtente($tipoUtilizador) {
  if($tipoUtilizador == "5") {
    return true;
  } else {
    return false;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href=<?php echo(CSS.'main.css') ?>>
  <title>ESTClinic - Utente</title>
</head>
<body>
  <?php require_once '../parts/navbar.php'; ?>
</body>
</html>