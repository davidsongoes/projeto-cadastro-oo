<?php

namespace controllers;
use components\View;
use	models\base\AbstractModel;
/**
* 
*/
class HomeController 
{

	
	public function index()
	{
		if(AbstractModel::verificaSecao()){
			View::make('home/index');
		}else{
			View::make('usuario/login');
		}

	}
}