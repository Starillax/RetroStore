<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}

if ($produtos['tipo'] == 'jogo') {

    echo '<h1>' . $produtos['nome'] . '</h1>';
    echo '<table class="table table-striped">';
    echo '<tr>';
    echo '<td>Console(s):</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $produtos['console'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Categoria:</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $categorias['nome'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Preço</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>R$ ' . $produtos['preco'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Unidades disponíveis:</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $produtos['quantidade'] . '</td>';
    echo '</tr>';
    echo '</table>';

    echo '<div class="form-group">';
    echo '<div class="col-md-4 mb-3">';
    echo '<form action="/comprar_produto/' . $produtos['id'] . '" method="post">';
    echo '<label for="selectUserLabel">Quem comprará:</label>';
    echo '<select class="form-control" id="selectUserLabel" name="usuario">';
        foreach ($usuarios as $usuario) {
            echo "<option value=" . $usuario['id'] . " selected>" . $usuario['nome'] . "</option>";
        }
    echo '</select>';
    echo '<button type="submit" class="btn btn-danger" name="submit">Comprar</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';

} else if ($produtos['tipo'] == 'outro') {

    echo '<h1>' . $produtos['nome'] . '</h1>';
    echo '<table class="table table-striped">';
    echo '<tr>';
    echo '<td>Preço</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>R$ ' . $produtos['preco'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Unidades disponíveis:</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $produtos['quantidade'] . '</td>';
    echo '</tr>';
    echo '</table>';

    echo '<div class="form-group">';
    echo '<div class="col-md-4 mb-3">';
    echo '<form action="/comprar_produto/' . $produtos['id'] . '" method="post">';
    echo '<label for="selectUserLabel">Quem comprará:</label>';
    echo '<select class="form-control" id="selectUserLabel" name="usuario">';
        foreach ($usuarios as $usuario) {
            echo "<option value=" . $usuario['id'] . " selected>" . $usuario['nome'] . "</option>";
        }
    echo '</select>';
    echo '<br>';
    echo '<button type="submit" class="btn btn-danger" name="submit">Comprar</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';

}
?>