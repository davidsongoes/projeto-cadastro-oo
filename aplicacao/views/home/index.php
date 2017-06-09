<?php
        include(__DIR__ . '/../layout/header.php');
?>
<div class="row">
        <div class="col-lg-3">
                <?php  include(__DIR__ . '/../layout/menu.php');?>
        </div>
        <div class="col-lg-9">
                <?php
                \components\Helper::mostraAlerta("success");
                \components\Helper::mostraAlerta("danger");
                ?>
                <p><b>Seja Bem-Vindo</b></p>
                <p>Nosso Sistema de Controle de Efetivo agilizará seu processo</p>
        </div>
</div>



<?php include(__DIR__ . '/../layout/footer.php'); ?>
