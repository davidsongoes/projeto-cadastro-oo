<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 08/06/17
 * Hora: 11:22
 */
namespace models;

use models\base\AbstractModel;

class EfetivoDAO extends AbstractModel
{
    const QUERY_INSERT = "INSERT INTO militar (saram, nome_completo, id_post_grad, id_esp, id_quadro, id_secao, nome_guerra, situacao, ramal, data_nasc, data_ult_prom, email, antiguidade_turma, ativo) VALUES ( :saram, :nome_completo, :id_post_grad, :id_esp, :id_quadro, :id_secao, :nome_guerra, :situacao, :ramal, :data_nasc, :data_ult_prom, :email, :antiguidade_turma, 1)";
    const QUERY_UPDATE = "UPDATE militar SET id_post_grad=:id_post_grad, id_esp=:id_esp, id_quadro=:id_quadro, id_secao=:id_secao, saram=:saram, nome_completo=:nome_completo, nome_guerra=:nome_guerra, situacao=:situacao, ramal=:ramal, data_nasc=:data_nasc, data_ult_prom=:data_ult_prom, email=:email, antiguidade_turma=:antiguidade_turma WHERE id_militar=:id_militar";
    const QUERY_DELETE = "UPDATE militar set ativo = 0 where id_militar = :id_militar";//A query não deleta o registro, somente desativa a visualização no lista de usuários
    const QUERY_BY_ID = "SELECT * FROM militar WHERE id_militar=:id_militar";
    const QUERY_BY_ANTIGUIDADE = "select m.*, s.secao AS secao_nome, p.posto_grad AS post_grad_nome,e.esp AS especialidade_nome FROM militar AS m 
                                  INNER JOIN secao AS s ON m.id_secao = s.id_secao 
                                  INNER JOIN posto_grad AS p ON m.id_post_grad = p.id_posto_grad
                                  INNER JOIN especialidade AS e ON m.id_esp = e.id_esp order by id_post_grad, situacao, data_ult_prom, antiguidade_turma DESC ";
    const QUERY_BUSCA_POSTO_GRADUACAO = "select * from posto_grad where id_posto_grad=:id_posto_grad";
    const QUERY_BUSCA_QUADRO = "select * from quadro where id_quadro=:id_quadro";
    const QUERY_BUSCA_ESPECIALIDADE = "select * from especialidade where id_esp=:id_esp";
    const QUERY_BUSCA_SECAO = "select * from secao where id_secao=:id_secao";
    const QUERY_ALL_POSTO_GRADUACAO = "select * from posto_grad";
    const QUERY_ALL_QUADRO = "select * from quadro";
    const QUERY_ALL_ESPECIALIDADE = "select * from especialidade order by esp";
    const QUERY_ALL_SECAO = "select * from secao";
}