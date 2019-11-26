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
<body class="has-navbar-fixed-top">
  <?php require_once '../parts/navbar.php'; ?>
  <?php require_once '../parts/hero.php'; ?>
  <div class="columns">
    <div class="column is-one-quarter">
      <div class="section">
        <?php include_once 'menu.html'; ?>
      </div>
    </div>
    <div class="column">
      <div class="container is-fluid">
        <div class="section">
        <?php 
          if(isset($_GET['tab'])) {
            require_once '../tabSwitch.php';
            $tab = $_GET['tab'];
            tabSwitch($tab);
          }
        ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>