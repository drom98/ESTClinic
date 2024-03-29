<?php require_once '../backend/utils.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../dist/css/main.css">
  <title>ESTClinic - Registar</title>
</head>
<body class="has-navbar-fixed-top">
  <?php 
  require_once 'includes/navbar.php';
  ?>
    <section class="hero is-light is-fullheight-with-navbar">
        <div class="hero-body" id="login-container">
          <div class="container">
          <div class="columns is-centered">
                <div class="column is-half">
                  <div class="card">
                    <div class="card-content">
                      <h1 class="title has-text-link is-4 has-text-centered">Registe-se</h1>
                      <h2 class="subtitle is-6 has-text-centered">Registe a sua conta.</h2>
                      <form action="../backend/login_registo/registo.php" method="POST">
                        <div class="field">
                          <label class="label">Nome de utilizador:</label>
                          <div class="control has-icons-left">
                            <input name="userName" type="text" class="input" placeholder="Insira o seu nome de login..." required>
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
                        </div>

                        <div class="field">
                          <label class="label">Nome:</label>
                          <div class="control has-icons-left">
                            <input name="nome" type="text" class="input" placeholder="Insira o seu nome..." required>
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                        </div>

                        <div class="field">
                          <label class="label">Email:</label>
                          <div class="control has-icons-left">
                            <input name="email" type="email" class="input" placeholder="Insira o seu email..." required>
                            <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                            </span>
                          </div>
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

                        <div class="field">
                          <div class="control">
                            <input type="submit" class="button is-link is-fullwidth" value="Registar">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </section>

    <script src="../dist/js/main.js"></script>
</body>
</html>