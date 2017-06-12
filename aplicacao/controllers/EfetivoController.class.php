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

    public function novoMilitar()
    {
        PDOUtil::transacional(function () {
            $dados = $_POST;
            if ($_SESSION['grupo'] == 2) {
                Efetivo::novoMilitar($dados);
            } else {
                Chamado::novoComoAdminsitrador($dados);
            }

        });
        $_SESSION['success'] = "Chamado aberto com sucesso!";
        View::make('home/index');
    }

    public function detalhesMilitar()
    {
        $efetivo = Efetivo::buscarPorId($_GET['id']);
        View::make('efetivo/detalhesMilitar', array('efetivo' => $efetivo));
    }

    public function listarMilitares()
    {
        if ($_SESSION['grupo'] == 4) {
            $chamados = Chamado::buscaTodosPorSolucionador('2');
            View::make('chamado/listaChamado', array('chamados' => $chamados));
        } elseif ($_SESSION['grupo'] == 5) {
            $chamados = Chamado::buscaTodosPorSolucionador('3');
            View::make('chamado/listaChamado', array('chamados' => $chamados));
        } elseif ($_SESSION['grupo'] == 6) {
            $chamados = Chamado::buscaTodosPorSolucionador('4');
            View::make('chamado/listaChamado', array('chamados' => $chamados));
        } elseif ($_SESSION['grupo'] == '2') {
            $efetivos = Efetivo::buscarMilitares();
            View::make('efetivo/listarMilitares', array('efetivos' => $efetivos));
        } else {
            $chamados = Chamado::buscarTodos();
            View::make('chamado/listaChamado', array('chamados' => $chamados));
        }

    }

    public function excluirMilitar()
    {
        PDOUtil::transacional(function () {
            $dados = $_POST;
            if ($dados['trataChamado'] == 'fechaChamado') {
                Chamado::fechaChamado($dados);
                Historico::novo($dados);
                $_SESSION['success'] = "Chamado Fechado com Sucesso!";
                View::make('home/index');
            }
            if ($dados['trataChamado'] == 'atualizaChamado') {
                Chamado::atualizaChamado($dados);
                Historico::novo($dados);
                $_SESSION['success'] = "Chamado Atualizado com Sucesso!";
                View::make('home/index');
            }
            if ($dados['trataChamado'] == 'adicionaSolucionador') {
                Chamado::adicionaSolucionador($dados);
                Historico::novo($dados);
                $_SESSION['success'] = "Foi adicionado um solucionador ao chamado";
                View::make('home/index');
            }
        });
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
            if (Efetivo::editarMilitar($dados)) {
                $_SESSION['success'] = "Usuario alterado com sucesso!";
                View::make('home/index');
            }
        }
    }
}

