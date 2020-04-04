<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.css">
	<link rel="stylesheet" type="text/css" href="css/estilorodape.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
     <style>
    div#corpo3{
		width: 300px;
		height: 100%;
		margin: auto;
		padding: 20px;
		background-color: #fff;
		box-shadow: 0px 0px 30px #777;
		border-radius: 10px;
		font-size: 13px;
	}

     	div.sucesso{
	padding: 7px 15px;
	margin-bottom: 15px;
	border-radius: 15px;
	background-color: rgb(226,239,218);
	color: rgb(74,116,67);
}
div.aviso{
	padding: 7px 15px;
	margin-bottom: 15px;
	border-radius: 15px;
	background-color: rgb(251,248,229);
	color: rgb(134,110,66);
}
div.erro{
	padding: 7px 15px;
	margin-bottom: 15px;
	border-radius: 15px;
	background-color: rgb(239,223,222);
	color: rgb(157,75,69);
}
a.voltar{
	text-decoration: none;
	color: #000;
	font-size: 20px;
	Margin-left: 20px;
}

     </style>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
	?>
	<div id="corpo3">
		<?php
		logout();
		echo msg_sucesso('Usuário desconectado com sucesso');

		echo voltar();
		?>
	</div>
	<?php $banco->close();?>
</body>
</html>