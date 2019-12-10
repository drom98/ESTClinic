<?php 
require_once '../utils.php';
session_start();
$nomeUser = $_SESSION["nome"];
if(session_destroy()) {
  /*
  $flog = fopen('../../log.txt', 'a') or die('Não encotrou ficheiro');
  date_default_timezone_set('Europe/Lisbon');
  $data = time();
  $texto = ('Logout: ' . date('d-m-Y H:i:s', $data) . ' ' . $nomeUser."\n");
  fprintf($flog, $texto);
  fclose($flog);
  */
  header("Location: ../../pages/login.php?erro=logout");
}
?>