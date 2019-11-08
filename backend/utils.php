<?php 

if(!defined('JS')) define("JS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/lib/');
if(!defined('BACKEND')) define("BACKEND", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/backend/');
if(!defined('PAGES')) define("PAGES", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/pages/');
if(!defined('CSS'))define("CSS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/css/');
if(!defined('ASSETS')) define("ASSETS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/assets/');


//Verificar sessão
//True - Sem sessão
function verificarSessao() {
  if(!isset($_SESSION["idUser"])) {
    return true;
  } else {
    return false;
  }
}

?>