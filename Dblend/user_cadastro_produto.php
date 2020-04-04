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
            }else if(!isset($_POST['descricao'])){
            	require "cadastro_produto_form.php";
		    }else{
		    $descricao = $_POST['descricao'] ?? null;
		    $categoria = $_POST['categoria'] ?? null;
		    $qtd = $_POST['qtd'] ?? null;
            $valor = $_POST['valor'] ?? null;
            
            if(empty($descricao) || empty($categoria) ||  empty($qtd) || empty($valor)){
                echo msg_aviso("Todos campos são obrigatórios!!");
            }else{		
		    $p = "INSERT INTO estoque (descricao, categoria, qtd, valor) values ('$descricao','$categoria','$qtd','$valor')";
		
		    if($banco->query($p)){
	            echo msg_sucesso("Produto cadastrado com sucesso! Continuar <a class='retorno' <a href='user_cadastro_produto.php'>cadastrando</a>?");       		
			    }else{
				echo msg_erro("Não foi Possivel efeturar o cadastro $nome. Talvez o cadastro já existe.");
            }
        }    
   } 
    



    echo "<a class='voltar' href='cadastro.php'>VOLTAR</a>"
    ?>
    	</div>
	<?php $banco->close();?>
</body>
</html>