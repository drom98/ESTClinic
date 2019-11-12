<?php 

require_once '../basedados.h';

if(isset($_GET["userid"])) {
  $idUtilizador = $_GET["userid"];
  $sql = "UPDATE utilizador SET tipoUtilizador = 5 WHERE idUtilizador = '$idUtilizador'";
  if(mysqli_query($conn, $sql)) {
    echo(1);
  } else {
    echo(-1);
  }
}

?>