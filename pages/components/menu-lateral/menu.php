<aside class="menu">
<?php 

switch($_SESSION['tipoUtilizador']) {
  case '1':
    menuAdmin();
  break;
  case '5':
    menuUtente();
  break;
}

?>
</aside>

<?php 

function menuAdmin() {
  echo '
  <p class="menu-label">
  <span class="icon">
    <i class="fas fa-user-friends fa-lg has-text-link"></i>
  </span>
  Utilizadores
</p>
<ul class="menu-list">
  <li><a href="?tab=utilizadores" id="utilizadores">Gerir utilizadores</a></li>
  <li>
    <ul>
      <li><a href="?tab=usersPorAprovar" id="usersPorAprovar">Utilizadores por aprovar</a></li>
      <li><a href="?tab=usersEliminados" id="usersEliminados">Utilizadores eliminados</a></li>
    </ul>
  </li>
</ul>

<p class="menu-label">
  <span class="icon">
    <i class="fas fa-calendar-check fa-lg has-text-link"></i>
  </span>
  Marcações
</p>
<ul class="menu-list">
  <li><a href="?tab=gerirMarcacoes" id="gerirMarcacoes">Marcações ativas</a></li>
  <li><a href="?tab=aprovarMarcacoes" id="aprovarMarcacoes">Marcações por aprovar</a></li>
</ul>

<p class="menu-label">
    <span class="icon">
        <i class="fas fa-user-md fa-lg has-text-link"></i>
      </span>
  Escalas de serviço
</p>
<ul class="menu-list">
  <li><a>Gerir escalas de serviço</a></li>
  <li>
      <ul>
        <li><a href="">Médicos</a></li>
        <li><a href="">Enfermeiros</a></li>
      </ul>
    </li>
</ul>

<p class="menu-label">
    <span class="icon">
        <i class="fas fa-user-circle fa-lg has-text-link"></i>
      </span>
  Dados pessoais
</p>
<ul class="menu-list">
  <li><a href="?tab=dadosPessoais" id="dadosPessoais">Gerir dados pessoais</a></li>
</ul>';
}

function menuUtente() {
  echo '
  <p class="menu-label">
    <span class="icon">
      <i class="fas fa-calendar-check fa-lg has-text-link"></i>
    </span>
    Consultas
  </p>
  <ul class="menu-list">
    <li><a href="?tab=marcarConsulta" id="utilizadores">Marcar consulta</a></li>
    <li><a href="?tab=verConsultas" id="utilizadores">Ver consultas marcadas</a></li>
  </ul>

  <p class="menu-label">
      <span class="icon">
          <i class="fas fa-user-circle fa-lg has-text-link"></i>
        </span>
    Dados pessoais
  </p>
  <ul class="menu-list">
    <li><a href="?tab=dadosPessoais" id="dadosPessoais">Gerir dados pessoais</a></li>
  </ul>';
}

?>