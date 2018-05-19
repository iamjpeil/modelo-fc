<!DOCTYPE html>
<html>
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/modelo-fc/src/model/css/style.css">

  <title>Teste F.C - Guerras</title>
</head>
<body>

  <?php

  include 'includes/navbar.php';

  ?>
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
        <th scope="col">#</th>
        <th scope="col">Família Desafiadora</th>
        <th scope="col">Família Desafiada</th>
        <th scope="col">Início</th>
        <th scope="col">Fim</th>
        <th scope="col">Vencedora</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
      </tr>
    </tbody>
  </table>

  <div style="margin-left: 45%;"><button type="button" class="btn-lg btn-dark">Adicionar Guerra</button></div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>