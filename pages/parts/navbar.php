<?php 

if(!isset($_SESSION)) {
	session_start();
}

if(file_exists('../php/utils.php')) {
	include_once '../php/utils.php';
}
?>

<nav class="navbar is-info is-fixed-top" role="navigation">
	<div class="container">
	  <div class="navbar-brand">
	    <a href=<?php echo(PAGES.'index.php') ?> class="navbar-item">ESTClinic</a>	
	    <!--Adicionar class 'is-active' para mostrar X-->
	    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
	      <span aria-hidden="true"></span>
	      <span aria-hidden="true"></span>
	      <span aria-hidden="true"></span>
	    </a>
	  </div>
	  <div class="navbar-end">
			<?php 
			if(!verificarSessao()) { ?>
				<a href=<?php echo(PHP.'login_registo/logout.php') ?> class="navbar-item">Sair</a> <?php
			} else { ?>
				<a href=<?php echo(PAGES.'login.php') ?> class="navbar-item">Login</a>
				<a href=<?php echo(PAGES.'registo.php') ?> class="navbar-item">Registo</a> <?php
			}
			?>
	  </div>
	</div>
</nav>