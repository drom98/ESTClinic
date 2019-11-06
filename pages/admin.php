<?php 

session_start();
include_once '../php/utils.php';

//True = sem sessão
if(verificarSessao()) {
    //echo "Não tem permissões";
    header('Location: '.PAGES.'login.php?erro=permissao');
}

?>