<?php 

function tabSwitch($tab) {
  switch($tab) {
    case 'utilizadores':
      require_once 'components/tabelas/table_utilizadores.php';
      break;
    case 'usersPorAprovar':
      require_once 'components/tabelas/table_utilizadores.php';
      break;
    case 'usersEliminados':
      require_once 'components/tabelas/table_utilizadores.php';
    break;
    case 'gerirMarcacoes':
      require_once '';
    break;
    case 'dadosPessoais':
      require_once 'dados-pessoais.php';
    default:
      break;
  }
}
?>