<?php 

if(!isset($_SESSION)) {
  session_start();
}

if(isset($_GET)) {
  echo $_GET["userid"];
} else {
  echo "cenas";
}

function queryDadosUser($userid) {
  $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$userid'";
  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);

  if($row == NULL) {
    return false;
  } else {
    return $row;
  }
}

?>