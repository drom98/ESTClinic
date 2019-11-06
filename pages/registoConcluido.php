<?php 
require_once '../php/utils.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Conta registada</title>
</head>
<body>
<body class="has-navbar-fixed-top">
  <?php 
  require_once '../php/parts/navbar.html';
  ?>
    <section class="section">
        <div class="container" id="login-container">
            <div class="columns is-centered">
                <div class="column is-half">
                  <div class="card">
                    <div class="card-content">
                      <h1 class="title has-text-info is-4 has-text-centered">Bem vindo à ESTClinic!</h1>
                      <h2 class="subtitle is-6 has-text-centered">A sua conta foi registada com sucesso e aguarda aprovação do administrador.</h2>
                      <div class="has-text-centered">
                        <a class="button is-info" href=<?php echo(PAGES.'index.php'); ?>>Voltar ao início</a>
                      </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
</body>
</html>