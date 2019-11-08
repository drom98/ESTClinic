<?php 

require_once '../../php/utils.php';
require_once '../../php/basedados.h';


function queryDB($conn) {
  $sql = "SELECT * FROM utilizador";
  $retval = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    echo "
    <tr>
    <td>".$row['idUtilizador']."</td>
    <td>".$row['nomeUtilizador']."</td>
    <td>".$row['nome']."</td>
    <td>".$row['email']."</td>
    <td>".$row['tipoUtilizador']."</td>
    <td>".mostrarIcons($row['idUtilizador'])."</td>
    </tr>";
  }
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

if(isset($_GET['userid'])) {
  $asd = queryDadosUser($conn, $_GET['userid']);
  echo $asd['userid'];
}

function mostrarIcons($userID) { 
  return '
  <button class="button is-info is-light is-small is-fullwidth" id="btnEditarUser" name="'.($userID).'">
    <span class="icon">
      <i class="fas fa-user-edit"></i>
    </span>
    <span>Editar dados</span>
  </button>
  <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarUser">
    <span class="icon">
      <i class="fas fa-trash"></i>
    </span>
    <span>Eliminar utilizador</span>
  </button>';
}
?>

<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"><?php  ?></p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <label class="label">Nome de utilizador:</label>
        <div class="control has-icons-left">
          <input name="userName" type="text" class="input" placeholder="Insira o seu nome de login..." value=<?php $asd['nomeUtilizador'] ?> required>
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
<table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th><abbr title="ID Utilizador">ID</abbr></th>
      <th><abbr title="Nome Login">Nome login</abbr></th>
      <th><abbr title="Nome">Nome</abbr></th>
      <th><abbr title="Email">Email</abbr></th>
      <th><abbr title="Tipo Utilizador">Tipo</abbr></th>
      <th><abbr title="Tipo Utilizador">Opções</abbr></th>
    </tr>
  </thead>
  <tbody>
      <?php 
      queryDB($conn);
      ?>
  </tbody>
</table>