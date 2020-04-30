<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Produto</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.css">
	<link rel="stylesheet" type="text/css" href="css/estilorodape.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
	?>
	<div id="corpo5">
		<h1>Pagina inicial</h1>
		<?php
		$data = date_create('2020-04-14');
		$datahoje = date_create();
		$resultado = date_diff($data, $datahoje);
		
		echo date_interval_format($resultado, '%a');
		
		?>
	
	</div>
	<?php $banco->close();?>
	<?php include "rodape.php";?>
</body>
</html>