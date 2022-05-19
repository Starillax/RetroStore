<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}
?>

<?php
if ($form_tipo == 'insert') {
?>

<form action="insert_categoria" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome">
          </div>
        </div>
      
        <button type="submit" class="btn btn-danger" name="submit">Registrar</button>

        <div id="categorias-link" class="lead">
          <a href="<?php echo base_url()?>/select_categoria" class="text-danger">Visualizar categorias cadastradas</a>
        </div>
</form> 

<?php
} else if ($form_tipo == 'update') {
?>

<form action="/edit_categoria/<?php echo $categorias['id']?>" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome" value="<?php echo $categorias['nome']?>">
          </div>
        </div>
      
        <button type="submit" class="btn btn-danger" name="submit">Editar</button>

        <div id="categorias-link" class="lead">
          <a href="<?php echo base_url()?>/select_categoria" class="text-danger">Visualizar categorias cadastradas</a>
        </div>
</form>

<?php
} 
?>