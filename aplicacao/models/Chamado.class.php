<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 04/01/15
 * Time: 18:39
 */

namespace models;

use components\View;
use models\base\AbstractModel;

/**
 * @param $usuarioId int
 * @param $solucionadorId int
 * @param $prioridade int
 * @param $tipoint
 * @param $descricao text
 * @param $horaAbertura datetime
 * @param $status int
 * @param $numeroDeChamados array
 *
 * @auth Raphael Santana Correia Silva
 *
 * Classe que trata da regra de negocio do Chamado dentro do sistema de OS
 *
 */

class Chamado extends ChamadoDAO{

    public $usuarioId;
    public $solucionadorId;
    public $prioridade;
    public $tipo;
    public $descricao;
    public $horaAbertura;
    public $status;
    public $numeroDeChamados;



     static public function novo($dados){
        AbstractModel::verificaDados($dados);
        try{
            AbstractModel::executar(self::QUERY_INSERT,array(
                ':usuario_id' => $_SESSION['id'],
                ':prioridade' => $dados['prioridade'],
                ':tipo' => $dados['tipo'],
                ':solucionador_id' => 'NULL',
                ':descricao' => $dados['descricao'],
                ':hora_abertura'=> date("Y-m-d H:i:s"),
            ));
            return true;
        }catch (\PDOException  $e){
            echo 'Error: ' . $e->getMessage();
        }
    }
    static public function novoComoAdminsitrador($dados){
        AbstractModel::verificaDados($dados);
        try{
            AbstractModel::executar(self::QUERY_INSERT,array(
                ':usuario_id' => $dados['usuario_id'],
                ':solucionador_id' => $dados['solucionador_id'],
                ':prioridade' => $dados['prioridade'],
                ':tipo' => $dados['tipo'],
                ':descricao' => $dados['descricao'],
                ':hora_abertura'=> date("Y-m-d H:i:s"),
            ));
            return true;
        }catch (\PDOException  $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    static public function buscarTodos(){
        $resultado = AbstractModel::queryAll(self::QUERY_ALL, null);
        $chamados = array();
        foreach($resultado as $result){
            $chamado = new Chamado();
            $chamado->id = $result['id'];
            $usuario = Usuario::buscarPorId($result['usuario_id']);
            $chamado->usuarioId = $usuario->nome;
            $chamado->prioridade = $result['prioridade'];
            $chamado->tipo = $result['tipo'];
            $chamado->descricao = $result['descricao'];
            $chamado->horaAbertura = $result['hora_abertura'];

            $chamados[] = $chamado;
        }
        return $chamados;
    }
    static public function buscarTodosSemSolucionador(){
        $resultado = AbstractModel::queryAll(self::QUERY_ALL_SOLUCIONADOR, null);
        $chamados = array();
        foreach($resultado as $result){
            $chamado = new Chamado();
            $chamado->id = $result['id'];
            $usuario = Usuario::buscarPorId($result['usuario_id']);
            $chamado->usuarioId = $usuario->nome;
            $chamado->prioridade = $result['prioridade'];
            $chamado->tipo = $result['tipo'];
            $chamado->descricao = $result['descricao'];
            $chamado->horaAbertura = $result['hora_abertura'];

            $chamados[] = $chamado;
        }
        return $chamados;
    }
    static public function buscaTodosPorSolucionador($tipo)
    {
        $resultado = AbstractModel::queryAll(self::QUERY_TIPO, array(':tipo' => $tipo));
        $chamados = array();
        foreach($resultado as $result){
            $chamado = new Chamado();
            $chamado->id = $result['id'];
            $usuario = Usuario::buscarPorId($result['usuario_id']);
            $chamado->usuarioId = $usuario->nome;
            $chamado->prioridade = $result['prioridade'];
            $chamado->tipo = $result['tipo'];
            $chamado->descricao = $result['descricao'];
            $chamado->horaAbertura = $result['hora_abertura'];

            $chamados[] = $chamado;
        }
        return $chamados;
    }
    static public function buscaMeuChamado($idUsuario){
        $resultado = AbstractModel::queryAll(self::QUERY_MEU_CHAMADO, array(':usuario_id' => $idUsuario));
        foreach($resultado as $result){
            $chamado = new Chamado();
            $chamado->id = $result['id'];
            $chamado->tipo = $result['tipo'];
            $chamado->prioridade = $result['prioridade'];
            $chamado->status = $result['status'];
            $chamado->horaChamado = $result['hora_abertura'];
            $chamados[] = $chamado;
        }
        return $chamados;
    }
    static public function buscaMeuChamadoSolucionador($idUsuario){
        $resultado = AbstractModel::queryAll(self::QUERY_ALL_MEU_SOLUCIONADOR, array(':solucionador_id' => $idUsuario));
        foreach($resultado as $result){
            $chamado = new Chamado();
            $chamado->id = $result['id'];
            $usuario = Usuario::buscarPorId($result['usuario_id']);
            $chamado->usuarioId = $usuario->nome;
            $chamado->prioridade = $result['prioridade'];
            $chamado->tipo = $result['tipo'];
            $chamado->descricao = $result['descricao'];
            $chamado->horaAbertura = $result['hora_abertura'];
            $chamados[] = $chamado;
        }
        return $chamados;
    }
    static public function buscarChamadoPorId($id){
        $result = AbstractModel::query(self::QUERY_POR_ID, array(':id' => $id) );
        if($result){
            $chamado = new Chamado();
            $chamado->id = $result['id'];
            $chamado->usuarioId = Usuario::buscarPorId($result['usuario_id']);
            $chamado->prioridade = $result['prioridade'];
            $chamado->tipo = $result['tipo'];
            $chamado->solucionadorId = $result['solucionador_id'];
            $chamado->descricao = $result['descricao'];
            $chamado->horaAbertura = $result['hora_abertura'];
        }
        return isset($chamado) ? $chamado : NULL;
    }
    static public function fechaChamado($dados){
        AbstractModel::verificaDados($dados);
        try{
            AbstractModel::executar(self::QUERY_ALTER, array(
                ':id' => $dados['id'],
                ':tipo' => $dados['tipo'],
                ':prioridade' => $dados['prioridade'],
                ':status' => 1,
            ));
            return true;
        }catch (\PDOException  $e){
            echo 'Error: ' . $e->getMessage();
        }
    }
    static public function atualizaChamado($dados){
        AbstractModel::verificaDados($dados);
        try{
            AbstractModel::executar(self::QUERY_ALTER, array(
                ':id' => $dados['id'],
                ':tipo' => $dados['tipo'],
                ':prioridade' => $dados['prioridade'],
                ':status' => 0,
            ));
            return true;
        }catch (\PDOException  $e){
            echo 'Error: ' . $e->getMessage();
        }
    }
    static public function adicionaSolucionador($dados){

        AbstractModel::verificaDados($dados);
        try{
            AbstractModel::executar(self::QUERY_INSERT_SOLUCIONADOR, array(
               ':id' => $dados['id'],
                ':solucionador_id' => $dados['solucionador_id'],
            ));
            return true;
        }catch(\PDOException $e){
            echo 'Error: '.$e->getMessage();
        }
    }
    static public function contaChamadosSemSolucionador(){
        $resultado = AbstractModel::queryAll(self::QUERY_COUNT_CHAMADOS, null);
        $numeroDeChamados = array();
        foreach($resultado as $result){
            $chamado = new Chamado();
            $chamado->numeroDeChamados = $result['chamados_abertos'];

            $numeroDeChamados[] = $chamado;
        }
        return $numeroDeChamados;
    }
}