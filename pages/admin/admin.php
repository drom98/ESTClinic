<?php 

if(!isset($_SESSION)) {
  session_start();
}

include_once '../../backend/utils.php';
include_once($_SERVER['DOCUMENT_ROOT'].BACKEND.'admin/table_querys.php');

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
  <div class="hero is-dark">
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
        <div class="notification is-hidden is-success">
            <button class="delete"></button>
            Primar lorem ipsum dolor sit amet, consectetur
            adipiscing elit lorem ipsum dolor. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Sit amet,
            consectetur adipiscing elit
          </div>
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