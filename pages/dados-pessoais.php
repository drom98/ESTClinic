<?php 

require_once '../backend/utils.php';

if(isset($_GET["erro"])) {
  echo "<script type='text/javascript' src='".JS."login.js'></script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/main.css">
  <title>ESTClinic - Dados Pessoais</title>
</head>
<body class="has-navbar-fixed-top">
  <?php 
  require_once 'parts/navbar.php';
  ?>
    <section class="hero is-light is-fullheight-with-navbar">
        <div class="hero-body" id="login-container">
          <div class="container">
          <div class="columns is-centered">
                <div class="column is-half">
                    <div class="card">
                      <div class="card-content">
                        <h1 class="title has-text-link is-4 has-text-centered">Iniciar sessão</h1>
                        <h2 class="subtitle is-6 has-text-centered">Entre com a sua conta.</h2>
                        <?php 
                        require_once 'parts/message-permissao.html';
                        require_once 'parts/message-aprovar.html';
                        require_once 'parts/message-logout.html';
                        ?>
                        <?php 
                        if(!verificarSessao()) {
                          require_once 'parts/message_com_sessao.html';
                        } else {
                          require_once 'parts/login_form.html';
                        }
                        ?>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </section>
</body>
</html>