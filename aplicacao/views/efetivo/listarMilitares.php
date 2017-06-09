<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 08/06/17
 * Hora: 14:07
 */
use components\Helper;
include(__DIR__ . '/../layout/header.php');
//$solucionadores = \models\Usuario::listaSolucionador();
?>
    <div class="row">
        <div class="col-lg-3">
            <?php  include(__DIR__ . '/../layout/menu.php');?>
        </div>
        <div class="col-lg-9">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Lista do Efetivo</li>
            </ol>
            <h1>Lista do Efetivo</h1><br/>
            <table class="table table-responsive table-striped">
                <tr>
                    <th>SARAM</th>
                    <th>Nome Completo</th>
                    <th>Nome de Guerra</th>
                    <th>Posto/Grad</th>
                    <th>Situação</th>
                    <th>Especialidade</th>
                    <th>Quadro</th>
                    <th>Seção</th>
                    <th>Ramal</th>
                    <th>Opções</th>
                </tr>
                <?php foreach ($efetivos as $efetivo):?>
                <tr class="alinhamento">
                    <td><?php echo $efetivo->saram; ?></td>
                    <td><?php echo $efetivo->posto_graduacao; ?></td>
                    <td><?php echo $efetivo->nome_completo; ?></td>
                    <td><?php echo $efetivo->nome_guerra; ?></td>
                    <td><?php echo $efetivo->situacao; ?></td>
                    <td><?php echo $efetivo->especialidade; ?></td>
                    <td><?php echo $efetivo->quadro; ?></td>
                    <td><?php echo $efetivo->secao; ?></td>
                    <td><?php echo $efetivo->ramal; ?></td>
                    <td>
                        <a href="index.php?c=efetivo&acao=detalhesMilitar&id=<?php echo $efetivo->id;?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                        <a href="index.php?c=efetivo&acao=editarMilitar&id=<?php echo $efetivo->id;?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="index.php?c=efetivo&acao=excluirMilitar&id=<?php echo $efetivo->id;?>"><span class="glyphicon glyphicon-remove botaoVermelho" aria-hidden="true"></span></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>


        </div>
    </div>
<?php include(__DIR__.'/../layout/footer.php'); ?>