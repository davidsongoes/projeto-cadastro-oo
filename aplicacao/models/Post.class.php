<?php


namespace models;
use components\PDOUtil;
use models\base\AbstractModel;
use models\Autor;
/**
* 
*/
class Post extends AbstractModel
{
	public $titulo;
	public $conteudo;
	public $autor;

	const QUERY_ALL = "select * from tbl_post";
    const QUERY_POR_ID = 'select * from tbl_post where id = :id';
	static public function fake ($titulo, $conteudo, $autor)
	{
		$fake = new Post();
        $fake->titulo = $titulo;
        $fake->conteudo = $conteudo;
        $fake->autor = $autor;

        return $fake;
	}
	static public function buscarTodos(){
		$db = PDOUtil::getInstance()->obterConexao();
        $stmt = $db->prepare(self::QUERY_ALL);
        $stmt->execute();
        $posts = array();
        foreach ($stmt->fetchAll() as $result) {
            $post = new Post();
            $post->id = $result['id'];
            $post->titulo = $result['titulo'];
            $post->conteudo = $result['conteudo'];
            $post->autor =  Autor::buscarPorId($result['autor_id']);
            $posts[] = $post;
        }
        return $posts;
	}
    static public function buscarporId($id){
        $db = PDOUtil::getInstance()->obterConexao();
        $stmt = $db->prepare(self::QUERY_POR_ID);
        $stmt->execute(array(':id' => $id));
        $result = $stmt->fetch();
        if($result){
            $post = new Post();
            $post->id = $result['id'];
            $post->titulo = $result['titulo'];
            $post->conteudo = $result['conteudo'];
            $post->autor =  Autor::buscarPorId($result['autor_id']);
        }
        
        return isset($post) ? $post : NULL;
    }
}