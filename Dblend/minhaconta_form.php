<?php
	$q = "select cod, nome, sobrenome, email, nascimento, telefone, cidade, uf, endereco, link from cliente where nome='" . $_SESSION['user'] . "'";
	$busca = $banco->query($q); 
	$reg = $busca->fetch_object(); 

?>
<h1>Cadastro Cliente</h1>
<form action="minhaconta.php" method="post" id="cliente">
	<table>
		<tr><td><label> Código:</label><td><input type="text" name="cod" value="<?php echo $reg->cod?>" size="3" maxlength="3" readonly="">
		<tr><td><label for="nome">Nome:</label><td><input type="text" name="nome" id="nome" value="<?php echo $reg->nome?>" size="30" maxlength="30" readonly="">
		<tr><td><label for="nome">Nome:</label><td><input type="text" name="sobrenome" id="nome" value="<?php echo $reg->sobrenome?>" size="30" maxlength="30"readonly="">
		<tr><td><label for="email">E-Mail:</label><td><input type="email" name="email" id="email" size="30" value="<?php echo $reg->email?>" maxlength="30">
		<tr><td><label for="nascimento">Nascimeto:</label><td><input type="date" name="nascimento" value="<?php echo $reg->nascimento?>" id="nascimento" size="11" maxlength="11">
		<tr><td><label for="telefone">Telefone:</label><td><input type="tel" name="telefone" value="<?php echo $reg->telefone?>" id="telefone" size="11" maxlength="10" pattern="[0-9]{10}">
		<tr><td><label for="cidade">Cidade:</label><td><input type="text" name="cidade" id="cidade" value="<?php echo $reg->cidade?>" readonly="">
 		<tr><td><label for="uf">UF:</label><td><input type="text" name="uf" value="<?php echo $reg->uf?>" id="uf" readonly="" size="2" maxlength="2">
		<tr><td><label for="endereco">Endereço | N°:</label><td><input type="text" name="endereco" value="<?php echo $reg->endereco?>" id="endereco" size="30" maxlength="30">
		<tr><td><label for="link">Rede Social:</label><td><input type="url" name="link" id="link" value="<?php echo $reg->link?>" size="60" maxlength="60">
		<tr><td><label for="senha1">Senha:</label><td><input type="password" name="senha1" id="senha1" size="10" maxlength="8">
		<tr><td><label for="senha2">Confirmar Senha:</label><td><input type="password" name="senha2" id="senha2" size="10" maxlength="8">
		<tr><td><input type="submit" value="Alterar" id="salvar">
		

	</table>
</form>