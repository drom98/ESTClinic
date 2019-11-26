<?php 

function queryUsersTable($conn) {
  $sql = "SELECT U.*, T.descricao FROM utilizador U, tipoUtilizador T WHERE tipoUtilizador <> '4' AND tipoUtilizador <> '6' AND T.idTipo = U.tipoUtilizador ORDER BY U.data";
  $retval = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($retval);
  if($num_rows != 0) {
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
      echo "
      <tr>
      <td>".$row['nomeUtilizador']."</td>
      <td>".$row['nome']."</td>
      <td>".$row['email']."</td>
      <td>".$row['descricao']."</td>
      <td class='has-text-grey'>".date( 'd/M/Y', strtotime($row['data']))."</td>
      <td>".mostrarBotoes($row['idUtilizador'])."</td>
      </tr>";
    }
    //mostrarNumResultados($num_rows);
  } else {
    return false;
  }
  mysqli_close($conn);
}

function queryUsersPorAprovar($conn) {
  $sql = "SELECT U.*, T.descricao FROM utilizador U, tipoUtilizador T WHERE tipoUtilizador = '4' AND T.idTipo = U.tipoUtilizador";
  $retval = mysqli_query($conn, $sql);
  if(mysqli_num_rows($retval) != 0) {
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
      echo "
      <tr>
      <td>".$row['idUtilizador']."</td>
      <td>".$row['nomeUtilizador']."</td>
      <td>".$row['nome']."</td>
      <td>".$row['email']."</td>
      <td>".$row['descricao']."</td>
      <td>".mostrarBotoes($row['idUtilizador'])."</td>
      </tr>";
    }
  } else {
    echo "
    <tr>
    <td colspan='6' class='has-text-centered'>
    Não foram encontrados registos nesta tabela.
    </td>
    </tr>
    ";
  }
  mysqli_close($conn);
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

function queryUsersEliminados($conn) {
  $sql = "SELECT U.*, T.descricao FROM utilizador U, tipoUtilizador T WHERE tipoUtilizador = '6' AND T.idTipo = U.tipoUtilizador";
  $retval = mysqli_query($conn, $sql);
  if(mysqli_num_rows($retval) != 0) {
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
      echo "
      <tr>
      <td>".$row['idUtilizador']."</td>
      <td>".$row['nomeUtilizador']."</td>
      <td>".$row['nome']."</td>
      <td>".$row['email']."</td>
      <td>".$row['descricao']."</td>
      <td>".mostrarBotoes($row['idUtilizador'])."</td>
      </tr>";
    }
  } else {
    echo "
    <tr>
    <td colspan='6' class='has-text-centered'>
    Não foram encontrados registos nesta tabela.
    </td>
    </tr>
    ";
  }

}

function mostrarBotoes($userID) {
  if(isset($_GET["tab"])) {
    $tab = $_GET["tab"];
  }
  switch($tab) {
    case 'usersPorAprovar':
      return '
      <button class="button is-success is-light is-small is-fullwidth" id="btnAprovarUser" name="'.($userID).'">
      <span class="icon">
        <i class="fas fa-user-check"></i>
      </span>
      <span>Aprovar utilizador</span>
    </button>
      <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-user-edit"></i>
        </span>
        <span>Editar dados</span>
      </button>
      <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-trash"></i>
        </span>
        <span>Eliminar utilizador</span>
      </button>';
    break;
    case 'usersEliminados':
      return '
      <button class="button is-success is-light is-small is-fullwidth" id="btnRestaurarUser" name="'.($userID).'">
      <span class="icon">
        <i class="fas fa-user-check"></i>
      </span>
      <span>Restaurar utilizador</span>
    </button>
      <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-user-edit"></i>
        </span>
        <span>Editar dados</span>
      </button>
      <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarPermaUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-trash"></i>
        </span>
        <span>Eliminar permanentemente</span>
      </button>';
    break;
    case 'utilizadores':
      return '
      <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-user-edit"></i>
        </span>
        <span>Editar dados</span>
      </button>
      <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarUser" name="'.($userID).'">
        <span class="icon">
          <i class="fas fa-trash"></i>
        </span>
        <span>Eliminar utilizador</span>
      </button>';
    break;
  }
}
/*
function mostrarNumResultados($num) {
  echo 
  '
  <header class="card-header">
    <p class="card-header-title">Utilizadores ativos</p>
    <p class="card-header-title is-pulled-right">'.$num.'</p>
  </header>
  ';
}
*/
?>