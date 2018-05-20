<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>  
<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>
<?php     
require_once('../controller/familias/functions.php');
edit();
?>
<div style="margin-left: 2%">
<h2>Editar Família</h2>

<form action="editfam.php?id=<?php echo $familia['id']; ?>" method="post">
 <hr />
 <div class="row">
  <div class="form-group col-md-7">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" name="familia['nome']" placeholder="Nome Família" value="<?php echo $familia['nome']; ?>">
  </div>  
  <div class="form-group col-md-7">
    <label for="qtdmembros">Quantidade de Membros</label>
    <input type="number" class="form-control" name="familia['quantidade_membros']" value="<?php echo $familia['quantidade_membros']; ?>">
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