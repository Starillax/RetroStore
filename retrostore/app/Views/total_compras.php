<table class="table">
  <thead>
    <tr>
      <th scope="col">Produto</th>
      <th scope="col">Preço</th>
      <th scope="col"><th>
      <th scope="col"><th>
      <th scope="col"><th>
    

    </tr>
  </thead>

  <tbody>

<?php

$total = 0;

foreach ($compras as $row1){
    foreach ($produtos as $row2) {
        if ($row1['produto'] == $row2['id']) {
            echo "<tr> <td>".$row2['nome']."</td>
            <td>R$ ".$row2['preco']."</td>";

            $total += $row2['preco'];
        }
    }
}
   
?>

    </tbody>
</table>

<div id="produtos-link" class="text-center lead">
    <?php
        echo '<p>O valor total das compras de ' . $usuarios['nome'] . ' é de R$ ' . $total . '</p>';
    ?>
</div>