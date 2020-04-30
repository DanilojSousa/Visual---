
<h1>Editar Produto</h1>


<form action="e_editar_produto.php" method="post" id="cliente">
	<table>
        <tr><td><label for="descricao">Produto:</label><td>
        <select name="descricao" id="descricao">
        <option></option>
        <optgroup label ="Acessorio">
        <?php 
        $q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
	    $busca = $banco->query($q);  
        while ($reg = $busca->fetch_object()){ 
        if($reg->categoria == 'Acessorio'){
        echo "<option value='$reg->descricao'>$reg->descricao</option>";
        }
    }
    ?>    
        </optgroup>

        <optgroup label ="Alimenticio">
        <?php 
        $q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
	    $busca = $banco->query($q); 
        while ($reg = $busca->fetch_object()){ 
        if($reg->categoria == 'Alimenticio'){
        echo "<option value='$reg->descricao'>$reg->descricao</option>";
        }
    }
    ?>    
        </optgroup>

        <optgroup label ="Bebida">
        <?php 
        $q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
	    $busca = $banco->query($q); 
        while ($reg = $busca->fetch_object()){ 
        if($reg->categoria == 'Bebida'){
        echo "<option value='$reg->descricao'>$reg->descricao</option>";
        }
    }
    ?>
             
        </optgroup>
        <optgroup label ="Creme">
        <?php 
        $q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
	    $busca = $banco->query($q); 
        while ($reg = $busca->fetch_object()){ 
        if($reg->categoria == 'Creme'){
        echo "<option value='$reg->descricao'>$reg->descricao</option>";
        }
    }
    ?>
             
        </optgroup>
        <optgroup label ="Serviço">
        <?php 
        $q = "SELECT descricao, categoria from estoque ORDER BY descricao ";
	    $busca = $banco->query($q); 
        while ($reg = $busca->fetch_object()){ 
        if($reg->categoria == 'Serviço'){
        echo "<option value='$reg->descricao'>$reg->descricao</option>";
        }
    }
    ?>
     </optgroup>
        </select>
    
      
        <td><input type="button" value="abrir" name="abrir" onclick ="dados()">

        <div id="resultado">
        </div>

       
        
       
        <?php 
        $opcao = $_POST['descricao'] ?? null;  
        $q = "SELECT descricao, categoria, qtd, valor, foto from estoque ORDER BY descricao "; 
        $busca = $banco->query($q); 
        while ($reg = $busca->fetch_object()){
            if($opcao==$reg->descricao){
            $descricao = $reg->descricao;
            }}
        ?>
    <script>
    var resultado = document.querySelector('div#resultado')
         function dados(){
            return resultado.innerHTML = `<label for='descricao'>Descrição:</label> <input type='text' value="${<?php echo $descricao ?>}"name='descricao' id='descricao' size='3' maxlength='3'>`;
        }
    </script>
        
  
	</table>
</form>
	
