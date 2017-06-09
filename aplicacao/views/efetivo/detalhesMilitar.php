<?php
include(__DIR__ . '/../layout/header.php');
use components\Helper;
use models\base\AbstractModel;
?>
    <div class="row">
        <div class="col-lg-3">
            <?php include(__DIR__ . '/../layout/menu.php'); ?>
        </div>
        <div class="col-lg-9">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?c=efetivo&acao=listarMilitares">Lista do Efetivo</a></li>
                <li class="breadcrumb-item active">Detalhes - <?php echo $efetivo->posto_graduacao.' '.utf8_encode($efetivo->nome_guerra)?></li>
            </ol>
            <h1>Detalhes do Militar</h1>
            <div class="row">
                <img src="../../../fotos/<?php echo $efetivo->posto_graduacao.'_'.utf8_encode($efetivo->nome_guerra).'.jpg'?>" style="margin-left: 15px" class="img-thumbnail" width="175" height="225">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h5>Saram: <?php echo $efetivo->saram ?></h5>
                    <h5>Posto/Graduação: <?php echo $efetivo->posto_graduacao ?></h5>
                    <h5>Quadro: <?php echo $efetivo->quadro ?></h5>
                    <h5>Especialidade: <?php echo $efetivo->especialidade ?></h5>
                    <h5>Seção: <?php echo $efetivo->secao ?></h5>
                    <h5>Ramal: <?php echo $efetivo->ramal ?></h5>
                    <?php echo (!empty($efetivo->rtcaer)) ?  "<h5>RTCAER: $efetivo->rtcaer </h5>" : "";?>
                </div>
                <div class="col-lg-6">
                    <h5>Situação: <?php echo $efetivo->situacao ?></h5>
                    <h5>Nome Completo: <?php echo utf8_encode($efetivo->nome_completo) ?></h5>
                    <h5>Nome de Guerra: <?php echo utf8_encode($efetivo->nome_guerra) ?></h5>
                    <h5>Data de Nascimento: <?php echo AbstractModel::desformataData($efetivo->data_nascimento) ?></h5>
                    <h5>Data da Última Promoção: <?php echo AbstractModel::desformataData($efetivo->data_ultima_promocao) ?></h5>
                    <h5>E-mail: <?php echo $efetivo->email ?></h5>
                    <h5>Antiguidade na Turma: <?php echo $efetivo->antiguidade_turma ?></h5>
                </div>
            </div>
        </div>
    </div>

<?php
include(__DIR__ . '/../layout/footer.php');
?>