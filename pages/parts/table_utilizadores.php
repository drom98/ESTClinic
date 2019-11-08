<?php 

include_once '../../backend/utils.php';
include_once($_SERVER['DOCUMENT_ROOT'].BACKEND.'basedados.h');

?>

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
      switch($_GET['tab']) {
        case 'utilizadores':
          queryUsersTable($conn);
        break;
        case 'usersPorAprovar':
          queryUsersPorAprovar($conn);
        break;
      }
      ?>
  </tbody>
</table>