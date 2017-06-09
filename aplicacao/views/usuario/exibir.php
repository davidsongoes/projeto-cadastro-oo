<?php
include(__DIR__ . '/../layout/header.php');
use components\Helper;

?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">

<h1>Lista de Usuarios</h1>
    <table class="table table-striped">
        <tr>
            <th>Posto</th>
            <th>Especialidade</th>
            <th>Nome</th>
            <th>Seção</th>
            <th>Grupo</th>
            <th>Opções</th>
        </tr>
        <tr>
            <?php foreach ($usuarios as $usuario):?>
            <td><?php echo Helper::$posto_graduacoes[$usuario->postoGraduacao]; ?></td>
            <td><?php echo Helper::$especialidades[$usuario->especialidade]; ?></td>
            <td><?php echo $usuario->nome; ?></td>
            <td><?php echo Helper::$secoes[$usuario->secao]; ?></td>
            <td><?php echo Helper::$grupos[$usuario->grupo] ;?></td>
            <td>
                <a href="index.php?c=usuario&acao=detalhe&id=<?php echo $usuario->id;?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> </a>/
                <a href="index.php?c=usuario&acao=editar&id=<?php echo $usuario->id;?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a>/
                <a href="index.php?c=usuario&acao=remover&id=<?php echo $usuario->id;?>"><span class="glyphicon glyphicon-remove botaoVermelho" aria-hidden="true"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
    </div>
    </div>
<?php include(__DIR__.'/../layout/footer.php'); ?>