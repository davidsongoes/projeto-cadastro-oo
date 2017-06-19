<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 08/06/17
 * Hora: 11:27
 */
namespace models;

use components\Helper;
use components\View;
use models\base\AbstractModel;

class Efetivo extends EfetivoDAO
{

//    MÉTODOS DO EFETIVO

    public static function adicionaMilitar($dados)
    {
        AbstractModel::verificaDados($dados);
        try {
            AbstractModel::executar(self::QUERY_INSERT, array(
                ':saram' => $dados['saram'],
                ':id_quadro' => $dados['quadro'],
                ':id_posto_grad' => $dados['posto_graduacao'],
                ':id_esp' => $dados['especialidade'],
                ':situacao' => $dados['situacao'],
                ':nome_completo' => utf8_decode($dados['nome_completo']),
                ':nome_guerra' => utf8_decode($dados['nome_guerra']),
                ':data_nasc' => AbstractModel::formataData($dados['data_nascimento']),
                ':data_ult_prom' => AbstractModel::formataData($dados['data_ultima_promocao']),
                ':id_secao' => $dados['secao'],
                ':ramal' => $dados['ramal'],
                ':rtcaer' => $dados['rtcaer'],
                ':email' => $dados['email'],
                ':antiguidade_turma' => $dados['antiguidade_turma'],
            ));
            return true;
        } catch (\PDOException  $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function editarMilitar($dados)
    {
        AbstractModel::verificaDados($dados);
//
        try {
            AbstractModel::executar(self::QUERY_UPDATE, array(
                ':saram' => $dados['saram'],
                ':id_posto_grad' => $dados['posto_graduacao'],
                ':id_quadro' => $dados['quadro'],
                ':id_esp' => $dados['especialidade'],
                ':nome_completo' => utf8_decode($dados['nome_completo']),
                ':nome_guerra' => utf8_decode($dados['nome_guerra']),
                ':data_nasc' => AbstractModel::formataData($dados['data_nascimento']),
                ':data_ult_prom' => AbstractModel::formataData($dados['data_ultima_promocao']),
                ':id_secao' => $dados['secao'],
                ':ramal' => $dados['ramal'],
                ':rtcaer' => $dados['rtcaer'],
                ':situacao' => $dados['situacao'],
                ':email' => $dados['email'],
                ':antiguidade_turma' => $dados['antiguidade_turma'],
                ':id_militar' => $dados['id'],
            ));
            return true;
        } catch (\PDOException  $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function excluirMilitar($dados)
    {
        AbstractModel::verificaDados($dados);
        try {
            AbstractModel::executar(self::QUERY_DELETE, array(
                ':id_militar' => $dados['id_militar'],
            ));
            return true;
        } catch (\PDOException  $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function remover()
    {
        AbstractModel::executar(self::QUERY_DELETE, array(':id_militar' => $this->id));
    }

//MÉTODOS DE BUSCA
    public static function buscaPostoGraduacao($id)
    {
        $result = AbstractModel::query(self::QUERY_BUSCA_POSTO_GRADUACAO, array(':id_posto_grad' => $id));
        return $result['posto_grad'];
    }

    public static function buscaQuadro($id)
    {
        $result = AbstractModel::query(self::QUERY_BUSCA_QUADRO, array(':id_quadro' => $id));
        return $result['quadro'];
    }

    public static function buscaEspecialidade($id)
    {
        $result = AbstractModel::query(self::QUERY_BUSCA_ESPECIALIDADE, array(':id_esp' => $id));
        return $result['esp'];
    }

    public static function buscaSecao($id)
    {
        $result = AbstractModel::query(self::QUERY_BUSCA_SECAO, array(':id_secao' => $id));
        return $result['secao'];
    }

    static public function allPostoGraduacao()
    {
        $resultado = AbstractModel::queryAll(self::QUERY_ALL_POSTO_GRADUACAO, null);
        return $resultado;
    }

    static public function allEspecialidade()
    {
        $resultado = AbstractModel::queryAll(self::QUERY_ALL_ESPECIALIDADE, null);
        return $resultado;
    }

    static public function allQuadro()
    {
        $resultado = AbstractModel::queryAll(self::QUERY_ALL_QUADRO, null);
        return $resultado;
    }

    static public function allSecao()
    {
        $resultado = AbstractModel::queryAll(self::QUERY_ALL_SECAO, null);
        return $resultado;
    }

    static public function buscarMilitares()
    {
        $resultado = AbstractModel::queryAll(self::QUERY_BY_ANTIGUIDADE, null);
        $efetivos = array();
        foreach ($resultado as $result) {
            $efetivo = new Efetivo();
            $efetivo->id = $result['id_militar'];
            $efetivo->saram = $result['saram'];
            $efetivo->nome_completo = $result['nome_completo'];
            $efetivo->nome_guerra = $result['nome_guerra'];
            $efetivo->posto_graduacao = Efetivo::buscaPostoGraduacao($result['id_posto_grad']);
            $efetivo->especialidade = Efetivo::buscaEspecialidade($result['id_esp']);
            $efetivo->quadro = Efetivo::buscaQuadro($result['id_quadro']);
            $efetivo->situacao = Helper::$situacao[$result['situacao']];
            $efetivo->secao = Efetivo::buscaSecao($result['id_secao']);
            $efetivo->ramal = ($result['ramal']);
            $efetivo->data_nascimento = $result['data_nasc'];
            $efetivo->data_ultima_promocao = $result['data_ult_prom'];
            $efetivo->email = $result['email'];
            $efetivo->antiguidade_turma = $result['antiguidade_turma'];

            $efetivos[] = $efetivo;
        }
        return $efetivos;
    }

    static public function buscarPorId($id)
    {
        $result = AbstractModel::query(self::QUERY_BY_ID, ARRAY(':id_militar' => $id));
        if ($result) {
            $efetivo = new Efetivo();
            $efetivo->id = $result['id_militar'];
            $efetivo->saram = $result['saram'];
            $efetivo->nome_completo = $result['nome_completo'];
            $efetivo->nome_guerra = $result['nome_guerra'];
            $efetivo->posto_graduacao = $result['id_posto_grad'];
            $efetivo->especialidade = $result['id_esp'];
            $efetivo->quadro = $result['id_quadro'];
            $efetivo->situacao = $result['situacao'];
            $efetivo->secao = $result['id_secao'];
            $efetivo->ramal = $result['ramal'];
            $efetivo->rtcaer = $result['rtcaer'];
            $efetivo->data_nascimento = $result['data_nasc'];
            $efetivo->data_ultima_promocao = $result['data_ult_prom'];
            $efetivo->email = $result['email'];
            $efetivo->antiguidade_turma = $result['antiguidade_turma'];
        }
        return isset($efetivo) ? $efetivo : NULL;
    }

    public static function verificaFoto($posto_graduacao, $nome_guerra)
    {
        if (isset($posto_graduacao) AND ($nome_guerra)) {
            $nome_arquivo = self::buscaPostoGraduacao($posto_graduacao) . '_' . utf8_encode($nome_guerra) . '.jpg';
            if (file_exists("/var/www/html/fotos/$nome_arquivo")) {
                return "../../../fotos/$nome_arquivo";
            } else {
                return '../../../fotos/sem_foto.jpg';
            }
        }

    }
}