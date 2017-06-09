<?php include(__DIR__ . '/../layout/menu.php');?>
<h1>Dexter Blog (Autor Home)</h1>
<table class="table table-striped">
	<tr>
		<th>id</th>
		<th>nome</th>
		<th>email</th>
		<th>senha</th>
		<th>acoes</th>
	</tr>
	<tr>
		<?php foreach ($autores as $autor):?>
		<td><?php echo $autor->id; ?></td>
		<td><?php echo $autor->nome; ?></td>
		<td><?php echo $autor->email; ?></td>
		<td><?php echo $autor->senha; ?></td>
		<td>
		<a href="index.php?c=autor&acao=exibir&id=<?php echo $autor->id;?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> /</a>
		<a href="index.php?c=autor&acao=remover&id=<?php echo $autor->id;?>"><span class="glyphicon glyphicon-remove botaoVermelho" aria-hidden="true"></span></a>
		</td>
	</tr>
<?php endforeach;?>

</table>


<?php include(__DIR__.'/../layout/footer.php'); ?>