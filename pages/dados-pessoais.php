<?php 

if(isset($_GET["erro"])) {
  echo "<script type='text/javascript' src='".JS."login.js'></script>";
}

?>

<section class="section">
      <div class="columns">
        <div class="column is-half">
          <div class="card">
            <div class="card-content">
              <div class="content has-text-centered">
                <span class="icon" style="margin-bottom: 20px;"><i class="fas fa-user-circle fa-3x"></i></span>
                <p class="has-text-weight-bold is-size-4 is-marginless"><?php echo($_SESSION["nome"]) ?></p>
                <small>Utilizador desde: <?php echo(date( 'd/M/Y', strtotime($_SESSION['dataUtilizador']))) ?> </small>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <header class="card-header">
              <div class="card-header-title">
                Editar detalhes
              </div>
            </header>
            <div class="card-content">
              <div class="content">
                <form action="">
                  <div class="field">
                    <label class="label">Nome de utilizador:</label>
                    <div class="control has-icons-left">
                      <input name="userName" type="text" class="input" value=<?php echo($_SESSION["nomeUtilizador"]) ?> placeholder="Insira o seu nome de login..." required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                    <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
                  </div>

                  <div class="field">
                    <label class="label">Nome:</label>
                    <div class="control has-icons-left">
                      <input name="userName" type="text" class="input" value=<?php echo($_SESSION["nome"]) ?> placeholder="Insira o seu nome..." required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                    <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
                  </div>

                  <div class="field">
                    <label class="label">Email:</label>
                    <div class="control has-icons-left">
                      <input name="userName" type="email" class="input" value=<?php echo($_SESSION["email"]) ?> placeholder="Insira o seu email..." required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                      </span>
                    </div>
                    <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
                  </div>

                  <div class="field">
                    <label class="label">Password:</label>
                    <div class="control has-icons-left">
                      <input name="userName" type="password" class="input" placeholder="Insira a sua nova password..." required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                      </span>
                    </div>
                    <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
                  </div>
                  <input id="btn-dados-pessoais" type="submit" class="button is-link is-fullwidth" value="Guardar alterações">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>