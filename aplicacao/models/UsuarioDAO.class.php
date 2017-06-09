<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 22/02/15
 * Time: 15:06
 */
namespace models;
use models\base\AbstractModel;

class UsuarioDAO extends AbstractModel {
    const QUERY_ALTER_USER = "update tbl_usuario set saram = :saram, posto_graduacao = :posto_graduacao,
                                especialidade = :especialidade, ramal = :ramal, nome = :nome,
                                data_nascimento = :data_nascimento,
                                data_ultima_promocao = :data_ultima_promocao,
                                data_praca = :data_praca, secao = :secao, login = :login,
                                 email = :email,
                                grupo = :grupo where id = :id";
    const QUERY_RESET_SENHA = "update tbl_usuario set senha = :senha where email = :email";
    const QUERY_POR_EMAIL = "select * from tbl_usuario where email = :email";
    const QUERY_UNICO = "select * from tbl_usuario where login = :login and senha = :senha";
    const QUERY_ALL = 'select * from tbl_usuario';
    const QUERY_POR_ID = "select * from tbl_usuario where id = :id";
    const DElETE_BY_ID = 'delete from tbl_usuario where id = :id';
    const QUERY_INSERT = "insert into tbl_usuario (saram, posto_graduacao, especialidade, ramal, nome, data_nascimento, data_ultima_promocao, data_praca, secao, login, senha, email, grupo)
                          VALUES (:saram, :posto_graduacao, :especialidade, :ramal, :nome, :data_nascimento, :data_ultima_promocao, :data_praca, :secao, :login, :senha, :email, :grupo)";
    const QUERY_POR_GRUPO = "select id, nome from tbl_usuario where grupo >= :grupo";



}