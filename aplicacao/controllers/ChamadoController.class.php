<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 04/01/15
 * Time: 18:37
 */

namespace controllers;

use components\PDOUtil;
use models\base\AbstractModel;
use models\Chamado;
use components\View;
use models\Usuario;
use models\Historico;

class ChamadoController{


    //Retirar método
    public function viewChamado(){
    View::make('chamado/novoChamado');
    }
    public function index(){
        if($_SESSION['grupo'] == 1){
            View::make('chamado/novoChamado');
        }else{
            View::make('chamado/novoChamadoAdministrator');
        }

    }

    public function novo(){
        PDOUtil::transacional(function(){
            $dados = $_POST;
            if($_SESSION['grupo'] == 1){
                Chamado::novo($dados);
            }else{
                Chamado::novoComoAdminsitrador($dados);
            }

        });
        $_SESSION['success'] = "Chamado aberto com sucesso!";
            View::make('home/index');
    }
    public function gerarEstatistica(){
        View::make('home/construcao');
    }
    public function listarChamados(){
        if($_SESSION['grupo'] == 4){
            $chamados = Chamado::buscaTodosPorSolucionador('2');
            View::make('chamado/listaChamado', array('chamados' => $chamados));
        }elseif($_SESSION['grupo'] == 5){
            $chamados = Chamado::buscaTodosPorSolucionador('3');
            View::make('chamado/listaChamado', array('chamados' => $chamados));
        }elseif($_SESSION['grupo'] == 6){
            $chamados = Chamado::buscaTodosPorSolucionador('4');
            View::make('chamado/listaChamado', array('chamados' => $chamados));
        }
        elseif($_SESSION['grupo'] == '3'){
            $chamados = Chamado::buscarTodosSemSolucionador();
            View::make('chamado/listaChamadoSemSolucionador', array('chamados' => $chamados));
        }else{
            $chamados = Chamado::buscarTodos();
            View::make('chamado/listaChamado', array('chamados' => $chamados));
        }

    }
    public function meusChamados(){
        switch($_SESSION['grupo']){
            case 1:
                $chamados = Chamado::buscaMeuChamado($_SESSION['id']);
                View::make('chamado/meusChamados', array('chamados' => $chamados));
                break;
            case 4:
                $chamados = Chamado::buscaMeuChamadoSolucionador($_SESSION['id']) ;
                View::make('chamado/listaChamado', array('chamados' => $chamados));
                break;
            case 5:
                $chamados = Chamado::buscaMeuChamadoSolucionador($_SESSION['id']) ;
                View::make('chamado/listaChamado', array('chamados' => $chamados));
                break;
            case 6:
                $chamados = Chamado::buscaMeuChamadoSolucionador($_SESSION['id']) ;
                View::make('chamado/listaChamado', array('chamados' => $chamados));
                break;
            default:
                $chamados = Chamado::buscaMeuChamadoSolucionador($_SESSION['id']) ;
                View::make('chamado/listaChamado', array('chamados' => $chamados));
                break;
        }
    }
    public function tratarChamado(){
        PDOUtil::transacional(function(){
        $dados = $_POST;
        if($dados['trataChamado'] == 'fechaChamado'){
            Chamado::fechaChamado($dados);
            Historico::novo($dados);
            $_SESSION['success'] = "Chamado Fechado com Sucesso!";
            View::make('home/index');
        }
        if($dados['trataChamado'] == 'atualizaChamado'){
            Chamado::atualizaChamado($dados);
            Historico::novo($dados);
            $_SESSION['success'] = "Chamado Atualizado com Sucesso!";
            View::make('home/index');
        }
        if($dados['trataChamado'] == 'adicionaSolucionador'){
            Chamado::adicionaSolucionador($dados);
            Historico::novo($dados);
            $_SESSION['success'] = "Foi adicionado um solucionador ao chamado";
            View::make('home/index');
        }
        });
    }
    public function resolverChamado(){
        $chamado = Chamado::buscarChamadoPorId($_GET['id']);

        if($_SESSION['grupo'] == 3){
            View::make('chamado/adicionaSolucionador', array('chamado' => $chamado));
        }else{
            View::make('chamado/resolveChamado', array('chamado' => $chamado));
        }

    }
    public function detalheMeuChamado(){
        PDOUtil::transacional(function(){
            $historicos = Historico::buscarPorChamado($_GET['id']);

            View::make('chamado/detalheMeuChamado', array('historicos' => $historicos));
        });
    }

}

