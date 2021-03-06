<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Contas a Pagar</title>
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">
	<link href="https://fonts.googleapis.com/icon?family=Material
+Icons"
      rel="stylesheet">
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";
	
	$q = "SELECT descricao, categoria from estoque ORDER BY descricao DESC ";
	$p = "SELECT nome from fornecedor ORDER BY nome DESC ";
	$busca = $banco->query($q);
	$buscas = $banco->query($p);
	
?>
<h1>Contas a pagar</h1>
		<form action="c_cadastro_financeiro_despesa.php" method="post">
			<table>
				<tr><td><labeL for="fornecedor">Fornecedor: </label><td><select type="text" name="fornecedor" id="fornecedor" required>
					<?php
				echo "<option></option>";
				while($regs = $buscas->fetch_object()){
				echo "<option>$regs->nome</option>";
				}
				?>		
				</select>
				<tr><td><Label for="despesa">Produto:</Label><td>
				<select name='despesa' id='despesa' required>
				<?php

				echo "<option></option>";
				while($reg = $busca->fetch_object()){
				echo "<optgroup label='$reg->categoria'><option>$reg->descricao</option></optgroup>";
				}
				?>		
				</select>
		        <tr><td><label for="qtd">QTD:</label><td><input type="number" name="qtd" id="qtd" size="11" required="">
                <tr><td><label for="valor">Valor: </label><td><input type="text" name="valor" id="valor"  maxlength="6" size="6" requered="" placeholder="R$">
                <tr><td><label for="situacao">Situação:</label>
				<tr><td><td><input type="radio" name="situacao" id="pago" value="pago" size="10"> Pago
                <tr><td><td><input type="radio" name="situacao" id="pendente" value="pendente" size="10" onclick="clicar()"> Pendente
				<p id="data"></P>
				<script>
					function clicar(){
						let pendente = document.querySelector('p#data')
						return pendente.innerHTML = "<label for='data'>Data de Pagamento: <input type='date' name='data' id='data' size='11' maxlength='11'></label>"
					}
				</script>
				
				
		        <tr><td><input type="submit" value="Salvar" id="salvar">
			</table>
		</form>
			
</body>
</html>
