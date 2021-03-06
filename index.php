<?php
error_reporting(E_ALL ^E_NOTICE);
require_once('aplicacao/bootstrap.php');
session_start();
function roteamento()
{
	$c = $_REQUEST['c'];
	$acao = $_REQUEST['acao'];

	if($c == 'post'){
		executarPostController($acao);
	}elseif ($c == 'efetivo'){
	    executarEfetivoController($acao);
    }elseif($c =='usuario'){
		executarUsuarioController($acao);
	}
	else{
		$controller = new \controllers\HomeController();
		$controller->index();
	}
}
function executarUsuarioController($acao){
	$controller = new controllers\UsuarioController();
		if($acao == 'exibir'){
			$controller->exibir();
		}elseif($acao == 'novo'){
			$controller->novo();
		}elseif($acao == 'novoCadastro'){
            $controller->novoCadastro();
        }elseif($acao == 'autenticarUsuario'){
			$controller->autenticarUsuario();
		}elseif($acao == 'logout'){
			$controller->logout();
		}elseif($acao == 'viewUsuario'){
			$controller->viewUsuario();
		}elseif($acao == 'detalhe'){
			$controller->detalhe();
		}elseif($acao == 'remover'){
			$controller->remover();
		}elseif($acao == 'validarTrocaSenha'){
			$controller->validarTrocaSenha();
		}elseif($acao =='minhaSenha'){
			$controller->alterarSenha();
		}elseif($acao == 'meusDados'){
			$controller->alterarDados();
		}elseif($acao == 'editar'){
			$controller->editar();
		}elseif($acao == 'cadastrarUsuario'){
			$controller->cadastrarUsuario();
        }elseif($acao == 'editarUsuario'){
            $controller->editarUsuario();
        }elseif($acao =='recuperarSenha'){
			$controller->recuperarSenha();
		}else{
		$controller->index();
	}
}
//function executarAutorController($acao){
//	$controller = new \controllers\AutorController();
//	if($acao == 'exibir'){
//		$controller->exibir();
//	}elseif($acao == 'remover'){
//		$controller->remover();
//	}
//	else{
//		$controller->index();
//	}
//}
function executarPostController($acao){

	$controller = new \controllers\PostController();
	if($acao == 'exibir'){
		$controller->exibir();
	}else{
		$controller->index();
	}
}
//function executarChamadoController($acao){
//	$controller = new \controllers\ChamadoController();
//	if($acao == 'novoChamado'){
//		$controller->novo();
//	}elseif($acao == 'listaChamados'){
//		$controller->listarChamados();
//	}elseif($acao == 'resolverChamado'){
//		$controller->resolverChamado();
//	}elseif($acao == 'fecharChamado'){
//		$controller->fecharChamado();
//	}elseif($acao == 'atualizarChamado'){
//		$controller->atualizarChamado();
//	}elseif($acao == 'tratarChamado'){
//		$controller->tratarChamado();
//	}elseif($acao == 'meusChamados'){
//		$controller->meusChamados();
//	}elseif($acao == 'gerarEstatistica'){
//		$controller->gerarEstatistica();
//	}elseif($acao == 'detalheMeuChamado'){
//		$controller->detalheMeuChamado();
//	}elseif($acao =='adicionaSolucionador'){
//		$controller->adicionaSolucionador();
//	}
//	else{
//		$controller->index();
//	}
//}

function executarEfetivoController($acao){
    $controller = new \controllers\EfetivoController();
    if($acao == 'novoMilitar'){
        $controller->novoMilitar();
    }elseif($acao == 'viewNovoMilitar'){
        $controller->viewNovoMilitar();
    }elseif($acao == 'listarMilitares'){
        $controller->listarMilitares();
    }elseif($acao == 'excluirMilitar'){
        $controller->excluirMilitar();
    }elseif($acao == 'viewEditarMilitar'){
        $controller->viewEditarMilitar();
    }elseif($acao == 'editarMilitar'){
        $controller->EditarMilitar();
    }elseif($acao == 'detalhesMilitar'){
        $controller->detalhesMilitar();
    }
    else{
        $controller->index();
    }
}
 \components\PDOUtil::transacional(function(){

 });
roteamento();

