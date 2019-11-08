<?php 


if(verificarSessao()) {
  header('Location: '.PAGES.'login.php?erro=permissao');
}

?>