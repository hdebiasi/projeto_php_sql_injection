<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/x-icon" href="./favicon.ico">

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
