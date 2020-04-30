<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Relatótio</title>
	<link rel="stylesheet" type="text/css" href="css/estilorelatoriomenu.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
		$tipo = $_GET['o'] ?? null;
	?>
	<div id="corpo1">
		
        <h1>Relatório</h1>
			<?php
				
				echo "<div id='geral'>";
				echo "<a href='b_relatorio_cliente.php'><input type='button' value='cliente' id='menu2'></a> ";
				if(is_admin()){
				echo "<a href='relatorio.php?o=o'><input type='button' value='financeiro' id='menu2'></a>";
				}
				echo "<a href='d_relatorio_fornecedor.php'><input type='button' value='fornecedor' id='menu2'></a>";
				echo "<a href='e_relatorio_produto.php'><input type='button' value='produto' id='menu2'></a>";
				echo "</div>";
			
				
				
				
			if($tipo == 'o'){
			echo "<div id='tipo'>";
			echo "<a class='receita' href='c_relatorio_financeiro_receita.php'><input type='submit' value='Receita'></a>";  
			echo "<a class='despesa' href='c_relatorio_financeiro_despesa.php'><input type='submit' value='Despesa'></a>";
			echo "</div>";
			}
			echo "<br/><br/>";
			

			
			?>
		<?php echo voltar(); ?>
	</div>
	
	<?php $banco->close();?>
</body>
</html>