<?php
require_once "conexoes.php";
require_once 'utils.php';

/*$conn = conectarPDO();

if(isset($_POST['logar'])) {
    $mensagem = login($conn);

    echo '<div class="container"><div id="flash-msg" class="alert alert-danger fade show d-flex justify-content-center align-items-center">
            <i class="bi-exclamation-octagon-fill"></i>
            <span class="me-auto px-3"><strong class="mx-2">Erro! </strong>' . $mensagem . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div></div>';
}*/
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/x-icon" href="./favicon.ico">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <title>Login</title>
</head>
<body>
    <div class="container" id="listagem_alunos">
        <div class="d-flex justify-content-center mt-2">
            <img src="https://portal.crea-sc.org.br/wp-content/uploads/2019/04/UNOESC-300x100.jpg" width="300px" />
        </div>

        <hr>

        <form name="frmUsuario" method="post" action="" class="container">
            <h3 class="text-center">Tela de <em>Login</em></h3>

            <div class="w-25 text-center mx-auto">
                <label for="user">
                    <br>Nome de usuário (<em>username</em>)<br>
                </label>
                <input class="form-control" id="user" type="text" name="usuario" placeholder="Informe seu nome de usuário" required autofocus>
                
                <br>

                <label for="senha">
                    <br>Senha<br>
                </label>
                <input class="form-control" id="senha" type="password" name="senha" placeholder="Informe sua senha" required>

                <br>
                <br>

                <input class="btn btn-primary" type="submit" name="logar" value="Enviar">
                <input class="btn btn-secondary" type="reset" value="Limpar">
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#flash-msg").delay(5000).fadeOut("slow", function () {
                $(this).alert('close');
            });
        });
    </script>
</body>
</html>
