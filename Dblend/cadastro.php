<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/estilocadastro.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	  rel="stylesheet">
	
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
		$tipo = $_GET['e'] ?? null;
	?>
	<div id="corpo1">
		
        <h1>Cadastro</h1>
			<?php
				echo "<div='topogeral1'>";
				echo "<a href='b_cadastro_cliente.php'><input type='button' value='cliente' id='menu3'></a>";
				if(is_admin()){
				echo "<a href='user_cadastro_usuario.php'><input type='button' value='usuario' id='menu3'></a>";
				}
				echo "<a href='d_cadastro_fornecedor.php'><input type='button' value='fornecedor' id='menu3'></a>";
				echo "<a href='cadastro.php?e=e'><input type='button' value='produto' id='menu3'></a><br/><br/><br/>";

				if($tipo == 'e'){
			echo "<div id='tipo'>";
			echo "<a class='cadastrar' href='e_cadastro_produto.php'><input type='submit' value='Cadastrar'></a>";  
			echo "<a class='editar' href='e_editar_produto.php'><input type='submit' value='Editar'></a>";
			echo "</div>";
			}
			echo "<br/><br/>";
				echo voltar();
				echo "</div>";
			?>
		
	</div>
	
	<?php $banco->close();?>
</body>
</html>