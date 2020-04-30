<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Contas a Receber</title>
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
         }else if(!isset($_POST['cliente'])){
             require "c_cadastro_financeiro_cr_form.php";
         }else{
         $cliente= $_POST['cliente'] ?? null;
         $receita = $_POST['receita'] ?? null;
         if(isset($_POST['data'])){
            $data = date('d/m/Y',  strtotime($_POST['data'] ?? null));
          }else{
           $data ='';
          }
          $datai =  new DateTime(); 
          $datainclusao = DATE_FORMAT($datai,'d/m/Y');
         $qtd = $_POST['qtd'] ?? null;
         $valor = $_POST['valor'] ?? null;
         $situacao = $_POST['situacao'] ?? null;
		   


           if(empty($cliente) || empty($receita) || empty($qtd) || empty($valor) || empty($situacao)){
                echo msg_aviso("Todos campos são obrigatórios!!");
         }else{  
            
         $q = "INSERT INTO contasareceber (cliente, receita, inclusao_data, data_recebimento, qtd, valor, situacao) values ('$cliente','$receita','$datainclusao','$data','$qtd','$valor','$situacao')";
                           
         if ($banco->query($q)){
            echo msg_sucesso("Fornecedor cadastrado com sucesso! Continuar <a class='retorno' <a href='c_cadastro_financeiro_receita.php'>cadastrando</a>?");      		
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

