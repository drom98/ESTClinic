<?php 

function queryUsersTable($conn) {
  $sql = "SELECT * FROM utilizador";
  $retval = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    echo "
    <tr>
    <td>".$row['idUtilizador']."</td>
    <td>".$row['nomeUtilizador']."</td>
    <td>".$row['nome']."</td>
    <td>".$row['email']."</td>
    <td>".$row['tipoUtilizador']."</td>
    <td>".mostrarBotoes($row['idUtilizador'])."</td>
    </tr>";
  }
}

function queryUsersPorAprovar($conn) {
  $sql = "SELECT * FROM utilizador WHERE tipoUtilizador = '4'";
  $retval = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    echo "
    <tr>
    <td>".$row['idUtilizador']."</td>
    <td>".$row['nomeUtilizador']."</td>
    <td>".$row['nome']."</td>
    <td>".$row['email']."</td>
    <td>".$row['tipoUtilizador']."</td>
    <td>".mostrarBotoes($row['idUtilizador'])."</td>
    </tr>";
  }
}

function queryDadosUser($conn, $userid) {
  $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$userid'";
  $retval = mysqli_query($conn, $sql);
  $dataRow = mysqli_fetch_array($retval, MYSQLI_ASSOC);

  if($dataRow == NULL) {
    return false;
  } else {
    return $dataRow;
  }
}

function mostrarBotoes($userID) { 
  return '
  <button class="button is-info is-light is-small is-fullwidth" id="btnEditarUser" name="'.($userID).'">
    <span class="icon">
      <i class="fas fa-user-edit"></i>
    </span>
    <span>Editar dados</span>
  </button>
  <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarUser">
    <span class="icon">
      <i class="fas fa-trash"></i>
    </span>
    <span>Eliminar utilizador</span>
  </button>';
}

?>