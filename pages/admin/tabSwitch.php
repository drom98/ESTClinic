<?php 

function tabSwitch($tab) {
  switch($tab) {
    case 'utilizadores':
      require_once 'utilizadores.php';
      break;
    case 'usersPorAprovar':
      require_once 'users-por-aprovar.php';
      break;
    case 'usersEliminados':
      require_once 'usersEliminados.php';
    break;
    default:
      break;
  }
}
?>