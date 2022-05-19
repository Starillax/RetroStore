<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col"><th>
      <th scope="col"><th>
      <th scope="col"><th>
    

    </tr>
  </thead>

  <tbody>
<?php 
    foreach ($produtos as $row){
        echo "<tr> <td>".$row['nome']."</td>
        <td>R$ ".$row['preco']."</td>";
    
   
?>

<td>


    <a href="<?php echo base_url('edit_produto_form/'.$row['id']);?>" class="btn btn-danger">Editar</a>
    </td>
<td>
    <a href="<?php echo base_url('delete_produto/'.$row['id']);?>" class="btn btn-danger">Deletar</a>
    
   </td>
<td>
    <a href="<?php echo base_url('pag_produto/'.$row['id']);?>" class="btn btn-danger">Ir para página de compra</a>
    
   </td></tr>
    

    <?php
    }// foreach
    ?>

</tr>

  </tbody>
</table>

<div id="produtos-link" class="text-center lead">
  <a href="<?php echo base_url()?>/insert_produto_form" class="text-danger">Cadastrar produto</a>
</div>