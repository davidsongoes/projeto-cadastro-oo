<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" lang="pt">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Teste</title>

    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="dist/css/image_upload.css">
    <link rel="stylesheet" href="dist/css/main.css">
    <script src="dist/js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="dist/js/script.js"></script>
    <script src="dist/js/alert.js"></script>
    <script src="dist/js/image_upload.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="dist/css/jquery-ui.css">
    <script src="dist/js/jquery-1.10.2.js"></script>
    <script src="dist/js/jquery-ui.js"></script>

<!--    <script type="text/javascript" src="jquery.js"></script>-->


<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->
<!--    <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
<!--    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
</head>
<?php if($_SESSION['usuario_logado']):?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">SISCONE - Sistema de Controle de Efetivo</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['usuario_logado'])): ?>
                    <li><a href="">Olá, <?php echo $_SESSION['usuario_logado'] ?></a></li>
                    <li><a href="index.php?c=usuario&acao=logout">Sair</a></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php endif;?>

<body>
<div class="">






