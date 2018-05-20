<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="model/css/style.css">

  <title>Teste F.C</title>
</head>
<body>


  <?php require_once 'config.php'; ?>
  <?php require_once DBAPI; ?>  
  <?php include(HEADER_TEMPLATE); ?>
  <?php $db = open_database(); ?>

  <?php if ($db) : ?>



    <div class="jumbotron">
      <h1 class="display-4">Bem vindo</h1>
      <p class="lead">Este é o teste proposto pela Fácil Consulta</p>
      <hr class="my-4">
      <p>Utilize o menu acima para navegar entre esta página e as páginas referentes as famílias, e também a página referente as guerras.</p>
    </div>

  <?php else : ?> 
    <div class="alert alert-danger" role="alert">
     <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>    
   </div>  
 <?php endif; ?>

 <?php include(FOOTER_TEMPLATE); ?>