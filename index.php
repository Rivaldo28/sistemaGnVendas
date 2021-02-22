<?php
session_start();
require __DIR__.'/vendor/autoload.php'; // caminho relacionado a SDK

 
use \core\Controller;
use \src\models\Produto;
use \src\models\Compra;
use \src\controllers\ComprasController;
use \src\controllers\ProdutosController;
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;


$clientId = 'Client_Id_4e4327e045ceb277ed5f62db8c46c399c309e0bf'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_bb1ad596c70e1c17089cd27ec860816670412681'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)
 
$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];
 
$item_1 = [
    'name' => 'Hospedagem', // nome do item, produto ou serviço
    'amount' => 1, // quantidade
    'value' => 1000 // valor (1000 = R$ 10,00) (Obs: É possível a criação de itens com valores negativos. Porém, o valor total da fatura deve ser superior ao valor mínimo para geração de transações.)
];
 
$item_2 = [
    'name' => 'Mouse', // nome do item, produto ou serviço
    'amount' => 2, // quantidade
    'value' => 2000 // valor (2000 = R$ 20,00)
];
 
$items =  [
    $item_1,
    $item_2
];

// Exemplo para receber notificações da alteração do status da transação:
// $metadata = ['notification_url'=>'sua_url_de_notificacao_.com.br']
// Outros detalhes em: https://dev.gerencianet.com.br/docs/notificacoes

// Como enviar seu $body com o $metadata
// $body  =  [
//    'items' => $items,
//    'metadata' => $metadata
// ];

$body  =  [
    'items' => $items
];

try {
    $api = new Gerencianet($options);
    $charge = $api->createCharge([], $body);
    $_SESSION['ID_COMPRA'] = $charge['data'] ['charge_id'];
 
    
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}
?>

<a href="http://localhost/gn-vendas/boleto.php">Gerar Boleto<a>