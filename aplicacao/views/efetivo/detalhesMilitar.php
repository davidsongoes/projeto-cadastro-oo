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
                <li class="breadcrumb-item active">Detalhes - <?php echo $efetivo->posto_graduacao.' '.$efetivo->nome_guerra?></li>
            </ol>
            <h1>Detalhes do Militar</h1>
            <div class="row">
                <div class="col-lg-6">
                    <h4>Posto/Graduação: <?php echo $efetivo->posto_graduacao ?></h4>
                    <h4>Especialidade: <?php echo $efetivo->especialidade ?></h4>
                    <h4>Seção: <?php echo $efetivo->secao ?></h4>
                </div>
                <div class="col-lg-6">
                    <h4>Saram: <?php echo $efetivo->saram ?></h4>
                    <h4>Nome Completo: <?php echo $efetivo->nome_completo ?></h4>
                    <h4>Data de Nascimento: <?php echo AbstractModel::desformataData($efetivo->data_nascimento) ?></h4>
                    <h4>Data da Ultima
                        Promoção: <?php echo AbstractModel::desformataData($efetivo->data_ultima_promocao) ?></h4>
                </div>
            </div>
        </div>
    </div>

<?php
include(__DIR__ . '/../layout/footer.php');
?>