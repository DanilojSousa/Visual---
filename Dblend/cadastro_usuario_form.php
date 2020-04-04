<h1>Cadastro de Usuario</h1>
		<form action="user_cadastro_usuario.php" method="post">
	<table>
		<tr><td><Label for="usuario">Nome</Label><td><input type="text" name="nome" id="usuario" size="10" maxlength="10" required="">*
		<tr><td><label for="nome">Sobre nome:</label><td><input type="text" name="sobrenome" id="nome" size="30" maxlength="30" placeholder="Digite seu nome" required="">*
		<tr><td><label for="email">E-Mail:</label><td><input type="email" name="email" id="email" size="30" maxlength="30" placeholder="Digite seu e-mail" required="">*
		<tr><td><label for="nascimento">Nascimeto:</label><td><input type="date" name="nascimento" id="nascimento" size="11" maxlength="11" requeride>*
		<tr><td><label for="telefone">Telefone:</label><td><input type="tel" name="telefone" id="telefone" size="11" maxlength="11" pattern="[0-9]{11}">
		<tr><td><label for="cidade">Cidade:</label><td><select name="cidade" id="cidade" required="">*
		<option value="Palhoça" selected="">Palhoça</option>
		<option value="São José">São José</option>
		<option value="Florianópolis">Florianópolis</option>
		<option value="Paulo lopes">Paulo Lopes</option>
		<option value="Garopaba">Garopaba</option>
		<option value="Biguaçú">Biguaçú</option>
		<option value="Governador Celso Ramos">Governador Celso Ramos</option>
		</select>
		<tr><td><label for="uf">UF:</label><td><select name="uf" id="uf" readonly>
		<option value="sc">Santa Catarina</option> 
	 	</select>
		<tr><td><label for="endereco">Endereço | N°:</label><td><input type="text" name="endereco" id="endereco" size="30" maxlength="30" placeholder="Digite seu endereço e numero" required="">*
		<tr><td><label for="link">Rede Social:</label><td><input type="url" name="link" id="link" size="60" maxlength="60">
		<tr><td><label for="tipo">Tipo:</label><td><select name="tipo" required="">
			<option value="admin" selected="">Administrador</option>
			<option value="editor">Assistente</option>
		</select>
		<tr><td><label for="senha1">Senha:</label><td><input type="password" name="senha1" id="senha1" size="10" maxlength="8" required="">*
		<tr><td><label for="senha2">Confirmar Senha:</label><td><input type="password" name="senha2" id="senha2" size="10" maxlength="8" required="">*
		<tr><td><input type="submit" value="Salvar" id="salvar">
		

	
			</table>
			
		</form>