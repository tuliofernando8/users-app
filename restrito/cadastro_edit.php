<?php include "../validar.php"?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Alteração de Cadastro</title>
  </head>
  <body>
    <?php
      include "conexao.php";

      $id = $_GET['id'] ?? '';
      $sql = "SELECT *
                FROM users
              WHERE id = $id";

      $dados = mysqli_query($conn, $sql);
      $linha = mysqli_fetch_assoc($dados);

    ?>

    <div class="container mt-3">
      <div class="row">
        <div class="col">
        <h1>Editar Usuário</h1>
        <form class="mt-4" action="edit_script.php" method="POST">
        <div class="mb-3">
          <label for="nome" class="form-label"><b>Nome Completo</b></label>
          <input type="texto" class="form-control" name="nome" required value="<?php echo $linha['nome']?>">    
        </div>
        <div class="mb-3">
          <label for="endereco" class="form-label"><b>Endereço</b></label>
          <input type="texto" class="form-control" name="endereco" value="<?php echo $linha['endereco']?>">    
        </div>
        <div class="mb-3">
          <label for="telefone" class="form-label"><b>Telefone</b></label>
          <input type="texto" class="form-control" name="telefone" value="<?php echo $linha['telefone']?>">    
        </div>
        <div class="mb-3">
          <label for="email" class="form-label"><b>Email</b></label>
          <input type="email" class="form-control" name="email" value="<?php echo $linha['email']?>">    
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label"><b>Senha</b></label>
          <input type="password" class="form-control" name="senha"">    
        </div>
        <div class="mb-3">
          <label for="nome" class="form-label"><b>Data de Nascimento</b></label>
          <input type="date" class="form-control" name="data_nascimento" value="<?php echo $linha['data_nascimento']?>">    
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label"><b>CPF</b></label>
          <input type="texto" class="form-control" name="cpf" value="<?php echo $linha['cpf']?>">    
        </div>
        <div class="mb-3">
          <label for="rg" class="form-label"><b>RG</b></label>
          <input type="texto" class="form-control" name="rg" value="<?php echo $linha['rg']?>">    
        </div>
        <div class="mb-5 mt-3">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-danger" href="pesquisa.php">Cancelar</a>
        <input type="hidden" class="form-control" name="id" value="<?php echo $linha['id']?>">    
        </div>
        </form>
        </div>  
      </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>