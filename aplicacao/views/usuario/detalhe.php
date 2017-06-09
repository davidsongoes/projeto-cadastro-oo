<?php
include(__DIR__ . '/../layout/header.php');
use components\Helper;
?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">

<h1>Detalhes do Usuario</h1>
    <h2>Login:<?php echo " ".$usuario->login;?></h2>
<div class="row">
    <div class="col-lg-6">
        <h4>Posto/Graduação: <?php echo " ".Helper::$posto_graduacoes[$usuario->postoGraduacao] ?></h4>
        <h4>Especialidade: <?php echo " ".Helper::$especialidades[$usuario->especialidade] ?></h4>
        <h4>Seção: <?php echo " ".Helper::$secoes[$usuario->secao] ?></h4>
        <h4>Grupo: <?php echo " ".Helper::$grupos[$usuario->grupo]; ?></h4>
    </div>
    <div class="col-lg-6">
        <h4>Saram: <?php echo " ".$usuario->saram ?></h4>
        <h4>Nome: <?php echo " ".$usuario->nome; ?></h4>
        <h4>Data de Nascimento: <?php echo " ".$usuario->dataNascimento ?></h4>
        <h4>Data de Praça: <?php echo " ".$usuario->dataPraca ?></h4>
        <h4>Data da Ultima Promoção: <?php echo " ".$usuario->dataUltimaPromocao ?></h4>
    </div>
</div>
</div>
</div>









<?php
include(__DIR__ . '/../layout/footer.php');
?>