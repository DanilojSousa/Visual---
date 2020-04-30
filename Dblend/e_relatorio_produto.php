<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Relatório </title>
	<link rel="stylesheet" type="text/css" href="css/estilorelatorio.css">
	<link rel="stylesheet" href="css/estilo_relatorio_financeiro.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	  rel="stylesheet">

</head>
<body>

        <?php
        require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
        $ordem = $_GET['o'] ?? "e";
        $chave = $_GET['buscar'] ?? "";
        ?>
        <div id="corpo2">
		<h1>Relatório</h1>
		
		<div id="dados1">
        <form id="forbuscar" action="e_relatorio_produto.php" method="get">
        Ordenado por: 
		<a href="e_relatorio_produto.php?o=t&buscar=<?php echo $chave; ?>"> Categoria</a> |
		<a href="e_relatorio_produto.php?o=r&buscar=<?php echo $chave; ?>"> Valor</a> |
		<a href="e_relatorio_produto.php?o=e&buscar=<?php echo $chave; ?>"> Crescente</a> | 
		<a href="e_relatorio_produto.php?o=d&buscar=<?php echo $chave; ?>"> Decrescente</a> |
		<a href="e_relatorio_produto.php"> Mostrar Todos</a>

		Buscar: <input type="text" name="buscar" id="buscar" size="10"mmaxlength="40"><input type="submit" name="" value="OK">
        </form>
        </div>
        <section>
        <div id="tabela">
        <?php
	    
	
		$q = "SELECT descricao, categoria, qtd, valor from estoque ";
			if(!empty($chave)){
			$q .= " WHERE descicao like '%$chave%' OR categoria like '%$chave%' OR valor like '%$chave%'";
			}
		switch ($ordem) {
			case "t":
				    $q .= "ORDER BY descricao";
				break;
				case "r": 
					$q .= "ORDER BY categoria";
				break;
				case "e": 
					$q .= "ORDER BY descricao";
				break;
				case "d":
					$q .= "ORDER BY descricao DESC";
				break;
			default:
				    $q .= "ORDER BY descricao";
				break;
		}
	
		
		$busca = $banco->query($q);	
		echo "<table id='tabela1'>";
		echo "<tr class='titulo'><td>Descrição<td>Categoria-<td>QTD<td>Valor";
		while($reg = $busca->fetch_object()){
			echo "<tr><td class='lm'>$reg->descricao<td class='lm'>$reg->categoria<td class='lm'>$reg->qtd<td class='lm'>$reg->valor";
		}
        echo "</table>";

        echo " <br/><br/>";
		echo "<a class='voltar' href='relatorio.php'>VOLTAR</a>"
         ?>
         </div>
        </section>
        </body>
