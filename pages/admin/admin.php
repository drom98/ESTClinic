<?php 

if(!isset($_SESSION)) {
  session_start();
}

include_once '../../backend/utils.php';

//Proteger página
if(!verificarSessao() && !verificarAdmin($_SESSION['tipoUtilizador'])) {
  header('Location: ../login.php?erro=permissao');
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
  <?php include_once 'parts/modal.php'; ?>
  <?php include_once '../parts/navbar.php'; ?>
  <?php include_once '../parts/hero.php'; ?>
  <section class="section">
    <div class="columns">
      <div class="column is-one-fifth">
        <?php include_once 'parts/menu.html'; ?>
      </div>
    <div class="column">
      <div class="table-container">
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

  <script src="../../lib/timetable.js"></script>
  <script src="../../lib/marcacoes.js"></script>
  <script src="../../lib/menu.js"></script>
</body>
</html>