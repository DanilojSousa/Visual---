<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Produto</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.css">
	<link rel="stylesheet" type="text/css" href="css/estilorodape.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  
      <style> 
	div#corpo2{
		width: 300px;
		height: 100%;
		margin: auto;
		padding: 20px;
		background-color: #fff;
		box-shadow: 0px 0px 30px #777;
		border-radius: 10px;
		font-size: 13px;
	}
	div#corpo2 input[type='text'], input[type='password']{
		background-color: #ddd;
		border-radius: 3px;
		box-shadow: 0px 0px 3px #777;
		margin-top: 10px;
	}

	div#corpo2 input[type='text'], input[type='password']:hover{
		cursor: pointer;
	}

	div#corpo2 input[type='submit']{
		border-radius: 3px;
		background-color: #1e1c24;
		color: #fff;
		margin-top: 20px;
	}
	div#corpo2 input[type='submit']:hover{
		cursor: pointer;
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
a.menu{
	text-decoration: none;
	color: #000;
	font-size: 20px;
	Margin-left: 20px;
}
a{
	text-decoration: none;	
}
	
     </style>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
	?>
	<div id="corpo2">
		<?php
			$u = $_POST['nome'] ?? null;
			$s = $_POST['senha'] ?? null;
			if (is_null($u) || is_null($s)){
				 require "user_login_form.php";
			}else{
				$q = "SELECT nome, sobrenome, email, nascimento, telefone, cidade, uf, endereco, link, tipo, senha from cliente WHERE nome = '$u' LIMIT 1";
			
				$busca = $banco->query($q);
					if(!$busca){
						echo msg_erro('falha ao acessar o banco');
					}else{
						if ($busca->num_rows > 0){
						$reg = $busca->fetch_object();
						if (testarhash($s, $reg->senha)){
							echo msg_sucesso('Logado com sucesso');
							
							$_SESSION['user'] = $reg->nome;
							$_SESSION['nome'] = $reg->sobrenome;
							$_SESSION['tipo'] = $reg->tipo;
							if(is_admin()){
							$q = "SELECT cliente, receita, inclusao_data, data_recebimento, qtd, valor, situacao from contasareceber ";
							$p = "SELECT fornecedor, despesa, inclusao_data, data_pagamento, qtd, valor, situacao from contasapagar ";
							
							$busca = $banco->query($q);	
							$busca1 = $banco->query($p);
							$datai =  new DateTime(); 
							$datainclusao = DATE_FORMAT($datai,'d/m/Y');
							
							if(is_admin()){
							while($reg = $busca->fetch_object()){
								
								if($reg->data_recebimento == $datainclusao){
								$cliente = $reg->cliente;
								$prazo = "<script>alert('RECEITA: $cliente - Possui pagamento vencido no valor R$ $reg->valor')</script>";
								echo $prazo;
								}
							}
							while($reg = $busca1->fetch_object()){
								if($reg->data_pagamento == $datainclusao){
								$fornecedor = $reg->fornecedor;
								$prazo1 = "<script>alert('DESPESA: $fornecedor - Possui pagamento vencido no valor R$ $reg->valor')</script>";
								echo $prazo1;
								}
							}
						}
					}
			
							
						}else{
							echo msg_erro('Senha invalida');
						}
						}else{
							echo msg_erro('Usuario não existe');
						}
					}
			}
			
			echo "<a class='menu' href='index.php'>MENU </a>";
			
		?>
	</div>
	<script src="script/alerta.js"></script>
</body>
</html>