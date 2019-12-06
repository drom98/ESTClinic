<?php 

include_once '../../backend/basedados.h';
include_once '../../backend/utils.php';

?>

<table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Data</th>
      <th>Médico/Enfermeiro</th>
      <th>Especialidade</th>
      <th>Opções</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      switch($_GET['tab']) {
        case 'verConsultas':
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