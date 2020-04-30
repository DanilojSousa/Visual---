<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Relatório </title>
	<link rel="stylesheet" href="css/estilorelatoriord.css">
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
        <form id="forbuscar" action="c_relatorio_financeiro_receita.php" method="get">
        Ordenado por: 
		<a href="c_relatorio_financeiro_receita.php?o=t&buscar=<?php echo $chave; ?>"> Situacao</a> |
		<a href="c_relatorio_financeiro_receita.php?o=r&buscar=<?php echo $chave; ?>"> Receita</a> |
		<a href="c_relatorio_financeiro_receita.php?o=m&buscar=<?php echo $chave; ?>"> Data Entrada</a> |  
		<a href="c_relatorio_financeiro_receita.php?o=n&buscar=<?php echo $chave; ?>"> Data Vencimento</a> | 
		<a href="c_relatorio_financeiro_receita.php?o=e&buscar=<?php echo $chave; ?>"> Crescente</a> | 
		<a href="c_relatorio_financeiro_receita.php?o=d&buscar=<?php echo $chave; ?>"> Decrescente</a> |
		<a href="c_relatorio_financeiro_receita.php"> Mostrar Todos</a>

		Buscar: <input type="text" name="buscar" id="buscar" size="10"mmaxlength="40"><input type="submit" name="" value="OK">
        </form>
        </div>
        <section>
        <div id="tabela">
		
        <?php
	   
	
		$q = "SELECT cliente, receita, inclusao_data, data_recebimento, qtd, valor, situacao from contasareceber ";
			if(!empty($chave)){
			$q .= " WHERE cliente like '%$chave%' OR receita like '%$chave%' OR inclusao_data like '%$chave%' OR data_recebimento like '%$chave%' OR situacao like '%$chave%' ";
			}
		switch ($ordem) {
			case "t":
				    $q .= "ORDER BY situacao";
				break;
				case "r": 
					$q .= "ORDER BY receita";
				break;
				case "m": 
					$q .= "ORDER BY inclusao_data";
				break;
				case "n": 
					$q .= "ORDER BY data_recebimento";
				break;
				case "e": 
					$q .= "ORDER BY cliente";
				break;
				case "d":
					$q .= "ORDER BY cliente DESC";
				break;
			default:
				    $q .= "ORDER BY cliente";
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
		echo "<tr class='titulo'><td>Cliente<td>Receita<td>Data Entrada<td>Vencimento<td>QTD<td>Valor<td>Situação<td>Prazo";
		while($reg = $busca->fetch_object()){
			echo "<tr><td class='lm'>$reg->cliente<td class='lm'>$reg->receita<td class='lm'>$reg->inclusao_data<td class='lm'>$reg->data_recebimento<td class='lm'>$reg->qtd<td class='lm'>R$ $reg->valor";
			if($reg->situacao == 'pendente'){
				echo"<td class='pm'>$reg->situacao";	
			}else{
				echo"<td class='sm'>$reg->situacao";
			}
			
			if($reg->situacao == 'pendente'){
			if($datainclusao == $reg->data_recebimento || $datainclusao > $reg->data_recebimento){
						
			echo "<td class='pm'> Expirou";
			
			}else{
				echo "<td class='lm'>";
			}
		}else{
			echo "<td class='lm'>";
		}
	}
				
		
			
			
        echo "</table>";

        echo " <br/><br/>";
		echo "<a class='voltar' href='relatorio.php'>VOLTAR</a>"
		 ?>

		 
         </div>
        </section>
		<script src="script/alerta.js"></script>
        </body>
