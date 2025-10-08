<?php
session_start();

require_once "conexoes.php";
require_once 'utils.php';

verifica_sessao();

$conn = conectarPDO();

$nome_pesquisa = $_GET['nome_pesquisa'] ?? '';  // Operador de coalescência nula
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Listagem com Filtro</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" id="listagem_alunos">
        <div class="d-flex justify-content-center mt-2">
            <img src="https://portal.crea-sc.org.br/wp-content/uploads/2019/04/UNOESC-300x100.jpg" width="300px" />
        </div>

        <hr>

        <?php
        if (!isset($_SESSION["usuario"])) {
            echo "<h4>Por favor, primeiramente faça o <em>login</em> no sistema</h4>";
            header('Refresh: 10; url=index.php');
            exit();
        }
        ?>

        <div class="row align-items-center">
            <div class="col">
                <button type="button" onclick="window.history.back()" class="btn btn-outline-danger btn-lg">
                    <i class="fas fa-door-open"></i>
                    Voltar
                </button>
            </div>

            <div class="col">
                <h5>
                    <div class="float-end align-bottom">
                        Usuário:
                        <strong>
                            <?php echo $_SESSION['usuario']['nome']; ?>
                        </strong>

                        <a href="logout.php">
                            <i class="fa-solid fa-door-open"></i>
                        </a>
                    </div>
                </h5>
            </div>
        </div>

        <hr>

        <form action="listagem.php" method="get">
            <div class="d-flex mt-2 p-3 bg-secondary">
                <div class="input-group col-10 busca">
                    <span class="input-group-text">
                        <i class="fa fa-search"></i>
                    </span>

                    <div class="form-floating">
                        <input id="filtro" type="search" name="nome_pesquisa" class="form-control"
                            value="<?= $nome_pesquisa ?>" placeholder="Entre com o nome do aluno">
                        <label for="filtro" class="pt-2">Entre com o nome do aluno</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Buscar</button>

                    <div class="col-1"></div>

                    <button id="btnLimpar" type="button" class="btn btn-danger">Limpar</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <caption>Relação de Alunos</caption>

                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>Salário (R$)</th>
                    </tr>
                </thead>

                <?php
                $filtro = "%{$nome_pesquisa}%";
                $consulta = "SELECT * FROM aluno WHERE nome LIKE '%" . $nome_pesquisa . "%'";
                $stmt = $conn->query($consulta);

                while ($aluno = $stmt->fetch()) {
                    ?>

                    <tr>
                        <td style="width: 10%;"><?php echo $aluno[0] ?></td>
                        <td style="width: 30%;"><?= $aluno[1] ?></td>
                        <td style="width: 20%;" class="text-center"><?= $aluno[2] ?></td>
                        <td style="width: 15%;" class="text-end"><?= $aluno[3] ?></td>
                    </tr>

                    <?php
                }
                $stmt = null;
                $conn = null;
                ?>

                <tfoot>
                    <tr>
                        <td colspan="5" style="text-align: center">
                            Data atual: <?= retornarDataAtual() ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#btnLimpar").on("click", function (e) {
                e.preventDefault();
                $("#filtro").val("");
                window.location = "listagem.php";
            });
        });
    </script>
</body>

</html>