<?php require_once('functions.php');
perguntas(); ?>
<header>

<?php include(HEADER); ?>

</header>

<?php $db = open_database(); ?>
<style>
	body {
		padding: 2%;
	}
</style>

<hr>

<table class="table table-hover">
	<thead>
		<tr><th>Enunciado</th>
			<th width="30%">Resposta</th>
			
		</tr>
	</thead>

	<tbody>
		<?php if ($perguntas) : ?>
			<?php foreach ($perguntas as $pergunta) : ?>
				<tr>
					<td><?php echo $pergunta['enunciado']; ?></td>
					<td><?php echo $pergunta['resposta']; ?></td>
					<td class="actions text-right">
						<a href="view.php?id=<?php echo $professor['CPF_professor']; ?>" class="btn btn-sm btn-success">
							<i class="fa fa-eye"></i> Visualizar</a><a href="edit.php?id=<?php echo $professor['CPF_professor']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>Editar</a>
							<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-professor="<?php echo $professor['CPF_professor']; ?>">
							<i class="fa fa-trash"></i>Excluir</a>
					</td>
				</tr>
		<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="6">Nenhum registro encontrado.</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>		
<?php include(FOOTER); ?>