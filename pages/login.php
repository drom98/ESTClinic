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
                        <div class="field">
                          <label class="label">Nome:</label>
                          <div class="control has-icons-left">
                            <input type="text" class="input is-info" placeholder="Insira o seu nome...">
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <p class="help is-danger is-hidden">#</p>
                        </div>
                        <div class="field">
                            <label class="label">Password:</label>
                              <div class="control has-icons-left">
                                <input type="password" class="input is-info" placeholder="Insira a sua password...">
                                <span class="icon is-small is-left">
                                  <i class="fas fa-lock"></i>
                                </span>
                              </div>
                              <p class="help is-danger is-hidden">#</p>
                        </div>

                        <div class="field is-grouped">
                          <div class="control">
                            <button class="button is-info">Entrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>