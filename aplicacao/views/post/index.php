<?php include(__DIR__ . '/../layout/menu.php');?>
<h1>Dexter Blog (Home - Post)</h1>

<table class="table table-striped">
	<tr class="info">
		<th>id</th>
		<th>titulo</th>
		<th>conteudo</th>
		<th>autor</th>
		<th>email</th>
		<th>Acoes</th>
	</tr>
	<tr>
		<?php foreach ($posts as $post):?>
		<td><?php echo $post->id; ?></td>
		<td><?php echo $post->titulo; ?></td>
		<td><?php echo $post->conteudo; ?></td>
		<td><?php echo $post->autor->nome;?></td>
		<td><?php echo $post->autor->email;?></td>
		<td>
			<a href="index.php?c=post&acao=exibir&id=<?php echo $post->id;?>">ver</a>
			<a href="index.php?c=post&acao=exibir&id=<?php echo $post->id;?>">Remover</a>
		</td>
	</tr>
		<?php endforeach;?>
</table>

<?php include(__DIR__.'/../layout/footer.php'); ?>