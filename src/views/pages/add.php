<?php $render('header'); ?>

<h3>Adicionar nova Compra</h3>

<form method="POST" action="<?=$base;?>/novo" >
<label for="">
     Nome:<br/>
     <input type="text" name="name"/>
  </label><br/><br/>

  <label for="">
     Valor:<br/>
     <input type="text" name="value"/>
  </label><br/><br/>

  <input type="submit" value="Adicionar">
</form><br><br>

<?php $render('footer'); ?>