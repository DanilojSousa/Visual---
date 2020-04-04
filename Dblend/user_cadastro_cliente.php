<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.css">
	<link rel="stylesheet" type="text/css" href="css/estilorodape.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
          <style>
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
a.voltar{
	text-decoration: none;
	color: #000;
	font-size: 20px;
	Margin-left: 20px;
}
a.retorno{
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
	<div id="corpo1">
       <?php
          
			if(!is_logado()){
                echo msg_erro("Efetue o <a href='user_login.php'>Login</a> Para poder editar seus dados.");
            }else if(!isset($_POST['sobrenome'])){
                require "cadastro_cliente_form.php";
            }else{		
			$nome = $_POST['nome'] ?? null;
			$sobrenome = $_POST['nome'] ?? null;
			$email = $_POST['email'] ?? null;
			$nascimento = $_POST['nascimento'] ?? null;
			$telefone = $_POST['telefone'] ?? null;
			$form1 = substr($telefone, 0,2);
			$form2 = substr($telefone, 2,5);
			$form3 = substr($telefone, 7,10);
			$cidade = $_POST['cidade'] ?? null;
			$uf = $_POST['uf'] ?? null;
			$endereco = $_POST['endereco'] ?? null;
			$link = $_POST['link'] ?? null;
			$senha1 = $_POST['senha1'] ?? null;
			$senha2 = $_POST['senha2'] ?? null;
			$tipo = "usuario";
			if($senha1 === $senha2){
            if(empty($nome) || empty($sobrenome) || empty($email) || empty($nascimento) || empty($telefone) || empty($cidade) || empty($endereco) || empty($senha1) || empty($senha2)){
                echo msg_aviso("Todos campos são obrigatórios!!");
            }else{
			$senha = gerarhash($senha1);
			$q = "INSERT INTO cliente (nome, sobrenome, email, nascimento, telefone, cidade, uf, endereco, link, senha, tipo) values ('$nome','$sobrenome','$email','$nascimento','($form1) $form2-$form3','$cidade','$uf','$endereco','$link','$senha','$tipo')";
	
			if($banco->query($q)){
                    echo msg_sucesso("Cliente cadastrado com sucesso! Continuar <a class='retorno' href='user_cadastro_cliente.php'>cadastrando</a>?");
                    
                   		
			}else{
				echo msg_erro("Não foi Possivel efeturar o cadastro $nome. Talvez o cadastro já existe.");
				
            }
        
        }
		}else{
			echo msg_erro("Senha não confere!");

		}
    }



    echo "<a class='voltar' href='cadastro.php'>VOLTAR</a>"
    ?>
    	</div>
	<?php $banco->close();?>
</body>
</html>

