<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 27/01/15
 * Time: 21:55
 * // */
use models\Chamado;

$contaChamado = Chamado::contaChamadosSemSolucionador();
?>
<?php if ($_SESSION["grupo"] == 2): ?>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Efetivo</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href='index.php?c=efetivo&acao=index'><span>Adicionar Novo Militar</span></a></li>
                    <li><a href='index.php?c=efetivo&acao=listarMilitares'><span>Listar Militares</span></a></li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Chamados</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href='index.php?c=chamado&acao=index'><span>Adicionar Novo</span></a></li>
                    <li><a href='index.php?c=chamado&acao=listaChamados'><span>Listar Todos</span></a></li>
                    <li><a href='index.php?c=chamado&acao=gerarEstatistica'><span>Estatísticas</span></a></li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Usuarios</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href='index.php?c=usuario&acao=viewUsuario'><span>Adicionar Novo</span></a></li>
                    <li><a href='index.php?c=usuario&acao=exibir'><span>Listar Todos</span></a></li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($_SESSION["grupo"] == 1): ?>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Chamados</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href='index.php?c=chamado&acao=index'><span>Adicionar Novo</span></a></li>
                    <li><a href='index.php?c=chamado&acao=meusChamados'><span>Meus Chamados</span></a></li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($_SESSION["grupo"] == 3): ?>
    <div class="container-fluid">

        <div class="panel panel-default">
            <div class="panel-heading">Chamados</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href='index.php?c=chamado&acao=index'><span>Adicionar Novo</span></a></li>
                    <li><a href='index.php?c=chamado&acao=listaChamados'><span>Listar Todos</span> <span
                                    class="badge"><?php echo $contaChamado['0']->numeroDeChamados ?></span></a></li>
                    <li><a href='index.php?c=chamado&acao=gerarEstatistica'><span>Estatísticas</span></a></li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($_SESSION["grupo"] > 3): ?>
    <div class="container-fluid">

        <div class="panel panel-default">
            <div class="panel-heading">Chamados</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href='index.php?c=chamado&acao=index'><span>Adicionar Novo</span></a></li>
                    <li><a href='index.php?c=chamado&acao=meusChamados'><span>Meus Chamados</span></a></li>
                    <li><a href='index.php?c=chamado&acao=gerarEstatistica'><span>Estatísticas</span></a></li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="container-fluid">

    <div class="panel panel-default">
        <div class="panel-heading">Minha Conta</div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li><a href='index.php?c=usuario&acao=minhaSenha'><span>Alterar Senha</span></a></li>
                <li><a href='index.php?c=usuario&acao=meusDados'><span>Dados Pessoais</span></a></li>
            </ul>
        </div>
    </div>
</div>


