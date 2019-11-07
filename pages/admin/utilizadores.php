<?php 

require_once '../../php/utils.php';
require_once '../../php/basedados.h';


function queryDB($conn) {
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
    <td>".mostrarIcons()."</td>
    </tr>";
  }
}

function mostrarIcons() { 
  return '
  <button class="button is-info is-light is-small is-fullwidth" id="btnEditarUser">
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

<table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th><abbr title="ID Utilizador">ID</abbr></th>
      <th><abbr title="Nome Login">Nome login</abbr></th>
      <th><abbr title="Nome">Nome</abbr></th>
      <th><abbr title="Email">Email</abbr></th>
      <th><abbr title="Tipo Utilizador">Tipo</abbr></th>
      <th><abbr title="Tipo Utilizador">Opções</abbr></th>
    </tr>
  </thead>
  <tbody>
      <?php 
      queryDB($conn);
      ?>
  </tbody>
</table>