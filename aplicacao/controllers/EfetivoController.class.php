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
use models\Efetivo;
use models\Usuario;
use models\Historico;

class EfetivoController
{

    public function viewNovoMilitar()
    {
        View::make('efetivo/novoMilitar');
    }

    public function novoMilitar()
    {
        $dados = $_POST;
        if (Efetivo::adicionaMilitar($dados)) {
            $efetivos = Efetivo::buscarMilitares();
            $_SESSION['success'] = "<strong style='color: #0f0f0f'>Militar inserido com sucesso!</strong>";
            View::make('efetivo/listarMilitares', array('efetivos' => $efetivos));
        }
    }

    public function detalhesMilitar()
    {
        $efetivo = Efetivo::buscarPorId($_GET['id']);
        View::make('efetivo/detalhesMilitar', array('efetivo' => $efetivo));
    }

    public function listarMilitares()
    {
        $efetivos = Efetivo::buscarMilitares();
        View::make('efetivo/listarMilitares', array('efetivos' => $efetivos));
//        if ($_SESSION['grupo'] == 4) {
//            $chamados = Chamado::buscaTodosPorSolucionador('2');
//            View::make('chamado/listaChamado', array('chamados' => $chamados));
//        } elseif ($_SESSION['grupo'] == 5) {
//            $chamados = Chamado::buscaTodosPorSolucionador('3');
//            View::make('chamado/listaChamado', array('chamados' => $chamados));
//        } elseif ($_SESSION['grupo'] == 6) {
//            $chamados = Chamado::buscaTodosPorSolucionador('4');
//            View::make('chamado/listaChamado', array('chamados' => $chamados));
//        } elseif ($_SESSION['grupo'] == '2') {
//            $efetivos = Efetivo::buscarMilitares();
//            View::make('efetivo/listarMilitares', array('efetivos' => $efetivos));
//        } else {
//            $chamados = Chamado::buscarTodos();
//            View::make('chamado/listaChamado', array('chamados' => $chamados));
//        }

    }

    public function excluirMilitar()
    {
        PDOUtil::transacional(function () {
            $efetivo = Efetivo::buscarPorId($_GET['id']);
            $efetivo->remover();
        });
        $_SESSION['danger'] = "<strong style='color: #0f0f0f'>Militar desativado com successo!</strong>";
        View::make('efetivo/listarMilitares', array('efetivos' => Efetivo::buscarMilitares()));
    }

    public function viewEditarMilitar()
    {
        $efetivo = Efetivo::buscarPorId($_GET['id']);
        if ($_SESSION['grupo'] == 3) {
            View::make('efetivo/editarMilitar', array('efetivo' => $efetivo));
        } else {
            View::make('efetivo/editarMilitar', array('efetivo' => $efetivo));
        }

    }

    public function editarMilitar()
    {
        {
            $dados = $_POST;
            Efetivo::salvaFoto($dados['id']);
            if (Efetivo::editarMilitar($dados)) {
                $efetivos = Efetivo::buscarMilitares();
                $_SESSION['warning'] = "<strong style='color: #0f0f0f'>Militar editado com sucesso!</strong>";
                View::make('efetivo/listarMilitares', array('efetivos' => $efetivos));
            }
        }
    }


}

