<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Topo</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	  rel="stylesheet">
	<link rel="stylesheet" href="css/estilotopo.css">
	<style>

	</style>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
	?>
	<header>
		<nav id="topo">
			
			<?php
			// Menu Principal
			echo "<div id='menu'><form><a href='index.php'><input type='button' value='home' id='menu1'></a><a href='index.php'><input type='button' value='serviço'  id='menu1'></a><a href='index.php'><input type='button' value='contato'  id='menu1'></a><a href='index.php'><input type='button' value='agendamento'  id='menu1'></a></div></form>";
			
			?> 
		
			
			<?php
			// Menu de acesso
			 	if (empty($_SESSION['user'])){
					echo "<div id='login' <form>";
					 echo "<a href='user_login.php'><input type='button' value='entrar' id='menulogin'></a>";
					 echo "</div>";
			 	}else{
					echo "<div id='minhaconta'";
					 echo "<span>Seja bem vindo,  </span> <strong> ", $_SESSION['user'] ,"</strong><a href='a_minhaconta.php'><input type='button' value='minha conta'  id='menu2'></a><a href='user_logout.php'><input type='button' value='sair'  id='menusair'> </a>";
					 echo "</form></div>";
			 	}
			 ?>
			 <?php
			// Menu de controles
			 if((is_admin() || is_editor()) && (is_logado())){
				echo "<div id='topogeral'>";
				echo "<form method='post' action='topo.php'>";
				if(is_admin()){
					echo "<a href='financeiro.php'><input type='button' value='financeiro' id='menu3'></a>";  
				}
				echo "<a href='cadastro.php'><input type='button' value='cadastro' id='menu3'></a>";
				echo "<a href='relatorio.php'><input type='button' value='relatorio' id='menu3'></a>";
				echo "</form>";
				echo "</div>";
				
			 }
		
			?>
		</nav>
</header>
<script src="script/alerta.js"></script>
</body>
</html>