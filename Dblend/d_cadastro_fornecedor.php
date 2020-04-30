<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Fornecedor</title>
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
            }else if(!isset($_POST['nome'])){
       			require "d_cadastro_fornecedor_form.php";
			}else{			
            $nome = $_POST['nome'] ?? null;
			$telefone = $_POST['telefone'] ?? null;
			$form1 = substr($telefone, 0,2);
			$form2 = substr($telefone, 2,5);
			$form3 = substr($telefone, 7,10);
            $email = $_POST['email'] ?? null;
            $uf = $_POST['uf'] ?? null;
			$cidade = $_POST['cidade'] ?? null;
            $endereco = $_POST['endereco'] ?? null;
            
            if(empty($nome) || empty($telefone) ||  empty($email) || empty($cidade) || empty($endereco)){
                echo msg_aviso("Todos campos são obrigatórios!!");
            }else{
            $q = "INSERT INTO fornecedor (nome, telefone, email, uf, cidade, endereco) values ('$nome','($form1) $form2-$form3','$email','$uf','$cidade','$endereco')";
	
                if($banco->query($q)){
                    echo msg_sucesso("Fornecedor cadastrado com sucesso! Continuar <a class='retorno' <a href='d_cadastro_fornecedor.php'>cadastrando</a>?");
                    		
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

