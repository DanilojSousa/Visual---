<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Relatório </title>
	<link rel="stylesheet" href="css/estilorelatorio.css">
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
		<header>
		
		<div id="dados1">
		
		<form id="forbuscar" action="d_relatorio_fornecedor.php" method="get">
		Ordenado por: 
		<a href="d_relatorio_fornecedor.php?o=t&buscar=<?php echo $chave; ?>"> Nome</a> |
		<a href="d_relatorio_fornecedor.php?o=e&buscar=<?php echo $chave; ?>"> Crescente</a> | 
		<a href="d_relatorio_fornecedor.php?o=d&buscar=<?php echo $chave; ?>"> Decrescente</a> |
		<a href="d_relatorio_fornecedor.php"> Mostrar Todos</a>

		Buscar: <input type="text" name="buscar" id="buscar" size="10"mmaxlength="40"><input type="submit" name="" value="OK">
		</form>
		</div>
	</header>
	<section>
	<div id="tabela">
	<?php
	
	
		$q = "SELECT nome, telefone, email, uf, cidade, endereco from fornecedor ";
			if(!empty($chave)){
			$q .= " WHERE nome like '%$chave%' OR email like '%$chave%' OR cidade like '%$chave%' OR uf like '%$chave%' ";
			}
		switch ($ordem) {
				case "e": 
					$q .= "ORDER BY nome";
				break;
				case "d":
					$q .= "ORDER BY nome DESC";
				break;
			default:
				$q .= "ORDER BY nome";
				break;
		}
	
		
		$busca = $banco->query($q);	
		echo "<table id='tabela1'>";
		echo "<tr class='titulo'><td>Nome<td>Telefone<td>E-Mail<td>UF<td>Cidade<td>Endereço";
		while($reg = $busca->fetch_object()){
			echo "<tr><td class='lm'>$reg->nome<td class='lm'>$reg->telefone<td class='lm'>$reg->email<td class='tm'>$reg->uf<td class='lm'>$reg->cidade<td class='lm'>$reg->endereco";	
		}	
		echo "</table>";
	
		echo " <br/><br/>";
		echo "<a class='voltar' href='relatorio.php'>VOLTAR</a>"
		?>
		
	</div>
	<?php $banco->close();?>
</body>
</html>