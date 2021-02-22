<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Compra;


use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

class ComprasController extends Controller {
 

  public function addCompra() {
      $this->render('addcompra');
  }
  public function addActionCompra() {
    $name = filter_input(INPUT_POST, 'name');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $phone_number = filter_input(INPUT_POST, 'phone_number');
    $_SESSION['ID_COMPRA']= filter_input(INPUT_POST, 'charge_id');

    if ($name && $cpf) {
      $data = Compra::select()->where('cpf', $cpf)->execute();

      if (count($data) === 0) {
        # Insere
        Compra::insert(['name' => $name, 'cpf' => $cpf,'phone_number' => $phone_number, 'charge_id' =>   $_SESSION['ID_COMPRA']])->execute();
        $this->redirect('/compra');
      }
    }
    $this->redirect('/nova/compra');
  }
  public function editCompra($args) {
    $compra = Compra::select()->find($args['id']);

      $this->render('editcompra', ['compra' => $compra]);
    }
    public function editActionCompra($args){
      $name = filter_input(INPUT_POST, 'name');
      $cpf = filter_input(INPUT_POST, 'cpf');
      $phone_number = filter_input(INPUT_POST, 'phone_number');
      $charge_id = filter_input(INPUT_POST, 'charge_id');
  
      if($name && $cpf){
        Compra::update()
        ->set('name', $name)
        ->set('cpf', $cpf)
        ->set('phone_number', $phone_number)
        ->set('charge_id', $charge_id)
        ->where('id', $args['id'])
        ->execute();
        
        $this->redirect('/compra');
      }
      $this->redirect('/compra/'.$args['id'].'/editar');
    }
    public function delCompra($args) {
      Compra::delete()->where('id', $args['id'])->execute();
      $this->redirect('/compra');
    }
}
?>