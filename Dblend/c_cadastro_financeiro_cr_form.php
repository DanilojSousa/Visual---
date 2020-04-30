<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Contas a Receber</title>
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
	
	$q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
	$busca = $banco->query($q);
	$p = "SELECT nome, sobrenome from cliente ORDER BY nome ";
	$buscas = $banco->query($p);
	
?>
<h1>Contas a Receber</h1>
		<form action="c_cadastro_financeiro_receita.php" method="post">
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
				<option></option>
				<optgroup label="Acessório"></label>
				
						<?php 
						//select para Acessoio
						$q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
						$busca = $banco->query($q);
						while($reg = $busca->fetch_object()){
						if($reg->categoria == 'Acessorio'){
						echo "<option value='$reg->descricao'>$reg->descricao</option>";}} ?>
				</optgroup>
				<optgroup label="Alimenticio"></label>
						<?php 
						//select para Alimenticio
						$q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
						$busca = $banco->query($q);
						while($reg = $busca->fetch_object()){
						if($reg->categoria == 'Alimenticio'){
						echo "<option value='$reg->descricao'>$reg->descricao</option>";}} ?>
				</optgroup>
				<optgroup label="Bebida"></label>
						<?php 
						//select para Bebida
						$q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
						$busca = $banco->query($q);
						while($reg = $busca->fetch_object()){
						if($reg->categoria == 'Bebida'){
						echo "<option value='$reg->descricao'>$reg->descricao</option>";}} ?>
				</optgroup>
				<optgroup label="Creme"></label>
						<?php 
						//select para Creme
						$q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
						$busca = $banco->query($q);
						while($reg = $busca->fetch_object()){
						if($reg->categoria == 'Creme'){
						echo "<option value='$reg->descricao'>$reg->descricao</option>";}} ?>
				</optgroup>
				<optgroup label="Serviço"></label>
						<?php 
						//select para Serviço
						$q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
						$busca = $banco->query($q);
						while($reg = $busca->fetch_object()){
						if($reg->categoria == 'Serviço'){
						echo "<option value='$reg->descricao'>$reg->descricao</option>";}} ?>
				</optgroup>
				
			
				</select>
			
				
					
		        <tr><td><label for="qtd">QTD:</label><td><input type="number" name="qtd" id="qtd" size="11" required="">*
                <tr><td><label for="valor">Valor: </label><td><input type="text" name="valor" id="valor" size="6" maxlength="6" requered="" placeholder="R$">
                <tr><td><label for="situacao">Situação:</label>
                <tr><td><td><input type="radio" name="situacao" id="pago" value="pago" size="10"> Pago
                <tr><td><td><input type="radio" name="situacao" id="pendente" value="pendente" size="10" onclick="clicar()"> Pendente
				<p id="data"></P>
				<script>
					function clicar(){
						let pendente = document.querySelector('p#data')
						return pendente.innerHTML = "<label for='data'>Data a Receber: <input type='date' name='data' id='data' size='11' maxlength='11'></label>"
					}
				</script>
		        <tr><td><input type="submit" value="Salvar" id="salvar">
		

	</table>
</form>
</body>
</html>