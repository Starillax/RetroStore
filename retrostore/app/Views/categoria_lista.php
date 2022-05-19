<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col"><th>
      <th scope="col"><th>
    

    </tr>
  </thead>

  <tbody>
<?php 
    foreach ($categorias as $row){
        echo "<tr> <td>".$row['nome']."</td>";
    
   
?>

<td>


    <a href="<?php echo base_url('/edit_categoria_form/'.$row['id']);?>" class="btn btn-danger">Editar</a>
    </td>
<td>
    <a href="<?php echo base_url('/delete_categoria/'.$row['id']);?>" class="btn btn-danger">Deletar</a>
    
   </td>
    

    <?php
    }// foreach
    ?>

</tr>

  </tbody>
</table>

<div id="categorias-link" class="text-center lead">
  <a href="<?php echo base_url()?>/insert_categoria_form" class="text-danger">Cadastrar categoria</a>
</div>