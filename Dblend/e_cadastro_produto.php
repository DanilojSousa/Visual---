<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Produto</title>
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">
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
            }else if(!isset($_POST['descricao'])){
            	require "e_cadastro_produto_form.php";
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
	            echo msg_sucesso("Produto cadastrado com sucesso! Continuar <a class='retorno' <a href='e_cadastro_produto.php'>cadastrando</a>?");       		
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