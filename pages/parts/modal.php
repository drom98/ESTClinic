<?php 

//require_once '../../php/basedados.h';

if(isset($_GET['userid'])) {
  queryDadosUser($conn, $_GET('userid'));
}


function queryDadosUser($conn, $userid) {
  $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$userid'";
  $retval = mysqli_query($conn, $sql);
  $dataRow = mysqli_fetch_array($retval, MYSQLI_ASSOC);

  if($dataRow == NULL) {
    return false;
  } else {
    return $dataRow;
  }
}

?>

<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"><?php $dataRow["nome"] ?></p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <label class="label">Nome de utilizador:</label>
        <div class="control has-icons-left">
          <input name="userName" type="text" class="input" placeholder="Insira o seu nome de login..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
        <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>

      <div class="field">
        <label class="label">Nome:</label>
        <div class="control has-icons-left">
          <input name="nome" type="text" class="input" placeholder="Insira o seu nome..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>

      <div class="field">
        <label class="label">Email:</label>
        <div class="control has-icons-left">
          <input name="email" type="email" class="input" placeholder="Insira o seu email..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>

      <div class="field">
        <label class="label">Tipo de utilizador:</label>
        <div class="control">
          <select name="tipoUSER">
            <option value="1">Volvo</option>
            <option value="2">Saab</option>
            <option value="3">Fiat</option>
            <option value="audi">Audi</option>
          </select> 
        </div>
      </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success">Guardar alterações</button>
      <button class="button" id="btnCancel">Cancel</button>
    </footer>
  </div>
</div>