<?php require_once('functions.php');
alunos(); ?>
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
		<tr><th>CPF</th>
			<th width="30%">Nome</th>
			<th>Turma</th>
		</tr>
	</thead>

	<tbody>
		<?php if ($alunos) : ?>
			<?php foreach ($alunos as $aluno) : ?>
				<tr>
					<td><?php echo $aluno['CPF_aluno']; ?></td>
					<td><?php echo $aluno['nome_aluno']; ?></td>
					<td><?php echo $aluno['turma']; ?></td>
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