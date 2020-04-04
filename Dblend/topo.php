<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Topo</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	  rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilo_topo.css">
</head>
<body>
	<header>
		<nav id="topo">
			<?php
			echo "<div class='menu'><ul><li><a href='index.php'>Home</a></li><li><a href='index.php'>Serviço</a></li><li><a href='index.php'>Contato</a></li><li><a href='index.php'>Agendamento</a></li></ul></div>";
			?> 
			<?php
			 	if (empty($_SESSION['user'])){
			 		echo "<div class='login'><a href='user_login.php'>Entrar</a></div>";
			 	}else{
			 		echo "<br/><div class='minhaconta'>Seja bem vindo, <strong> " , $_SESSION['user'] ,  "</strong> | <a href='minhaconta.php'>Minha Conta </a>|<a href='user_logout.php'> Sair </a></div>";
			 	}
			 ?>
			 <?php
			echo "<form method='post' action='.php' id='pesquisa'> Pesquisa: <input type='text' id='pesquisa' name='pesquisa' size='20' maxlength='30'</form>"; 
			 if((is_admin() || is_editor()) && (is_logado())){
				echo "<div id='topogeral'>";
				if(is_admin()){
					echo "<div id='topo'><a href='financeiro.php'>Financeiro</a></div>";
				}
				echo "<div id='topo1'><a href='cadastro.php'> Cadastro</a></div>";
				echo "<div id='topo2'><a href='relatorio.php'> Relatorio</a></div>";
				echo "</div>";
			 }
		
			?>
		</nav>
</header>
</body>
</html>