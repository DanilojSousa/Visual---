<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Relatótio</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/estilo_relatorio.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.css">
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
		
        <h1>Relatório</h1>
			<?php
				
				echo "<div id='relatorio'><a href='user_relatorio_cliente.php'>Cliente</a>  </div>";
				if(is_admin()){
				echo "<div id='relatorio1'> <a href='user_relatorio_financeiro.php'>Financeiro</a>  </div>";
				}
				echo "<div id='relatorio2'> <a href='user_relatorio_fornecedor.php'>Fornecedor</a>  </div>";
				echo "<div id='relatorio3'> <a href='user_relatorio_produto.php'>Produto</a>   </div><br/><br/>";
			?>
		<?php echo voltar(); ?>
	</div>
	
	<?php $banco->close();?>
</body>
</html>