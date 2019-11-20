

<div class="tabs is-toggle is-small">
  <ul>
    <li class="is-active" id="tab">
      <a href="?tab=gerirMarcacoes">
        <span class="icon is-small"><i class="fas fa-calendar-check"></i></span>
        <span>Aprovadas</span>
      </a>
    </li>
    <li id="tab">
      <a href="?tab=gerirMarcacoes&m=porAprovar">
        <span class="icon is-small"><i class="fas fa-calendar-times"></i></span>
        <span>Por aprovar</span>
      </a>
    </li>
  </ul>
</div>
<h3 class="subtitle is-size-4"><strong>Dia:</strong>15 Nov</h3>
<?php 

if(isset($_GET["m"])) {
  if($_GET["m"] == "porAprovar") {
    echo "<div class='timetable' id='porAprovar'></div>";
  } 
} else {
  echo "<div class='timetable' id='aprovadas'></div>";
}

?>

