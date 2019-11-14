<?php 

function tabSwitch($tab) {
  switch($tab) {
    case 'utilizadores':
      require_once 'admin/utilizadores/utilizadores.php';
      break;
    case 'usersPorAprovar':
      require_once 'admin/utilizadores/users-por-aprovar.php';
      break;
    case 'usersEliminados':
      require_once 'admin/utilizadores/usersEliminados.php';
    break;
    case 'gerirMarcacoes':
      require_once 'admin/marcacoes/gerir-marcacoes.php';
    break;
    default:
      break;
  }
}
?>