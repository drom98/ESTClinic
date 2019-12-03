<?php 

include_once '../../backend/basedados.h';
include_once '../../backend/utils.php';

?>

<table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Nome login</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Tipo</th>
      <th>Utilizador desde</th>
      <th>Opções</th>
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