<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 27/01/15
 * Time: 14:58
 */

namespace controllers;

use components\Helper;
use models\base\AbstractModel;
use models\Usuario;
use components\View;
use components\PDOUtil;

Class UsuarioController
{

    public function index()
    {
        View::make('usuario/index');
    }

    public function viewUsuario()
    {
        View::make('usuario/novo');
    }

    public function novo()
    {
        $dados = $_POST;
        if (Usuario::adicionaUsuario($dados)) {
            $_SESSION['success'] = "Usuario criado com sucesso!";
            View::make('home/index');
        }
    }

    public function exibir()
    {
        $usuarios = Usuario::buscarTodos();
        View::make('usuario/exibir', array('usuarios' => $usuarios));
    }

    public function detalhe()
    {
        $usuario = Usuario::buscarPorId($_GET['id']);
        View::make('usuario/detalhe', array('usuario' => $usuario));
    }

    public function editar()
    {
        $usuario = Usuario::buscarPorId($_GET['id']);
        View::make('usuario/editar', array('usuario' => $usuario));
    }

    public function editarUsuario()
    {
        $dados = $_POST;
        if (Usuario::editaUsuario($dados)) {
            $_SESSION['success'] = "Usuario alterado com sucesso!";
            View::make('home/index');
        }
    }

    public function remover()
    {
        PDOUtil::transacional(function () {
            $usuario = Usuario::buscarPorId($_GET['id']);
            $usuario->remover();
        });
        View::make('usuario/exibir', array('usuarios' => Usuario::buscarTodos()));
    }

    public function autenticarUsuario()
    {
        $dados = $_POST;
        if ($usuario = Usuario::buscaUsuario($dados)) {
            $_SESSION['id'] = $usuario->id;
            $_SESSION['usuario_logado'] = $usuario->nome;
            $_SESSION['grupo'] = $usuario->grupo;
            $_SESSION['login'] = $usuario->login;
            View::make('home/index');
        } else {
            $_SESSION['danger'] = "Usuario ou senha inválido";
            View::make('home/index');
            die();
        }
    }

    public function recuperarSenha()
    {
        $dados = $_POST;
        if (Usuario::resetaSenha($dados)) {
            $_SESSION['success'] = "Senha enviada por email!!!";
            View::make('home/index');
        } else {
            $_SESSION['danger'] = "Algo inesperado ocorreu ao enviar o email";
            View::make('home/index');
        }
        die();
    }

    public function validarTrocaSenha()
    {
        $dados = $_POST;
        if (Usuario::alteraSenha($dados)) {
            $_SESSION['success'] = "Senha alterada com sucesso";
            View::make('home/index');
        } else {
            $_SESSION['danger'] = "Ocorreu algum problema interno";
            View::make('home/index');
        }
    }

    public function alterarSenha()
    {
        View::make('usuario/minhaSenha');

    }

    public function alterarDados()
    {
        $usuario = Usuario::buscarPorId($_SESSION['id']);
        View::make('usuario/editarUsuario', array('usuario' => $usuario));
    }

    public function logout()
    {
        session_destroy();
        session_start();
        View::make('usuario/login');
    }
}