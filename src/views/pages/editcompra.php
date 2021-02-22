<?php $render('header'); ?>

<h3>Adicionar nova Compra</h3>

<form method="POST" action="<?=$base;?>/compra/<?=$compra['id'];?>/editar" >
<label for="">
     Nome:<br/>
     <input type="text" name="name" value="<?=$compra['name'];?>"/>
  </label><br/><br/>

  <label for="">
     Cpf:<br/>
     <input type="text" name="cpf" value="<?=$compra['cpf'];?>"/>
  </label><br/><br/>

  <label for="">
     Código Boleto:<br/>
     <input type="text" name="phone_number" value="<?=$compra['phone_number'];?>"/>
  </label><br/><br/>

  <label for="">
     Código Produto:<br/>
     <input type="text" name="charge_id" value="<?=$compra['charge_id'];?>"/>
  </label><br/><br/>

  <input type="submit" value="Atualizar">
</form>

<?php $render('footer'); ?>