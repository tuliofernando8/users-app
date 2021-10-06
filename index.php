<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="restrito/css/bootstrap.min.css" rel="stylesheet">

    <title>users_app</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4 mt-5">
          <h1 class="display-4" align="center">Login</h1>
          <form action="index.php" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" name="login" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">Entre com os seus dados de acesso.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input type="password" class="form-control" name="senha">
            </div>
            <button type="submit" class="btn btn-primary">Acessar</button>
          </form>
          <?php
            if(isset($_POST['login'])) {
              $login = $_POST['login'];
              $senha = md5($_POST['senha']);

              include "restrito/conexao.php";
              $sql= "SELECT * 
                      FROM `users`
                    WHERE email = '$login' AND senha = '$senha'";

              if($result = mysqli_query($conn, $sql)) {
                $num_registros = mysqli_num_rows($result);
                if($num_registros == 1) {
                  $linha = mysqli_fetch_assoc($result);
                  
                  if($login == $linha['email'] && $senha == $linha['senha']) {
                    session_start();
                    $_SESSION['login'] = "Robson";
                    header("location: restrito/pesquisa.php");
                  } else {
                    echo "Login inválido!";
                  }
                } else {
                  echo "Login ou senha não encontrados ou inválidos.";
                }
              } else {
                echo "Nenhum resultado";
              }
            }
          ?>
        </div>
      </div>
      <div class="col-4"></div>  
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
</html>