<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Produto;

class ProdutosController extends Controller {

  public function add() {
      $this->render('add');
  }
  public function addAction() {
    $name = filter_input(INPUT_POST, 'name');
    $value = filter_input(INPUT_POST, 'value');

    if ($name && $value) {
      $data = Produto::select()->where('name', $name)->execute();

      if (count($data) === 0) {
        # Insere
        Produto::insert(['name' => $name, 'value' => $value])->execute();
        $this->redirect('/produto');
      }
    }
    $this->redirect('/novo');
  }
  public function edit($args) {
    $produto = Produto::select()->find($args['id']);

      $this->render('edit', ['produto' => $produto]);
    }
    public function editAction($args){
      $name = filter_input(INPUT_POST, 'name');
      $value = filter_input(INPUT_POST, 'value');
  
      if($name && $value){
        Produto::update()->set('name', $name)->set('value', $value)->where('id', $args['id'])->execute();
        $this->redirect('/produto');
      }
      $this->redirect('/produto/'.$args['id'].'/editar');
    }
    public function del($args) {
      Produto::delete()->where('id', $args['id'])->execute();
      $this->redirect('/produto');
    }
}
?>