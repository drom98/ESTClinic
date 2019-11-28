<?php 

include_once '../../backend/basedados.h';
include_once '../../backend/utils.php';

?>

<div class="level has-background-light" style="padding: 15px; border-radius: 5px;">
  <div class="level-left">
    <div class="level-item">
      <p class="subtitle is-size-5"><strong></strong> utilizadores</p>
    </div>
  </div>
  <div class="level-right">
    <button class="button is-link is-small">Adicionar</button>
  </div>
</div>
<table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Nome login</abbr></th>
      <th>Nome</abbr></th>
      <th>Email</abbr></th>
      <th>Tipo</abbr></th>
      <th>Utilizador desde</abbr></th>
      <th>Opções</abbr></th>
    </tr>
  </thead>
  <tbody>
      <?php 
      switch($_GET['tab']) {
        case 'utilizadores':
          fetchTabelaUsersAtivos($conn);
        break;
        case 'usersPorAprovar':
          fetchTabelaUsersPorAprovar($conn);
        break;
        case 'usersEliminados':
          fetchTabelaUtilizadoresEliminados($conn);
        break;
      }
      ?>
  </tbody>
</table>

<?php 
//Mostrar botões de cada tabela
function mostrarBotoes($userID) {
  if(isset($_GET["tab"])) {
    $tab = $_GET["tab"];
  }
  switch($tab) {
    case 'usersPorAprovar':
      return '
      <button class="button is-success is-light is-small is-fullwidth" id="btnAprovarUser" name="'.($userID).'">
      <span class="icon">
        <i class="fas fa-user-check"></i>
      </span>
      <span>Aprovar utilizador</span>
    </button>
      <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-user-edit"></i>
        </span>
        <span>Editar dados</span>
      </button>
      <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-trash"></i>
        </span>
        <span>Eliminar utilizador</span>
      </button>';
    break;
    case 'usersEliminados':
      return '
      <button class="button is-success is-light is-small is-fullwidth" id="btnRestaurarUser" name="'.($userID).'">
      <span class="icon">
        <i class="fas fa-user-check"></i>
      </span>
      <span>Restaurar utilizador</span>
    </button>
      <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-user-edit"></i>
        </span>
        <span>Editar dados</span>
      </button>
      <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarPermaUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-trash"></i>
        </span>
        <span>Eliminar permanentemente</span>
      </button>';
    break;
    case 'utilizadores':
      return '
      <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-user-edit"></i>
        </span>
        <span>Editar dados</span>
      </button>
      <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-trash"></i>
        </span>
        <span>Eliminar utilizador</span>
      </button>';
    break;
  }
}

?>

