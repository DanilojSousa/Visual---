<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Relatório </title>
	<link rel="stylesheet" type="text/css" href="css/estilorelatoriord.css">
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
        <div id="corpo1">
		<h1>Relatório</h1>
		
		<div id="dados">
        <form id="forbuscar" action="c_relatorio_financeiro_despesa.php" method="get">
        Ordenado por: 
		<a href="c_relatorio_financeiro_despesa.php?o=t&buscar=<?php echo $chave; ?>"> Situacao</a> |
		<a href="c_relatorio_financeiro_despesa.php?o=r&buscar=<?php echo $chave; ?>"> Despesa</a> |
		<a href="c_relatorio_financeiro_despesa.php?o=m&buscar=<?php echo $chave; ?>"> Data</a> |  
		<a href="c_relatorio_financeiro_despesa.php?o=e&buscar=<?php echo $chave; ?>"> Crescente</a> | 
		<a href="c_relatorio_financeiro_despesa.php?o=d&buscar=<?php echo $chave; ?>"> Decrescente</a> |
		<a href="c_relatorio_financeiro_despesa.php"> Mostrar Todos</a>

		Buscar: <input type="text" name="buscar" id="buscar" size="10"mmaxlength="40"><input type="submit" name="" value="OK">
        </form>
        </div>
        <section>
        <div id="tabela">
        <?php
	    
	
		$q = "SELECT fornecedor, despesa, inclusao_data, data_pagamento, qtd, valor, situacao from contasapagar ";
			if(!empty($chave)){
			$q .= " WHERE fornecedor like '%$chave%' OR despesa like '%$chave%' OR data like '%$chave%' OR situacao like '%$chave%' ";
			}
		switch ($ordem) {
			case "t":
				    $q .= "ORDER BY situacao";
				break;
				case "r": 
					$q .= "ORDER BY despesa";
				break;
				case "m": 
					$q .= "ORDER BY data";
				break;
				case "e": 
					$q .= "ORDER BY fornecedor";
				break;
				case "d":
					$q .= "ORDER BY fornecedor DESC";
				break;
			default:
				    $q .= "ORDER BY fornecedor";
				break;
		}
		
		$busca = $banco->query($q);	
		$tot = 0;
		$tot1= 0;
		$tot2 = 0;
		while($reg = $busca->fetch_object()){
		$res = $reg->qtd * $reg->valor;
		$tot = $tot + $res;
		if($reg->situacao == 'pendente'){
		$res1 = $reg->qtd * $reg->valor;
		$tot1 = $tot1 + $res1;
		}
		if($reg->situacao == 'pago'){
		$res2 = $reg->qtd * $reg->valor;
		$tot2 = $tot1 + $res2;
		}
		}
		echo "<table>";
		echo "<tr><td class='pago'>Pago:  <td class='pago1'>R$ ". number_format($tot2,2) ."  <br/>";
		echo "<tr><td class='pendente'>Pendente:  <td class='pendente1'>R$ ". number_format($tot1,2) ." <br/>";
		echo "<tr><td class='total'>Total: <td class='total1'>R$ ". number_format($tot,2) ."";
		echo "</table>";

		$busca = $banco->query($q);	
		$datai =  new DateTime(); 
        $datainclusao = DATE_FORMAT($datai,'d/m/Y');

		echo "<table id='tabela1'>";
		echo "<tr class='titulo'><td>Fornecedor<td>Despesa<td>Data do cadastro<td>Data de Pagamento<td>QTD<td>Valor<td>Situação<td>Prazo";
		while($reg = $busca->fetch_object()){
		echo"<tr><td class='lm'>$reg->fornecedor<td class='lm'>$reg->despesa<td class='lm'>$reg->inclusao_data<td class='lm'>$reg->data_pagamento<td class='lm'>$reg->qtd<td class='lm'>$reg->valor";
			if($reg->situacao == 'pendente'){
				echo"<td class='pm'>$reg->situacao";	
			}else{
				echo"<td class='sm'>$reg->situacao";
			}
			echo "<td class='pm'>";
			if($reg->situacao == 'pendente'){
			if($datainclusao = $reg->data_pagamento || $datainclusao > $reg->data_pagamento){
						
			echo "Expirou";
			
			}else{
				echo "<td class='lm'>";
			}
		}
	}
		
		
        echo "</table>";

        echo " <br/><br/>";
		echo "<a class='voltar' href='relatorio.php'>VOLTAR</a>"
         ?>
         </div>
        </section>
        </body>
