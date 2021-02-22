<?php $render('header'); ?>

<h3>Adicionar nova Compra</h3>

<form method="POST" action="<?=$base;?>/nova/compra" >
<label for="">
     Nome:<br/>
     <input type="text" name="name"/>
  </label><br/><br/>

  <label for="">
     Cpf:<br/>
     <input type="text" name="cpf"/>
  </label><br/><br/>

  <label for="">
     Telefone:<br/>
     <input type="text" name="phone_number"/>
  </label><br/><br/>

  <label for="">
     Código Boleto:<br/>
     <input type="text" name="charge_id"/>
  </label><br/><br/>

  <input type="submit" value="Adicionar">
</form>

<?php $render('footer'); ?>