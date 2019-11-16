<?php 

function tabSwitch($tab) {
  switch($tab) {
    case 'utilizadores':
      require_once 'admin/parts/table_utilizadores.php';
      break;
    case 'usersPorAprovar':
      require_once 'admin/parts/table_utilizadores.php';
      break;
    case 'usersEliminados':
      require_once 'admin/parts/table_utilizadores.php';
    break;
    case 'gerirMarcacoes':
      require_once 'admin/marcacoes/gerir-marcacoes.php';
    break;
    default:
      break;
  }
}
?>