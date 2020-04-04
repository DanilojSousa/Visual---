<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Contas a Receber</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="estilonotificacao.
css">
	<link rel="stylesheet" type="text/css" href="css/estilorodape.
css">
	<link href="https://fonts.googleapis.com/icon?family=Material
+Icons"
      rel="stylesheet">
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";

	$q = "SELECT descricao, categoria from estoque ORDER BY descricao DESC";
	$busca = $banco->query($q);
	$p = "SELECT nome, sobrenome from cliente ORDER BY nome DESC";
	$buscas = $banco->query($p);
	
?>
<h1>Contas a Receber</h1>
		<form action="user_cadastro_financeiro_receita.php" method="post">
			<table>
				<tr><td><labeL for="cliente">Cliente: </label><td><select type="text" name="cliente" id="cliente" required>
			<?php
				echo "<option></option>";
				while($regs = $buscas->fetch_object()){
				echo "<option>$regs->nome $regs->sobrenome</option>";
				}
			?>		
			    <tr><td><Label for="receita">Produto:</Label><td>
				<select name='receita' id='receita' required>
				<?php

				echo "<option></option>";
				while($reg = $busca->fetch_object()){
				echo "<optgroup label='$reg->categoria'><option>$reg->descricao</option></optgroup>";
				}
				?>		
				</select>
		        <tr><td><label for="data">Data:</label><td><input type="date" name="data" id="data" size="11" maxlength="11" required="">*
		        <tr><td><label for="qtd">QTD:</label><td><input type="number" name="qtd" id="qtd" size="11" required="">*
                <tr><td><label for="valor">Valor: </label><td><input type="text" name="valor" id="valor" size="6" maxlength="6" requered="" placeholder="R$">
                <tr><td><label for="situacao">Situação:</label>
                <tr><td><td><input type="radio" name="situacao" id="pago" value="pago" size="10"> Pago
                <tr><td><td><input type="radio" name="situacao" id="pendente" value="pendente" size="10"> Pendente
		        <tr><td><input type="submit" value="Salvar" id="salvar">
		

	</table>
</form>
</body>
</html>