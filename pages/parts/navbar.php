<?php 

if(!isset($_SESSION)) {
	session_start();
}

if(file_exists('../backend/utils.php')) {
	include_once '../backend/utils.php';
}
?>

<nav class="navbar is-link is-fixed-top" role="navigation">
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
				<a href=<?php echo(PAGES.'admin/admin.php') ?> class="navbar-item"><?php echo($_SESSION['nome']) ?><span class="icon" style="margin-left: 2px"><i class="fas fa-user"></i></span></a>
				<a href=<?php echo(BACKEND.'login_registo/logout.php') ?> class="navbar-item">Sair<span class="icon" style="margin-left: 3px"><i class="fas fa-sign-out-alt"></i></span></a> <?php
			} else { ?>
				<a href=<?php echo(PAGES.'login.php') ?> class="navbar-item">Login</a>
				<a href=<?php echo(PAGES.'registo.php') ?> class="navbar-item">Registo</a> <?php
			}
			?>
	  </div>
	</div>
</nav>