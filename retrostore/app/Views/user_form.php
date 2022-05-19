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

<form action="insert_user" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="emailInputLabel">E-mail:</label>
            <input type="email" class="form-control" id="emailInputLabel" name = "email">
          </div>
        </div>
      
        <button type="submit" class="btn btn-danger" name="submit">Cadastrar-se no Sistema</button>

        <div id="users-link" class="lead">
          <a href="<?php echo base_url()?>/select_user" class="text-danger">Visualizar usuários cadastrados</a>
        </div>
</form> 

<?php
} else if ($form_tipo == 'update') {
?>

<form action="/edit_user/<?php echo $usuarios['id']?>" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome" value="<?php echo $usuarios['nome']?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="emailInputLabel">E-mail:</label>
            <input type="email" class="form-control" id="emailInputLabel" name="email" value="<?php echo $usuarios['email']?>">
          </div>
        </div>
      
        <button type="submit" class="btn btn-danger" name="submit">Editar usuário</button>

        <div id="users-link" class="lead">
          <a href="<?php echo base_url()?>/select_user" class="text-danger">Visualizar usuários cadastrados</a>
        </div>
</form>

<?php
} 
?>