<?php
include(__DIR__ . '/../layout/header.php');
use components\Helper;
?>
<div class="row">
    <div class="col-lg-2">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="container-fluid margem_direita">
        <div class="col-lg-10">
            <!--        Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?c=usuario&acao=exibir">Lista de Usuários</a>
                <li class="breadcrumb-item active">Detalhes do Usuário - <?php echo $usuario->login?></li>
            </ol>
<h1>Detalhes do Usuario</h1>

<div class="row">
    <div class="col-lg-6">
        <h5>Login:<?php echo " ".$usuario->login;?></h5>
        <h5>Saram: <?php echo " ".$usuario->saram ?></h5>
        <h5>Nome: <?php echo " ".$usuario->nome; ?></h5>
        <h5>Email: <?php echo " ".$usuario->email; ?></h5>
        <h5>Ativo: <?php echo " ". Helper::$ativo[$usuario->ativo] ?></h5>
        <h5>Grupo: <?php echo " ".Helper::$grupos[$usuario->grupo]; ?></h5>
    </div>
    <div class="col-lg-6">


    </div>
</div>
</div>
</div>









<?php
include(__DIR__ . '/../layout/footer.php');
?>