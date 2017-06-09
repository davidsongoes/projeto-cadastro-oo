<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 22/02/15
 * Time: 17:22
 */
namespace models;
use models\base\AbstractModel;
class ChamadoDAO extends AbstractModel{
    const QUERY_RELATORIO = "select MONTH(hora_abertura) as mes, COUNT(id) as total from tbl_chamado group by mes;";
    const QUERY_MEU_CHAMADO =  "select * from tbl_chamado where usuario_id = :usuario_id ";
    const QUERY_ALL = "select * from tbl_chamado where status = 0";
    const QUERY_TIPO = "select * from tbl_chamado where status = 0 AND tipo = :tipo";
    const QUERY_POR_ID = "select * from tbl_chamado where id = :id";
    const QUERY_INSERT = "insert into tbl_chamado (usuario_id, prioridade, solucionador_id, tipo, descricao, hora_abertura)
                                                   values
                                                  (:usuario_id, :prioridade,:solucionador_id, :tipo, :descricao, :hora_abertura)
    ";
    const QUERY_ALTER = "update tbl_chamado set tipo = :tipo, prioridade = :prioridade, status = :status where id = :id";
    const QUERY_ALL_SOLUCIONADOR = "select * from tbl_chamado where status = 0 AND solucionador_id IS NULL";
    const QUERY_INSERT_SOLUCIONADOR = "update tbl_chamado set solucionador_id = :solucionador_id where id = :id";
    const QUERY_ALL_MEU_SOLUCIONADOR = "select * from tbl_chamado where status = 0 AND solucionador_id = :solucionador_id";
    const QUERY_COUNT_CHAMADOS = "select  COUNT(*) as chamados_abertos from tbl_chamado where solucionador_id IS NULL;";
}