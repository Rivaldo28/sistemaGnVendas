<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Produto;
use \src\models\Compra;

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

class HomeController extends Controller {

    public function index() {
       $produtos = Produto::select()->execute();
       $this->render('home', [ 'produtos' => $produtos]);
    }
    public function product() {
        $produtos = Produto::select()->execute();
        $this->render('produto', [ 'produtos' => $produtos]);
     }
     public function compra() {
      $compras = Compra::select()->execute();
      $this->render('compra', [ 'compras' => $compras]);
   }
   public function gerencianet() {
      $compras = Compra::select()->execute();
      $this->render('compra', [ 'compras' => $compras]);
   }
   
     

}