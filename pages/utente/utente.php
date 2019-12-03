<?php 

if(!isset($_SESSION)) {
  session_start();
}

include_once '../../backend/utils.php';

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
  <link rel="stylesheet" href="../../dist/css/main.css">
  <title>ESTClinic - Utente</title>
</head>
<body class="has-navbar-fixed-top">
  <?php require_once '../includes/navbar.php'; ?>
  <?php require_once '../includes/hero.php'; ?>
  <section class="section">
  <div class="columns">
    <div class="column is-one-fifth">
        <?php include_once '../components/menu-lateral/menu.php'; ?>
    </div>
    <div class="column">
      <div class="container is-fluid">
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
  </section>

  <script src="../../dist/js/main.js"></script>
</body>
</html>