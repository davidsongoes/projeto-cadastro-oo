<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 28/01/15
 * Time: 08:53
 */
include(__DIR__ . '/../layout/menu.php');
?>

<h1>Crud para usuarios</h1>

<ul>
    <li><a href="index.php?c=usuario&acao=viewUsuario">Adicionar novo</a></li>
    <li><a href="index.php?c=usuario&acao=exibir">Listar todos</a></li>
</ul>
<?php
include(__DIR__ . '/../layout/footer.php');