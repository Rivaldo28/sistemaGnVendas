<?php
namespace src\controllers;
session_start(); 
require __DIR__.'/vendor/autoload.php'; // caminho relacionado a SDK
require __DIR__.'/src/controllers/ComprasController.php';

use \core\Controller;
use \src\models\Produto;
use \src\controllers\ProdutosController;
use \src\controllers\ComprasController;
use \src\models\Compra;
use \src\Config;


use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$date =date("Y-m-d", strtotime('+2 day'));


$clientId ='Client_Id_4e4327e045ceb277ed5f62db8c46c399c309e0bf'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret ='Client_Secret_bb1ad596c70e1c17089cd27ec860816670412681'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)
 
$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];
 
// $charge_id refere-se ao ID da transação gerada anteriormente
$params = [
  'id' => $_SESSION['ID_COMPRA']
];
 
$customer = [
  'name' => 'Riva Souza', // nome do cliente
  'cpf' => '84832818181' , // cpf válido do cliente
  'phone_number' => '999314324' // telefone do cliente
];
 
$bankingBillet = [
  'expire_at' => $date, // data de vencimento do boleto (formato: YYYY-MM-DD)
  'customer' => $customer
];
 
$payment = [
  'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
];
 
$body = [
  'payment' => $payment
];
 
try {
    $api = new Gerencianet($options);
    $charge = $api->payCharge($params, $body);
    
    print_r($charge);
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}
?>
<!--
<h2>Adicionar nova Compra</h2>

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
-->

<?php
/*$name = $_POST['name'];
$value = $_POST['value'];
$telefone = $_POST['telefone'];
$charge_id = $_POST['charge_id'];

$strcon = mysqli_connect('localhost','root', '', 'gn_vendas' ) or die('Erro ao connectar');
$sql = "INSERT INTO compras VALUES";
$sql .= "('$nome','$value','$telefone','$charge_id')";
mysqli_query($strocn, $sql) or die("Erro ao registrar!");
mysqli_close($strcon);
echo "Compra realizada com sucesso!";*/
?>






 