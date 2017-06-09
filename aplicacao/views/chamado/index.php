<?php
include(__DIR__ . '/../layout/header.php');
?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">
<h1>Crud para os Chamados</h1>
<ul>
    <li><a href="index.php?c=chamado&acao=viewChamado">Adicionar novo</a></li>
    <li><a href="index.php?c=chamado&acao=listaChamados">Listar todos</a></li>
</ul>
        </div>
    </div>

<?php include(__DIR__ . '/../layout/footer.php');?>