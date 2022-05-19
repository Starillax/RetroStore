<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}
?>

<style>
#hidden_div {
  display: none;
}
</style>

<script>
function showDiv(divId, element) {
  document.getElementById(divId).style.display = element.value == 'jogo' ? 'block' : 'none';
}
</script>

<?php
 if ($form_tipo == 'insert') {
?>

<form action="insert_produto" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <select class="form-control" id="selectTypeLabel" name="tipo" onchange="showDiv('hidden_div', this)">
              <option value="jogo">Este produto é um jogo</option>
              <option value="outro" selected>Este produto não é um jogo</option>
            </select>
          </div>
        </div>
        <div class="form-group" id="hidden_div">
          <div class="col-md-4 mb-3">
            <label for="selectCategoryLabel">Categoria:</label>
            <select class="form-control" id="selectCategoryLabel" name="categoria">
              <?php
                foreach ($categorias as $categoria) {
                  echo "<option value=" . $categoria['id'] . ">" . $categoria['nome'] . "</option>";
                };
              ?>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="consoleInputLabel">Console(s):</label>
            <input type="text" class="form-control" id="consoleInputLabel" name="console">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="quantidadeInputLabel">Quantidade disponível:</label>
            <input type="number" class="form-control" id="quantidadeInputLabel" name="quantidade">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="precoInputLabel">Preço:</label>
            <input type="number" class="form-control" id="precoInputLabel" name="preco">
          </div>
        </div>

        <div id="category-link" class="lead">
          <a href="<?php echo base_url()?>/insert_categoria_form" class="text-danger">Deseja cadastrar uma nova categoria de jogos?</a>
        </div>
      
        <button type="submit" class="btn btn-danger" name="submit">Registrar</button>
</form>

<?php
 } else if ($form_tipo == 'update') {
   if ($produtos['tipo'] == 'jogo') {
?>

<form action="/edit_produto/<?php echo $produtos['id']?>" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome" value="<?php echo $produtos['nome']?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <select class="form-control" id="selectTypeLabel" name="tipo" readonly>
              <option value="jogo" selected>Este produto é um jogo</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="selectCategoryLabel">Categoria:</label>
            <select class="form-control" id="selectCategoryLabel" name="categoria">
              <?php
                foreach ($categorias as $categoria) {
                  if ($categoria['id'] == $produtos['categoria']) {
                    echo "<option value=" . $categoria['id'] . " selected>" . $categoria['nome'] . "</option>";
                  } else {
                  echo "<option value=" . $categoria['id'] . ">" . $categoria['nome'] . "</option>";
                  }
                };
              ?>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="consoleInputLabel">Console(s):</label>
            <input type="text" class="form-control" id="consoleInputLabel" name="console" value="<?php echo $produtos['console']?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="quantidadeInputLabel">Quantidade disponível:</label>
            <input type="number" class="form-control" id="quantidadeInputLabel" name="quantidade" value="<?php echo $produtos['quantidade']?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="precoInputLabel">Preço:</label>
            <input type="number" class="form-control" id="precoInputLabel" name="preco" value="<?php echo $produtos['preco']?>">
          </div>
        </div>

        <div id="category-link" class="lead">
          <a href="<?php echo base_url()?>/insert_categoria_form" class="text-danger">Deseja cadastrar uma nova categoria de jogos?</a>
        </div>
      
        <button type="submit" class="btn btn-danger" name="submit">Registrar</button>
</form>

<?php
   } else if ($produtos['tipo'] == 'outro') {
?>

<form action="/edit_produto/<?php echo $produtos['id']?>" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome" value="<?php echo $produtos['nome']?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <select class="form-control" id="selectTypeLabel" name="tipo" readonly>
              <option value="outro" selected>Este produto não é um jogo</option>
            </select>
          </div>
        </div>
        <div class="form-group" id="hidden_div">
          <div class="col-md-4 mb-3">
            <label for="selectCategoryLabel">Categoria:</label>
            <select class="form-control" id="selectCategoryLabel" name="categoria">
              <?php
                foreach ($categorias as $categoria) {
                  if ($categoria['id'] == $produtos['categoria']) {
                    echo "<option value=" . $categoria['id'] . " selected>" . $categoria['nome'] . "</option>";
                  } else {
                  echo "<option value=" . $categoria['id'] . ">" . $categoria['nome'] . "</option>";
                  }
                };
              ?>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="consoleInputLabel">Console(s):</label>
            <input type="text" class="form-control" id="consoleInputLabel" name="console" value="<?php echo $produtos['console']?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="quantidadeInputLabel">Quantidade disponível:</label>
            <input type="number" class="form-control" id="quantidadeInputLabel" name="quantidade" value="<?php echo $produtos['quantidade']?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="precoInputLabel">Preço:</label>
            <input type="number" class="form-control" id="precoInputLabel" name="preco" value="<?php echo $produtos['preco']?>">
          </div>
        </div>

        <div id="category-link" class="lead">
          <a href="<?php echo base_url()?>/insert_categoria_form" class="text-danger">Deseja cadastrar uma nova categoria de jogos?</a>
        </div>
      
        <button type="submit" class="btn btn-danger" name="submit">Registrar</button>
</form>

<?php
   }
 }
?>