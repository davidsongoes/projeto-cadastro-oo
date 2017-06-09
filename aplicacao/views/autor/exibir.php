<?php include(__DIR__ . '/../layout/menu.php');?>
<h1>Dexter Blog (Exibir)</h1>

<h2><label>USUARIO:</label><?php echo " ".$autor->nome; ?></h2>
<ul>
	<li><label>ID:</label> <?php echo " ".$autor->id; ?></li>
	<li><label>E-MAIL:</label><?php echo " ".$autor->email; ?></li>
	<li><label>SENHA:</label><?php echo " ".$autor->senha; ?></li>
</ul>

<?php include(__DIR__.'/../layout/footer.php'); ?>