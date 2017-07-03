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
        $response = Efetivo::adicionaMilitar($dados);
        if ($response['true'] === true) {
            Efetivo::salvaFoto($response['lastId']);
            $efetivos = Efetivo::buscarMilitares();
            $_SESSION['success'] = "<strong style='color: #0f0f0f'>Militar inserido com sucesso!</strong>";
            View::make('efetivo/listarMilitares', array('efetivos' => $efetivos));
        }else{
            $efetivos = Efetivo::buscarMilitares();
            $_SESSION['danger'] = "<strong style='color: #0f0f0f'>Erro ao inserir Militar!</strong>";
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
            $files = $_FILES;
            if (Efetivo::editarMilitar($dados)) {
                Efetivo::validaFile($files);
                Efetivo::salvaFoto($dados['id']);
                $efetivos = Efetivo::buscarMilitares();
                $_SESSION['warning'] = "<strong style='color: #0f0f0f'>Militar editado com sucesso!</strong>";
                View::make('efetivo/listarMilitares', array('efetivos' => $efetivos));
            }
        }
    }


}

