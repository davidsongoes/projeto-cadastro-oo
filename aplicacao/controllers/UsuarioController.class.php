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
            $_SESSION['success'] = "<strong style='color: #0f0f0f'>Usuario criado com sucesso!</strong>";
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
            $_SESSION['warning'] = "<strong style='color: #0f0f0f'>Usuario alterado com sucesso!</strong>";
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
        $usuario = Usuario::buscaUsuario($dados);
        if (isset($usuario)){
            if($usuario->ativo == 0){
                $_SESSION['warning'] = "<strong style='color: #0f0f0f'>Usuario não ativo!<br>Aguarde um Administrador ativar seu cadastro.</strong>";
                View::make('home/index');
                die();
            }else{
                $_SESSION['id'] = $usuario->id;
            $_SESSION['usuario_logado'] = $usuario->nome;
            $_SESSION['grupo'] = $usuario->grupo;
            $_SESSION['login'] = $usuario->login;
            View::make('home/index');
            }
        }else{
            $_SESSION['danger'] = "<strong style='color: #0f0f0f'>Usuario ou senha inválido</strong>";
            View::make('home/index');
            die();
        }
    }

    public function recuperarSenha()
    {
        $dados = $_POST;
        if (Usuario::resetaSenha($dados)) {
            $_SESSION['success'] = "<strong style='color: #0f0f0f'>Senha enviada por email!!!</strong>";
            View::make('home/index');
        } else {
            $_SESSION['danger'] = "<strong style='color: #0f0f0f'>Algo inesperado ocorreu ao enviar o email</strong>";
            View::make('home/index');
        }
        die();
    }

    public function validarTrocaSenha()
    {
        $dados = $_POST;
        if (Usuario::alteraSenha($dados)) {
            $_SESSION['success'] = "<strong style='color: #0f0f0f'>Senha alterada com sucesso</strong>";
            View::make('home/index');
        } else {
            $_SESSION['danger'] = "<strong style='color: #0f0f0f'>Ocorreu algum problema interno</strong>";
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