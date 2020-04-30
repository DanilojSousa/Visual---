<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Editar Produto</title>
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
				require "e_editar_produto_form.php";
            }else{ 
		
		    $descricao = $_POST['descricao'] ?? null;
		    $categoria = $_POST['categoria'] ?? null;
		    $qtd = $_POST['qtd'] ?? null;
            $valor = $_POST['valor'] ?? null;
      
			
		   $q = "UPDATE estoque SET descricao = '$descricao', categoria = '$categoria', qtd = '$qtd', valor = '$valor' ";
		
		   if($banco->query($q)){
	           echo msg_sucesso("Produto alterado com sucesso! Continuar <a class='retorno' <a href='e_editar_produto.php'>Editando</a>?");       		
			}
		}	
          
   
    



    echo "<a class='voltar' href='cadastro.php'>VOLTAR</a>"
    ?>
    	</div>
	<?php $banco->close();?>
	<script src="e_editar_produto_form.php"></script>
</body>
</html>