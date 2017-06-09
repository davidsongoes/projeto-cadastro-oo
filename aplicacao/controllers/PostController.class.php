<?php
namespace controllers;

use models\Post;
use components\View;
/**
* 
*/
class PostController
{
	
	public function index()
	{
		$posts = Post::buscarTodos();
		View::make('post/index', array('posts' => $posts));
	}
	public function exibir()
	{

		$post = Post::buscarPorId($_GET['id']);
		View::make('post/exibir', array('post' => $post));
	}
}