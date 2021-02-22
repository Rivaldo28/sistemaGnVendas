<?php $render('header'); ?>
<br><br>
<a href="<?=$base;?>/novo">Novo Produto</a><r/>

<table border="1" width="100%">
  <tr>
     <th>ID</th>
     <th>NOME</th>
     <th>VALOR</th>
     <th>AÇÕES</th>
  </tr>
  <?php foreach($produtos as $produto):?>
  <tr>
    <td><?=$produto['id'];?></td>
    <td><?=$produto['name'];?></td>
    <td><?php echo 'R$ '?><?=$produto['value'];?></td>
    <td>
    <a href="<?=$base;?>/produto/<?=$produto['id'];?>/nova/compra">[Comprar]-  </a>
       <a href="<?=$base;?>/produto/<?=$produto['id'];?>/editar">[editar]- </a>
       <a href="<?=$base;?>/produto/<?=$produto['id'];?>/excluir" onclick="return confirm('Tem certeza que deseja excluir?')">[excluir]</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>


<?php $render('footer'); ?>