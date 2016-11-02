<?php
  include('header.php');
  include('conecta.php');
  include('banco-produto.php');
?>
  <div class="row">
    <?php if(array_key_exists("removido", $_GET) && $_GET["removido"] == true) { ?>
    <div class="col-md-4 col-md-offset-4">
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sucesso!</strong> Produto <?=$_GET['produto_id']?> removido!
      </div>
    </div>
    <?php } ?>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <fieldset>
      <legend>Lista de Produtos</legend>
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>Id</th>
              <th>Produto</th>
              <th>Preço</th>
              <th>Descricao</th>
              <th>Categoria</th>
              <th>Estado</th>
              <th>Excluir/Editar</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $produtos = listaProdutos($conexao);
              $soma = 0;
              foreach($produtos as $produto) {
                $soma += $produto[2];
            ?>
              <tr>
                <td><?=$produto[0];?></td>
                <td><?=$produto[1];?></td>
                <td><?=$produto[2];?></td>
                <td><?=$produto[3];?></td>
                <td><?=$produto[4];?></td>
                <td><?=$produto[5];?></td>
                <td>
                  <form class="" action="remove-produto.php" method="post">
                    <input type="text" name="id" value="<?=$produto[0]?>" hidden="true">
                    <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
                    <button type="reset" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
                  </form>

                </td>
              </tr>
        <?php }; ?>
              <tr>
                <td colspan="2"><b>Total de Produtos</td>
                <td colspan="4"><?=$soma?></td>
              </tr>
          </tbody>
        </table>
    </div>
  </div>

<?php
  include('footer.php');
?>
