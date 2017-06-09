<?php

namespace models;
use components\PDOUtil;
use models\base\AbstractModel;

class Autor extends AbstractModel
{
    const INSERT = 'insert into tbl_autor (nome, senha, email) values(:nome, :senha, :email)';
    const QUERY_ALL = 'select * from tbl_autor';
    const QUERY_POR_ID = 'select * from tbl_autor where id = :id';
    const DElETE_BY_ID = 'delete from tbl_autor where id = :id';
    public $nome;
    public $senha;
    public $email;

    static function fake( $nome, $email )
    {
        $fake = new Autor();
        $fake->nome = $nome;
        $fake->senha = md5( uniqid( rand(), TRUE ) );
        $fake->email = $email;

        return $fake;
    }
    static public function buscarTodos()
    {
        $db = PDOUtil::getInstance()->obterConexao();
        $stmt = $db->prepare(self::QUERY_ALL);
        $stmt->execute();
        $autores = array();
        foreach ($stmt->fetchAll() as $result) {
            $autor = new Autor();
            $autor->id = $result['id'];
            $autor->nome = $result['nome'];
            $autor->email = $result['email'];
            $autor->senha = $result['senha'];
            $autores[] = $autor;
        }
        return $autores;
    }
    static public function buscarPorId($id)
    {
        $db = PDOUtil::getInstance()->obterConexao();
        $stmt = $db->prepare(self::QUERY_POR_ID);
        $stmt->execute(array(':id' => $id));
        $result = $stmt->fetch();
        if($result){
            $autor = new Autor();
            $autor->id = $result['id'];
            $autor->nome = $result['nome'];
            $autor->email = $result['email'];
            $autor->senha = $result['senha'];
        }
        return isset($autor) ? $autor : NULL;
    }
     public function remover()
    {
        $db = PDOUtil::getInstance()->obterConexao();
        $stmt = $db->prepare(self::DElETE_BY_ID);
        $stmt->execute(array(':id' => $this->id));

    }









    // public function inserir($nome, $email)
    // {
    //     try {
    //         $db =PDOUtil::getInstance()->obterConexao($nome, $email);
    //         $stmt = $db->prepare(self::INSERT);
    //         $senha = md5( uniqid( rand(), TRUE ) );
    //         $stmt->execute->(array(
    //                             ':nome' => $nome,
    //                             ':senha' => $senha,
    //                             ':email' =>$email,
    //                         ));
    //        //return $stmt    
            
    //     } catch (Exception $e) {
    //         echo "Exceção pega: ",  $e->getMessage(), "\n";
    //     }
        

    // }
}