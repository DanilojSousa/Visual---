<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Contas a Receber</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.css">
	 <link rel="stylesheet" href="css/estilo_financeiro.css">
	<link rel="stylesheet" type="text/css" href="css/estilorodape.css">
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
         }else if(!isset($_POST['cliente'])){
             require "cadastro_financeiro_cr_form.php";
         }else{
         $cliente= $_POST['cliente'] ?? null;
         $receita = $_POST['receita'] ?? null;
         $data = $_POST['data'] ?? null;
         $qtd = $_POST['qtd'] ?? null;
         $valor = $_POST['valor'] ?? null;
         $situacao = $_POST['situacao'] ?? null;

           if(empty($cliente) || empty($receita) ||  empty($data) || empty($qtd) || empty($valor) || empty($situacao)){
                echo msg_aviso("Todos campos são obrigatórios!!");
         }else{     
         $q = "INSERT INTO contasareceber (cliente, receita, data, qtd, valor, situacao) values ('$cliente','$receita','$data','$qtd','$valor','$situacao')";
                           
         if ($banco->query($q)){
            echo msg_sucesso("Fornecedor cadastrado com sucesso! Continuar <a class='retorno' <a href='cadastro_financeiro_cr_form.php'>cadastrando</a>?");      		
			    }else{
				echo msg_erro("Não foi Possivel efeturar o cadastro $nome. Talvez o cadastro já existe.");
            }
        }    
   } 



    echo "<br/><a class='voltar' href='financeiro.php'>VOLTAR</a>"
    ?>
    	</div>
	<?php $banco->close();?>
</body>
</html>

