<?php
include(__DIR__ . '/../layout/header.php');
use components\Helper;
?>
<div class="row">
    <div class="col-lg-2">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-10">
<h1>Alterar minha senha</h1>
<p>Modifique sua senha a cada 15 dias para manter sua segurança</p>
        <div class="container-fluid margem_direita">
        <hr/>
<form class="form-horizontal" role="form" method="post" action="index.php?c=usuario&acao=validarTrocaSenha">
    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"/>
    <div class="form-group">
        <label for="senhaAtual">Senha Atual</label>
        <input type="password" class="form-control input_menor" name="senha_atual" required="required" placeholder="Senha atual"/>
    </div>
    <div class="form-group">
        <label for="senhaNova">Nova Senha</label>
        <input type="password" class="form-control input_menor" name="nova_senha" required="required" placeholder="Nova Senha"/>
    </div>
    <div class="form-group">
<!--        <input type="submit" name="enviar" value="Atualizar" class="btn btn-primary"/><span class="glyphicon glyphicon-refresh"></span>-->
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span>
            Atualizar
        </button>
    </div>

</form>
        </div>
</div>
</div>
