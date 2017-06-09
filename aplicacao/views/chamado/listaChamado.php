<?php use components\Helper;
include(__DIR__ . '/../layout/header.php');
?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">
        <h1>Chamados em Aberto</h1><br/>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Prioridade</th>
        <th>Tipo</th>
        <th>Hora da Solicitação</th>
        <th>operação</th>
    </tr>
    <tr>
        <?php foreach ($chamados as $chamado):?>
        <td><?php echo $chamado->id; ?></td>
        <td><?php echo $chamado->usuarioId ?></td>
        <td><?php echo Helper::$prioridades[$chamado->prioridade]; ?></td>
        <td><?php echo Helper::$tipos[$chamado->tipo]; ?></td>
        <td><?php echo $chamado->horaAbertura; ?></td>
        <td>
            <a class="btn btn-success" href="index.php?c=chamado&acao=resolverChamado&id=<?php echo $chamado->id;?>">Resolver Chamado</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
    </div>
    </div>
<?php include(__DIR__.'/../layout/footer.php'); ?>