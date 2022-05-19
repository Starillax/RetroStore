<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col"><th>
      <th scope="col"><th>
    

    </tr>
  </thead>

  <tbody>
<?php 
    foreach ($usuarios as $row){
        echo "<tr> <td>".$row['nome']."</td>
        <td>".$row['email']."</td>";
    
   
?>

<td>


    <a href="<?php echo base_url('/edit_user_form/'.$row['id']);?>" class="btn btn-danger">Editar</a>
    </td>
<td>
    <a href="<?php echo base_url('/delete_user/'.$row['id']);?>" class="btn btn-danger">Deletar</a>
    
   </td>
<td>
    <a href="<?php echo base_url('/compras_user/'.$row['id']);?>" class="btn btn-danger">Total de suas compras</a>
    
   </td></tr>
    

    <?php
    }
    ?>

</tr>

  </tbody>
</table>

<div id="users-link" class="text-center lead">
  <a href="<?php echo base_url()?>/insert_user_form" class="text-danger">Cadastrar usuário</a>
</div>