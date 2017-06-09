<?php use components\Helper;
include(__DIR__ . '/../layout/header.php');
?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">
        <h1>Meus Chamados</h1>
        <p>Aqui contém a lista de todos chamados que seu usuario abriu.</p>
        <hr/>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>tipo</th>
        <th>prioridade</th>
        <th>Hora do Chamado</th>
        <th>status</th>
        <th>histórico</th>
    </tr>
    <tr>
        <?php foreach ($chamados as $chamado):?>
        <td><?php echo $chamado->id; ?></td>
        <td><?php echo Helper::$tipos[$chamado->tipo]; ?></td>
        <td><?php echo Helper::$prioridades[$chamado->prioridade]; ?></td>
        <td><?php echo $chamado->horaChamado; ?></td>
        <td><?php echo Helper::$status[$chamado->status]; ?></td>
        <td><a href="index.php?c=chamado&acao=detalheMeuChamado&id=<?php echo $chamado->id ?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
    </tr>
    <?php endforeach;?>
</table>
    </div>
    </div>
<?php include(__DIR__.'/../layout/footer.php'); ?>