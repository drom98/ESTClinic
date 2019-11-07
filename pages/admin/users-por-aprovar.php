<?php 

require_once '../../php/utils.php';
require_once '../../php/basedados.h';


function queryDB($conn) {
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
    </tr>";
  }
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
    </tr>
  </thead>
  <tbody>
      <?php 
      queryDB($conn);
      ?>
  </tbody>
</table>