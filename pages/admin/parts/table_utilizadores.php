<?php 

include_once '../../backend/utils.php';
include_once($_SERVER['DOCUMENT_ROOT'].BACKEND.'basedados.h');

?>
<div class="card">
<!--<header class="card-header">
  <p class="card-header-title">Utilizadores ativos</p>
</header>-->
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
          queryUsersTable($conn);
        break;
        case 'usersPorAprovar':
          queryUsersPorAprovar($conn);
        break;
        case 'usersEliminados':
          queryUsersEliminados($conn);
        break;
      }
      ?>
  </tbody>
</table>
  </div>
    </div>
    </div>

