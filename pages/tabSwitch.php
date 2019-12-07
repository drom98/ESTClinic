<?php 

function tabSwitch($tab) {
  switch($tab) {
    case 'utilizadores':
      require_once 'components/tabelas/tabela_utilizadores.php';
      break;
    case 'usersPorAprovar':
      require_once 'components/tabelas/tabela_utilizadores.php';
      break;
    case 'usersEliminados':
      require_once 'components/tabelas/tabela_utilizadores.php';
    break;
    case 'verConsultas':
      require_once 'components/tabelas/tabela_marcacoes.php';
    break;
    case 'aprovarMarcacoes':
      require_once '';
    break;
    case 'marcarConsulta':
      require_once 'components/formularios/marcar-consulta.php';
    break;
    case 'dadosPessoais':
      require_once 'dados-pessoais.php';
    default:
      break;
  }
}
?>