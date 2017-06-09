<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 24/02/15
 * Time: 13:37
 */
namespace models;

use models\base\AbstractModel;

class HistoricoDAO extends AbstractModel{

    const QUERY_ALL = "select * from tbl_historico;";
    const QUERY_POR_CHAMADO = "select * from tbl_historico where :chamado_id = chamado_id";
    const QUERY_INSERT = "insert into tbl_historico (chamado_id, usuario_id, hora_historico, descricao, parecer_tecnico) VALUES
                          (:chamado_id, :usuario_id, :hora_historico, :descricao, :parecer_tecnico)";

}