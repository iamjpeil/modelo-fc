<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>  
<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>
<?php     
require_once('../controller/guerras/functions.php');
index();
$count = 0;
?>

<?php if (!empty($_SESSION['message'])) : ?>
  <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $_SESSION['message']; ?>
 </div>    
 <?php clear_messages(); ?>
<?php endif; ?>

<a style="float: right; margin-top: 10px; margin-bottom: 10px;" class="btn-sm btn-dark" href="/modelo-fc/src/view/guerras.php"><i class="fa fa-refresh"></i> Atualizar</a>

<?php if ($db) : ?>
  <br>
  <div class="col-sm-10">
    <form class="form-inline">      
      <div class="form-group mb-2">
        <label class="mx-sm-4">Início</label>
        <input type="date" class="form-control">
      </div>
      <div class="form-group mx-sm-4 mb-2">
        <label class="mx-sm-4">Fim</label>
        <input type="date" class="form-control">
      </div>
      <button type="submit" class="btn btn-dark mb-2">Filtrar</button>
    </form>
  </div>
  <br>

  <table class="table table-responsive-lg table table-hover table-striped table-light">
    <thead>
      <tr>
        <th scope="col">Família Desafiadora</th>
        <th scope="col">Família Desafiada</th>
        <th scope="col">Início</th>
        <th scope="col">Fim</th>
        <th scope="col">Vencedora</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>

      <?php if ($guerras) : ?>
        <?php foreach ($guerras as $guerra) : ?>
          <?php $count = $count + 1;?>
          <tr>
            <td><?php echo $guerra['id_familia_desafiadora']; ?></td>
            <td><?php echo $guerra['id_familia_desafiada']; ?></td>
            <td><?php echo $guerra['data_inicio']; ?></td>
            <td><?php echo $guerra['data_fim']; ?></td>
            <td><?php echo $guerra['id_familia_vencedora']; ?></td>
            <td class="actions">
              <a href="<?php echo BASEURL; ?>view/editgue.php?id=<?php echo $guerra['id']; ?>" class="btn btn-sm btn-primary">
                <i class="fa fa-pencil"></i> Editar</a>
                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $guerra['id']; ?>">
                  <i class="fa fa-trash"></i> Excluir       </a>
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

     <div style="margin-left: 45%;"><button type="button" class="btn-lg btn-dark">Adicionar Guerra</button></div>
   <?php else : ?> 
    <div class="alert alert-danger" role="alert">
     <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>    
   </div>  
 <?php endif; ?>

 <?php include(FOOTER_TEMPLATE); ?>
