<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Produto</title>
	<link rel="stylesheet" type="text/css" href="css/estilofinanceirocadastro.css">
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
		// menu financeiro cadastro
		echo "<div id='cadastrofinanceiro'> <form>";
		echo "<a href='c_cadastro_financeiro_receita.php'><input type='button' value='receita'  id='menu1'></a>";
		echo "<a href='c_cadastro_financeiro_despesa.php'><input type='button' value='despesa'  id='menu2'></a>";
		echo "</form></div><br/><br/>";
	?>
                                                                
        <?php echo voltar(); ?>
    </div>
	<?php $banco->close();?>
</body>
</html>