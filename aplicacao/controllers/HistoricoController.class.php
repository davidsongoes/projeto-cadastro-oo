<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 24/02/15
 * Time: 13:36
 */
namespace controllers;

use components\View;
use models\Historico;

class HistoricoController{

    public function index(){
        View::make('historico/index');
    }

    public function adicinoar(){
        if(Historico::novo()){
            return true;
        }else{
            return false;
        }
    }
    public function listar($chamadoId){
        if(Historico::buscarPorChamado($chamadoId)){
            return true;
        }else{
            return false;
        }
    }
}