<?php
namespace components;
/**
* 
*/
use models\base\AbstractModel;

abstract class View
{
	static public function make($view, $models = array())
	{
		extract($models);
		if(AbstractModel::verificaSecao()){
			include(__DIR__."/../views/$view.php");
		}else{
			include(__DIR__."/../views/usuario/login.php");
		}

	}
	static public function debug($variavel){
		echo "<pre>";
		var_dump($variavel);exit;
	}
}