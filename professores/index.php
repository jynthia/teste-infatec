<?php require_once('functions.php');
index(); 

$db = open_database();

if(isset($_GET['delete']))
{
	$id = $_GET['delete'];

	$sql = "DELETE FROM professores WHERE CPF_professor = '$id'";

	if ($db->query($sql) === TRUE) {
    echo "Deletado!";
    } else {
    echo "Erro: " . $sql . "<br>" . $db->error;
    } 
}

?>


<header>

<?php include(HEADER); ?>

</header>

<style>

		body {

			padding: 2%;

        }
        
	</style>

<?php if ($db) : ?>
	<div class="row">
	<div class="col-xs-6 col-sm-3 col-md-2">
	<a href="/professores/add.php" class="btn btn-primary">					
	<div class="row">
	<div class="col-xs-12 text-center">
	<i class="fa fa-plus fa-5x"></i>						</div>						<div class="col-xs-12 text-center">							<p>Adicionar professor</p>						</div>					</div>				</a>			</div>		
	<div class="col-xs-6 col-sm-3 col-md-2">				<a href="/professores/index.php" class="btn btn-default">					<div class="row">						<div class="col-xs-12 text-center">							<i class="fa fa-user fa-5x"></i>						</div>						<div class="col-xs-12 text-center">							<p>Professores</p>						</div>					</div>				</a>			</div>		</div>		
<?php else : ?>			<div class="alert alert-danger" role="alert">				<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>			
</div>		
<?php endif; ?>	


<?php if (!empty($_SESSION['message'])) : ?>

	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

		<?php echo $_SESSION['message']; ?>

	</div>

<?php clear_messages(); ?>

<?php endif; ?>		

<hr>

<table class="table table-hover">
	<thead>
		<tr><th>CPF</th>
			<th width="30%">Nome</th>
		</tr>
	</thead>

	<tbody>
		<?php if ($professores) : ?>
			<?php foreach ($professores as $professor) : ?>
				<tr>
					<td><?php echo $professor['CPF_professor']; ?></td>
					<td><?php echo $professor['nome_professor']; ?></td>
					<td class="actions text-right">
						<a href="update.php?id=<?php echo $professor['CPF_professor']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>Editar</a>
							<a href="?delete=<?php echo $professor['CPF_professor']; ?>" name="deleta" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal">
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