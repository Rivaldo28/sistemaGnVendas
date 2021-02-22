<?php $render('header'); ?>

<a href="<?=$base;?>/nova/compra">Novo Produto</a><br/>


<table border="1" width="100%">
  <tr>
     <th>ID</th>
     <th>NOME</th>
     <th>CPF</th>
     <th>TELEFONE</th>
     <th>CODIGO BOLETO</th>
     <th>AÇÕES</th>
  </tr>
  <?php foreach($compras as $compra):?>
  <tr>
    <td><?=$compra['id'];?></td>
    <td><?=$compra['name'];?></td>
    <td><?=$compra['cpf'];?></td>
    <td><?=$compra['phone_number'];?></td>
    <td><?= $_SESSION['ID_COMPRA'];?></td>

    <td>   
    <a href="http://localhost/gn-vendas/index.php">[Boleto]-</a>
    <a href="<?=$base;?>/compra/<?=$compra['id'];?>/editar">[editar]-</a>
       <a href="<?=$base;?>/compra/<?=$compra['id'];?>/excluir" onclick="return confirm('Tem certeza que deseja excluir?')">[excluir]</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>


<?php $render('footer'); ?>