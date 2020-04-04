
<h1>Cadastro Produto</h1>
<form action="user_cadastro_produto.php" method="post" id="cliente">
	<table>
		<tr><td><label for="descricao">Descrição:</label><td><input type="text" name="descricao" id="descricao" size="50" maxlength="50" required="">
		<tr><td><label for="categoria">Categoria:</label><td><select name="categoria" id="categoria" required="">
		<option selected="">Selecione uma Categoria</option>
		<option value="Bebida">Bebida</option>
		<option value="Serviço">Serviço</option>
		<option value="Creme">Creme</option>
		<option value="Acessorio">Acessório</option>
		<option value="Alimenticio">Alimenticio</option>
		</select>
		<tr><td><label for="qtd">QTD:</label><td><input type="number" name="qtd" id="qtd" required="">
		<tr><td><label for="preco">Preço:</label><td><input type="text" name="valor" id="valor" size="11" maxlength="5" requered="" placeholder="R$">
		<tr><td><label for="foto">Imagem:</label><td><input type="file" name="foto" id="foto" multiple="">
		<tr><td><input type="submit" value="Cadastrar" id="salvar">
		

	</table>
</form>