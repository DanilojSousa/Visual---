<h1>Cadastro Fornecedor</h1>
<form action="d_cadastro_fornecedor.php" method="post" id="cliente">
		<table>
		<tr><td><Label for="nome">Nome</Label><td><input type="text" name="nome" id="nome" size="40" 
maxlength="40" required="">*
        <tr><td><label for="telefone">Telefone:</label><td><input type="tel" name="telefone" id="telefone" 
size="11" maxlength="11" pattern="[0-9]{11}">
		<tr><td><label for="email">E-Mail:</label><td><input type="email" name="email" id="email" size="30" 
maxlength="30" placeholder="Digite seu e-mail" required="">*
        <tr><td><label for="uf">UF:</label><td><select name="uf" id="uf" readonly>
<option value="sc">Santa Catarina</option> 
</select>
		<tr><td><label for="cidade">Cidade:</label><td><select name="cidade" id="cidade" required="">*
		<option value="Palhoça" selected="">Palhoça</option>
		<option value="São José">São José</option>
		<option value="Florianópolis">Florianópolis</option>
		<option value="Paulo lopes">Paulo Lopes</option>
		<option value="Garopaba">Garopaba</option>
		<option value="Biguaçú">Biguaçú</option>
		<option value="Governador Celso Ramos">Governador Celso Ramos</option>
		</select>		
		<tr><td><label for="endereco">Endereço | N°:</label><td><input type="text" name="endereco" id="endereco" 
size="30" maxlength="30" placeholder="Digite seu endereço e numero" required="">
		<tr><td><input type="submit" value="Salvar" id="salvar">
		

	</table>
	
</form>