<?php use components\Helper;
include(__DIR__ . '/../layout/header.php');

?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">
        <h1>Histórico do Chamado</h1>
        <p>Acompanhe qual solucionador modificou seu chamado</p>
        <hr/>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Solucionador</th>
                <th>Hora da Modificação</th>
                <th>Operação</th>
            </tr>
            <tr>
                <?php foreach ($historicos as $historico):?>
                <td><?php echo $historico->chamadoId ?></td>
                <td><?php echo $historico->usuarioId; ?></td>
                <td><?php echo $historico->horaHistorico; ?></td>
                <td><?php echo $historico->descricao; ?></td>

            </tr>
            <?php endforeach;?>
        </table>
    </div>
    </div>
<?php include(__DIR__.'/../layout/footer.php'); ?>