<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/estilo_cadastro.css">
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
				
				echo "<div id='cadastro'><a href='user_cadastro_cliente.php'>Cliente</a>  </div>";
				if(is_admin()){
				echo "<div id='cadastro1'> <a href='user_cadastro_usuario.php'>Usuario</a>  </div>";
				}
				echo "<div id='cadastro2'> <a href='user_cadastro_fornecedor.php'>Fornecedor</a>  </div>";
				echo "<div id='cadastro3'> <a href='user_cadastro_produto.php'>Produto</a>   </div><br/><br/>";
			?>
		<?php echo voltar(); ?>
	</div>
	
	<?php $banco->close();?>
</body>
</html>