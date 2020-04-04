<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Relatório </title>
	<link rel="stylesheet" type="text/css" href="css/estilo_relatorio.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.css">
	<link rel="stylesheet" type="text/css" href="css/estilorodape.css">
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
		$tipo = $_POST['opcao'] ?? null;
	
		
			
		
	?>
	<div id="corpo1">
		<h1>Relatório</h1>
		<header>
		<div id="tipo">
			<form id="forbuscar" action="user_relatorio_financeiro.php" method="post">
			<input type="submit" value="receita" name="opcao">
			<input type="submit" value="despesa" name="opcao">
		</div>
		<div id="dados">
		
		<form id="forbuscar" action="user_relatorio_cliente.php" method="get">
		Ordenado por: 
		<a href="user_relatorio_cliente.php?o=t&buscar=<?php echo $chave; ?>"> Tipo</a> |
		<a href="user_relatorio_cliente.php?o=e&buscar=<?php echo $chave; ?>"> Crescente</a> | 
		<a href="user_relatorio_cliente.php?o=d&buscar=<?php echo $chave; ?>"> Decrescente</a> |
		<a href="user_relatorio_cliente.php"> Mostrar Todos</a>

		Buscar: <input type="text" name="buscar" id="buscar" size="10"mmaxlength="40"><input type="submit" name="" value="OK">
		</form>
		</div>
	</header>
	<section>
	<div id="tabela">
	<?php
	
		$q = "SELECT nome, sobrenome, email, DATE_FORMAT(nascimento,'%d/%m/%Y')nascimento, telefone, cidade, uf, endereco, link, tipo from 
cliente ";
			if(!empty($chave)){
			$q .= " WHERE nome like '%$chave%' OR tipo like '%$chave%' OR cidade like '%$chave%' OR uf like '%$chave%' ";
			}
		switch ($ordem) {
			case "t":
				$q .= "ORDER BY tipo";
				break;
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
		if($tipo == 'receita'){
		echo "<table id='tabela'>";
		echo "<tr class='titulo'><td>Nome<td>E-Mail<td>Data de Nascimento<td>Telefone<td>Cidade<td>UF<td>Endereço<td>Link<td>tipo";
		while($reg = $busca->fetch_object()){
			echo "<tr><td class='lm'>$reg->nome $reg->sobrenome<td>class='lm'>$reg->email<td>class='lm'>$reg->nascimento<td>class='lm'>$reg->telefone<td class='lm'>$reg->cidade<td class='tm'>$reg->uf<td class='lm'>$reg->endereco<td>class='lm'>$reg->link<td class='lm'>$reg->tipo<br/>";	
			
		}	
		echo "</table>";
		
	} if($tipo == 'despesa'){
		echo "<table id='tabela'>";
		echo "<tr class='titulo'><td>Nome<td>E-Mail<td>Data de Nascimento<td>Telefone<td>Cidade<td>UF<td>Endereço<td>tipo";
		while($reg = $busca->fetch_object()){
			echo "<tr><td class='lm'>$reg->nome $reg->sobrenome<td class='lm'>$reg->email<td>class='lm'>$reg->nascimento<td>class='lm'>$reg->telefone<td>class='lm'>$reg->cidade<td class='tm'>$reg->uf<td class='lm'>$reg->endereco<td class='lm'>$reg->tipo<br/>";	
		}	
		echo "</table>";
		
	}


	
		echo " <br/><br/>";
		echo voltar(); 
		?>
		
	</div>
	<?php $banco->close();?>
</body>
</html>