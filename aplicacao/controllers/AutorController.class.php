<?php
namespace controllers;

use models\Autor;
use components\View;
use components\PDOUtil;

class	AutorController
{
	
	public function index()
	{
		$autores = Autor::buscarTodos();
		View::make('autor/index', array('autores' => $autores));

	}

	public function exibir()
	{
		$autor = Autor::buscarPorId($_GET['id']);
		View::make('autor/exibir', array('autor' => $autor));
	}

	public function remover()
	{
		PDOUtil::transacional(function(){
			$autor = Autor::buscarPorId($_GET['id']);
			$autor->remover();
		});
			View::make('autor/index', array('autores' => Autor::buscarTodos()));

	}
	public function salvar()
	{
		PDOUtil::transacional(function(){
			//codigo transacional
		});
	}


	
}