<?php 

require_once '../basedados.h';

if(isset($_GET)) {
  $userid = $_GET["userid"];
  $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$userid'";
  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
  echo json_encode($row);
  echo "Yah";
} else {
  echo "Nada";
}



?>