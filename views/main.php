<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Cadastro de O.S</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="<?php echo ROOT_PATH; ?>assets/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="<?php echo ROOT_PATH; ?>">Sistema de Cadastro de O.S</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_PATH; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_PATH; ?>clientes">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_PATH; ?>produtos">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_PATH; ?>ordem">Ordem de Serviço</a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container-fluid">
	<div class="row">
    <?php Messages::display(); ?>
		<?php require($view); ?>
	</div>
</main>
</body>
</html>