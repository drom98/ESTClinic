<?php 

function tabSwitch($tab) {
  switch($tab) {
    case 'utilizadores':
      require_once 'utilizadores.php';
      break;
    case 'usersPorAprovar':
      echo $tab;
      break;
    default:
      break;
  }
}
?>