<?php 

if(!isset($_SESSION)) {
  session_start();
}

include_once '../../backend/utils.php';
include_once($_SERVER['DOCUMENT_ROOT'].BACKEND.'admin/admin_querys.php');

//Proteger página
if(isset($_SESSION['tipoUtilizador'])) {
  if(!verificarSessao() && !verificarAdmin($_SESSION['tipoUtilizador'])) {
    header('Location: '.PAGES.'login.php?erro=permissao');
  }
} else {
  header('Location: '.PAGES.'login.php?erro=permissao');
}

function verificarAdmin($tipoUtilizador) {
  if($tipoUtilizador == "1") {
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
  <title>ESTClinic - Administrador</title>
</head>
<body class="has-navbar-fixed-top">
<?php include_once '../parts/modal.php'; ?>
  <?php include_once '../parts/navbar.php'; ?>
  <div class="hero is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="title is-3">Administrador</h1>
        <h1 class="subtitle is-5">Página de gestão de utilizadores, marcações e escalas de serviço.</h1>
      </div>
    </div>
  </div>
  
  <div class="columns">
    <div class="column is-one-quarter">
      <div class="section">
        <?php include_once '../parts/menu.html'; ?>
      </div>
    </div>
    <div class="column">
      <div class="container is-fluid">
        <div class="section">
        <?php 
          if(isset($_GET['tab'])) {
            require_once 'tabSwitch.php';
            $tab = $_GET['tab'];
            tabSwitch($tab);
          }
        ?>
        </div>
      </div>
    </div>
  </div>
  <script src="../../lib/admin.js"></script>
</body>
</html>