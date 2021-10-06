<?php include "../validar.php"?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Pesquisar</title>
  </head>
  <body>
    <?php

      $pesquisa = $_POST['busca'] ?? '';
      include "conexao.php";

      $sql = "SELECT * 
                FROM users 
              WHERE nome LIKE '%$pesquisa%'";

      $dados = mysqli_query($conn, $sql);
    ?>

    <div class="container mt-3">
      <div class="row">
        <div class="col">
          <div class="row g">
            <div class="col-auto">
              <h1>Pesquisar</h1>   
            </div>
            <div class="col-auto my-auto">
            <a class="btn btn-danger btn-sm my-auto" href="../logout.php" role="button" align="end">Sair</a>   
            </div>
          </div>     
        <nav class="navbar navbar-light mt-4">
          <form class="row g-2" action="pesquisa.php" method="POST">
            <div class="col-auto"><input class="form-control" type="search" placeholder="Pesquisar" arial-label="Pesquisar" name="busca" autofocus /></div>
            <div class="col-auto"><button class="btn btn-outline-success btn" type="submit">Pesquisar</button></div>
          </form>
        </nav>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Endereco</th>
              <th scope="col">Telefone</th>
              <th scope="col">Email</th>
              <th scope="col">Data de Nascimento</th>
              <th scope="col">Rg</th>
              <th scope="col">Cpf</th>
              <th scope="col">Funções</th>
            </tr>
          </thead>
          <tbody>
          <?php
            while($linha = mysqli_fetch_assoc($dados)) {
              $id = $linha['id'];
              $nome = $linha['nome'];
              $endereco = $linha['endereco'];
              $telefone = $linha['telefone'];
              $email = $linha['email'];
              $data_nascimento = mostra_data($linha['data_nascimento']);
              $rg = $linha['rg'];
              $cpf = $linha['cpf'];

              echo "<tr>
                      <th scope='row'>$nome</th>
                      <td>$endereco</td>
                      <td>$telefone</td>
                      <td>$email</td>
                      <td>$data_nascimento</td>
                      <td>$rg</td>
                      <td>$cpf</td>
                      <td width=150px>
                        <a href='cadastro_edit.php?id=$id' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onclick=" .'"' ."pegar_dados($id, `$nome`)" .'"' .">Excluir</a>
                      </td>
                    </tr>";             
            }
          ?>
          </tbody>
        </table>
        <a class="btn btn-primary btn-sm" href="cadastro.php" role="button">Novo Usuário</a>
        </div> 
        </div>  
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="excluir_script.php" method="POST">
              <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
              <input type="hidden" name="id" id="cod_pessoa" value="">
              <input type="hidden" name="nome" id="nome_pessoa_1" value="">
              <input type="submit" class="btn btn-danger" value="Sim">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function pegar_dados(id, nome) {
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('cod_pessoa').value = id;
        document.getElementById('nome_pessoa_1').value = nome;
      }
    </script>

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