<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 24/02/15
 * Time: 13:35
 */
namespace models;
use components\View;
use models\base\AbstractModel;
use models\Usuario;
Class Historico extends HistoricoDAO{

    public $chamadoId;
    public $usuarioId;
    public $horaHistorico;
    public $descricao;

    static public function novo($dados){
        AbstractModel::verificaDados($dados);
        try{
            AbstractModel::executar(self::QUERY_INSERT,array(
                ':chamado_id' => $dados['id'],
                ':usuario_id' => $_SESSION['id'],
                ':hora_historico' => date("Y-m-d H:i:s"),
                ':descricao' => $dados['trataChamado'],
                ':parecer_tecnico' => $dados['parecer_tecnico']
            ));
            return true;
        }catch (\PDOException  $e){
            echo 'Error: ' . $e->getMessage();
        }
    }
    static public function buscarPorChamado($chamadoId){
        try{
            $resultado = AbstractModel::queryAll(self::QUERY_POR_CHAMADO, array(':chamado_id' => $chamadoId));
            $historicos = array();
            foreach ($resultado as $result) {
                $historico = new Historico();
                $historico->id = $result['id'];
                $historico->chamadoId = $result['chamado_id'];
                $usuario = Usuario::buscarPorId($result['usuario_id']);
                $historico->usuarioId = $usuario->nome;
                $historico->horaHistorico = $result['hora_historico'];
                $historico->descricao = $result['descricao'];
                $historicos[] = $historico;
            }
            return $historicos;
        }catch (\PDOException $e){
            echo 'Error: '. $e->getMessage();
        }

    }

}