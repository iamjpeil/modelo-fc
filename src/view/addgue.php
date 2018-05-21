<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>  
<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>
<?php     
require_once('../controller/guerras/functions.php');
add();
?>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>    
	<?php clear_messages(); ?>
<?php endif; ?>

<div style="margin-left: 2%">
	<h2>Nova Guerra</h2>	
	<form action="addgue.php" method="post">
		<!-- area de campos do form -->
		<hr />
		<div class="row">
			<div class="form-group col-md-7">
				<label for="exampleFormControlSelect1">Família Desafiadora</label>
				<select class="form-control"  name="guerra[id_familia_desafiadora]" id="exampleFormControlSelect1">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
			<div class="form-group col-md-7">
				<label for="exampleFormControlSelect1">Família Desafiada</label>
				<select class="form-control" name="guerra[id_familia_desafiada]" id="exampleFormControlSelect1">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
			<div class="form-group col-md-7">
				<label for="nome">Início</label>
				<input type="date" class="form-control" name="guerra['inicio']">
			</div>
			<div class="form-group col-md-7">
				<label for="nome">Fim</label>
				<input type="date" class="form-control" name="guerra['fim']">
			</div>
			<div class="form-group col-md-7">
				<label for="exampleFormControlSelect1">Família Vencedora</label>
				<select class="form-control"  name="guerra[id_familia_vencedora]" id="exampleFormControlSelect1">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>		
		</div>
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-dark">Salvar</button>	
				<a href="<?php echo BASEURL; ?>view/familias.php" class="btn btn-warning">Voltar</a>
			</div>
		</div>
	</form>
</div>
<?php include(FOOTER_TEMPLATE); ?>