<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 27/01/15
 * Time: 16:51
 */
include(__DIR__ . '/../layout/header.php');
use components\Helper;
?>
<div class="container">
    <div class="login">
        <?php
        Helper::mostraAlerta("success");
        Helper::mostraAlerta("danger");
        ?>
        <div class="panel panel-default ">
            <div class="panel-body">
                <h3><b>SISCONE</b><br>Sistema de Controle de Efetivo</h3>
                <hr/>
                <form class="form-horizontal" role="form" method="post" action="index.php?c=usuario&acao=autenticarUsuario">

                    <div class="form-group">
                        <label class="col-sm-1 col-sm-offset-3 control-label"><span class="glyphicon glyphicon-user"></span></label>
                        <div class="col-sm-5">
                            <input type="text" placeholder="Usuário" class="form-control" name="login" required="required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 col-sm-offset-3 control-label"><span class="glyphicon glyphicon-lock"></span></label>
                        <div class="col-sm-5">
                            <input type="password" placeholder="Senha" class="form-control" name="senha" required="required"/>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Entrar"/>
                    <br>
                    <a data-toggle="modal" data-target="#myModalSenha">Perdeu a senha?</a>
                    <br>
                    <a data-toggle="modal" data-target="#myModalCadastrar">Cadastro</a>
                </form>
            </div>

        </div>
    </div>
    </div>


<!--INICIO DA MODAL SENHA-->
<div class="modal fade" id="myModalSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Recuperar Senha</h4>
            </div>
            <div class="modal-body">
                <form  class="form-horizontal" role="form" method="post" action="index.php?c=usuario&acao=recuperarSenha">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email: </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="required">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--INICIO DA MODAL CADASTRO-->
<div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastro</h4>
            </div>
            <div class="modal-body">
                <form  class="form-horizontal" role="form" method="post" action="index.php?c=usuario&acao=cadastrar">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email: </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="required">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

