<?php

namespace models\base;
use components\PDOUtil;
abstract class AbstractModel
{
    public $id;

    public function eNovo()
    {
        return !isset( $this->id ) || is_null( $this->id );
    }
    static public function verificaSecao(){
        $logado = false;
        if(isset($_SESSION['usuario_logado'])){
            $logado = true;
        }
        return $logado;
    }
    static public function verificaDados($dados){
        $verifica = true;
        foreach($dados as $chave => $dado){
            if(empty($dado)){
                $verifica = false;
                echo "o campo $chave esta vazio";
                die();
            }
        }
        return $verifica;
    }
    static public function formataData($data){
        $arrayData = explode('/', $data);
        $data = $arrayData[2] . '-' . $arrayData[1] . '-' . $arrayData[0];
        return $data;
    }
    static public function desformataData($data){
        $arrayData = explode('-', $data);
        $data = $arrayData[2].'/'.$arrayData[1].'/'.$arrayData[0];
        return $data;
    }
    static public function executar($sql, $dados){

        $stmt = PDOUtil::getInstance()->obterConexao()->prepare($sql);
        $stmt->execute($dados);
    }

    static public function queryAll($sql,$dados){
        $stmt = PDOUtil::getInstance()->obterConexao()->prepare($sql);
        $stmt->execute($dados);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    static public function query($sql, $dados){
        $stmt = PDOUtil::getInstance()->obterConexao()->prepare($sql);
        $stmt->execute($dados);
        return $stmt->fetch();
    }
    static public function parseNameId($tabela, $coluna, $dado, $id){
        $query = "select $id from $tabela where $coluna = :$coluna";
        $stmt = PDOUtil::getInstance()->obterConexao()->prepare($query);
        $stmt->execute(array(
           $coluna => $dado
        ));
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
