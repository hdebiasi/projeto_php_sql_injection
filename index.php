<?php
require_once 'utils.php';
console_log('olá PHP');

/*require_once "conexoes.php";

$conn = conectarPDO();

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
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;400;500;700&display=swap" >

    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link rel="stylesheet" href="./style.css">
    
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
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function() {
            $("#flash-msg").delay(5000).fadeOut("slow", function () {
                $(this).alert('close');
            });
        });
    </script>
</body>
</html>