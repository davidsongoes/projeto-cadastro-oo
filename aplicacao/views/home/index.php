<?php
        include(__DIR__ . '/../layout/header.php');
?>
<div class="row">
        <div class="col-lg-2">
                <?php  include(__DIR__ . '/../layout/menu.php');?>
        </div>
    <div class="container-fluid margem_direita">
        <div class="col-lg-10">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            </ol>
                <?php
                \components\Helper::mostraAlerta("success");
                \components\Helper::mostraAlerta("warning");
                \components\Helper::mostraAlerta("danger");
                ?>
                <p><b>Seja Bem-Vindo</b></p>
                <p>Nosso Sistema de Controle de Efetivo agilizará seu processo</p>
        </div>
    </div>
</div>



<?php include(__DIR__ . '/../layout/footer.php'); ?>
