<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Produto</title>
	<link rel="stylesheet" href="css/cadastro.css">
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
		<?php
		if(!is_logado()){
		 	echo msg_erro("Efetue o <a href='user_login.php'>Login</a> Para poder editar seus dados.");
		 }else{
		 	if(!isset($_POST['nome'])){
		 		require "a_minhaconta_form.php";
		 	}else{
				$nome = $_POST['nome'] ?? null;
				$sobrenome = $_POST['sobrenome'] ?? null;
		 		$email = $_POST['email'] ?? null;
		 		$nascimento = $_POST['nascimento'] ?? null;
		 		$telefone = $_POST['telefone'] ?? null;
		 		$cidade = $_POST['cidade'] ?? null;
		 		$uf = $_POST['uf'] ?? null;
		 		$endereco = $_POST['endereco'] ?? null;
				$link = $_POST['link'] ?? null;
				$senha1 = $_POST['senha1'] ?? null;
				$senha2 = $_POST['senha2'] ?? null;

		 		$q = "update cliente set nome = '$nome', sobrenome = '$sobrenome', email = '$email', nascimento = '$nascimento', telefone = '$telefone', cidade = '$cidade', uf = '$uf', endereco = '$endereco', link = '$link' ";
		 		if(empty($senha1) || is_null($senha1)){
		 			echo msg_aviso("Senha antiga foi mantida");
		 		}else{
		 			if ($senha1 === $senha2){
		 				$senha = gerarhash($senha1);
		 				$q .= ", senha = '$senha'";
		 			}else{
		 				echo msg_erro("Senhas não conferem. A senha anterior será mantida.");
		 			}
				 }
		 		$q .= " Where nome ='" . $_SESSION['user'] . "'";
		 		if ($banco->query($q)){
		 			echo msg_sucesso("Usuário alterado com sucesso.");
		 			logout();
		 			echo msg_aviso("Por segurança, efetue o <a href='user_login.php'>Login</a> Novamente.");
		 		}else{
		 			echo msg_erro("Não foi possivel alterar os dados. tentar <a href='a_minhaconta.php'>novamente</a>");
		 		}
		 	}

		}
		 
		echo voltar();
		?>
	</div>
	<?php $banco->close();?>

</body>
</html>