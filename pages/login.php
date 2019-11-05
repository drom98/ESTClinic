<?php 
if(isset($_GET["erro"])) {
  require_once '../php/utils.php';
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
  <title>ESTClinic - Iniciar sessão</title>
</head>
<body class="has-navbar-fixed-top">
  <?php 
  require_once '../php/parts/navbar.html';
  ?>
    <section class="section">
        <div class="container" id="login-container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <div class="card">
                      <div class="card-content">
                        <h1 class="title has-text-info is-4 has-text-centered">Iniciar sessão</h1>
                        <h2 class="subtitle is-6 has-text-centered">Entre com a sua conta.</h2>
                        <form action="../php/login_registo/login.php" method="POST">
                        <div class="field">
                          <label class="label">Nome:</label>
                          <div class="control has-icons-left">
                            <input name="nome" type="text" class="input" placeholder="Insira o seu nome..." required>
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <p id="nome" class="help is-danger is-hidden">O nome que introduziu não existe.</p>
                        </div>
                        <div class="field">
                            <label class="label">Password:</label>
                              <div class="control has-icons-left">
                                <input name="password" type="password" class="input" placeholder="Insira a sua password..." required>
                                <span class="icon is-small is-left">
                                  <i class="fas fa-lock"></i>
                                </span>
                              </div>
                              <p id="password" class="help is-danger is-hidden">Password errada.</p>
                        </div>

                        <div class="field is-grouped">
                          <div class="control">
                            <input type="submit" class="button is-info" value="Entrar">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>