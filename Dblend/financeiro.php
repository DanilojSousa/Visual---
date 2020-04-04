<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Produto</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilo_financeiro.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.css">
	<link rel="stylesheet" type="text/css" href="css/estilorodape.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
	?>
	<div id="corpo1">
    
         <h1>Cadastro</h1>
	<?php
		
		echo "<div id='cadastro'><a href='user_cadastro_financeiro_receita.php'>Receita</a>  </div>";
		echo "<div id='cadastro1'> <a href='user_cadastro_financeiro_despesa.php'>Despesa</a>  </div><br/><br/>";
	?>
                                                                
        <?php echo voltar(); ?>
    </div>
	<?php $banco->close();?>
</body>
</html>