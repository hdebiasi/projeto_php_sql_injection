<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <title>Listagem</title>
</head>

<body>
    <div class="container-fluid" id="listagem_alunos">
        <div class="d-flex justify-content-center mt-2">
            <img src="https://portal.crea-sc.org.br/wp-content/uploads/2019/04/UNOESC-300x100.jpg" width="300px" />
        </div>

        <hr>

        <?php
        require_once 'listaPDO.php';

        verifica_sessao();

        if (!isset($_SESSION["usuario"])) {
            echo "<h4>Por favor, primeiramente faça o <em>login</em> no sistema</h4>";
            header('Refresh: 10; url=index.php');
            exit();
        }
        setcookie(session_name(), session_id(), time() + 60);
        ?>

        <div class="row align-items-center">
            <div class="col">
                <h5>
                    <div class="float-end align-bottom">
                        Usuário:
                        <strong>
                            <?php
                            echo $_SESSION['usuario']['nome'];
                            ?>
                        </strong>

                        <a href="logout.php">
                            <i class="fa-solid fa-door-open"></i>
                        </a>
                    </div>
                </h5>
            </div>
        </div>

        <hr>

        <?php
        listarDadosPDO();
        ?>
    </div>
</body>

</html>