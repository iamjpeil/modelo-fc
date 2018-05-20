<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>  
<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>
<?php     
require_once('../controller/familias/functions.php');
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

<a style="float: right; margin-top: 10px; margin-bottom: 10px;" class="btn-sm btn-dark" href="/modelo-fc/src/view/familias.php"><i class="fa fa-refresh"></i> Atualizar</a>

<?php if ($db) : ?>
  <table class="table table-responsive-lg table table-hover table-striped table-light">
    <thead>
      <tr>
        <th scope="col">Família</th>
        <th scope="col">Membros</th>
        <th scope="col">Guerras</th>
        <th scope="col">Vitórias</th>
        <th scope="col">Derrotas</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($familias) : ?>
        <?php foreach ($familias as $familia) : ?>
          <tr>
            <td><?php echo $familia['nome']; ?></td>
            <td><?php echo $familia['quantidade_membros']; ?></td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td class="actions">
              <a href="<?php echo BASEURL; ?>view/editfam.php?id=<?php echo $familia['id']; ?>" class="btn btn-sm btn-primary">
                <i class="fa fa-pencil"></i> Editar</a>
                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $familia['id']; ?>">
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


     <!-- <div style="margin-left: 45%;"><button type="button" class="btn-lg btn-dark" data-toggle="modal" data-target="#AddFamModal">Adicionar Família</button></div> -->


     <div style="margin-left: 45%;"><a class="btn-lg btn-dark" href="<?php echo BASEURL; ?>view/addfam.php"><i class="fa fa-plus"></i> Adicionar Família</a></div>


     

   <?php else : ?> 
    <div class="alert alert-danger" role="alert">
     <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>    
   </div>  
 <?php endif; ?>
 <!--<?php include('modaladd.php'); ?>-->
 <?php include('../view/includes/modaldel.php'); ?>
 <?php include(FOOTER_TEMPLATE); ?>