<?php $render('header'); ?>

<h3>Editar Compra</h3>

<form method="POST" action="<?=$base;?>/produto/<?=$produto['id'];?>/editar">
<label >
     Nome:<br/>
     <input type="text" name="name" value="<?=$produto['name'];?>"/>
  </label><br/><br/>

  <label >
     Valor:<br/>
     <input type="text" name="value" value="<?=$produto['value'];?>"/>
  </label><br/><br/>

  <input type="submit" value="Salvar">
</form>

<?php $render('footer'); ?>