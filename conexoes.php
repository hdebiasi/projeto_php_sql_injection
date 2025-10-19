<?php
session_start();

require_once 'dados_acesso.php';
require_once 'utils.php';

// mysqli_report(MYSQLI_REPORT_OFF);

function conectarPDO()
{
    try {
        console_log('Iniciando conexão...');
        foreach ($_ENV as $k=>$v) {
            console_log($k . " => " . $v);
        }
        console_log(getenv('MYSQLDATABASE'));
        $URL = DSN . ':host=' . SERVIDOR . ';port=' . PORTA . ';dbname=' . BANCODEDADOS;
        console_log($URL);
        //$conn = new PDO($URL, USUARIO, SENHA);
        // echo '<h3>Conexão com PDO realizada com sucesso!</h3>';
        //console_log('Conexão com PDO realizada com sucesso!');
        //verificarTabelaUsuario($conn);
        //return $conn;
        
        return null;
    } catch (PDOException $e) {
        console_log('<h3>Erro: ' . $e->getMessage() . '</h3>');
        exit();
    }
}
function conectarMySQLi_PD()
{
    $conn = @mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCODEDADOS);
    if (!$conn) {
        die('<h3>Erro: ' . mysqli_connect_error() . '</h3>');
    } else {
        console_log('Conexão com MySQLi Procedural realizada com sucesso!');
        echo '<h3>Conexão com MySQLi Procedural realizada com sucesso!</h3>';
    }
    return $conn;
}

function verificarTabelaUsuario($conn)
{
    // Verifica se a tabela usuario existe
    $stmt = $conn->query('SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES
 WHERE (TABLE_SCHEMA = "' . BANCODEDADOS . '") AND (TABLE_NAME = "usuario")');
    if (!$stmt->fetchColumn()) {
        // Cria a tabela 'usuario' se ela não existir e a popula com alguns registros
        $stmt = $conn->query('CREATE TABLE IF NOT EXISTS usuario (
                                id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
                                nome varchar(60) NOT NULL,
                                username varchar(30) UNIQUE NOT NULL,
                                email varchar(240) UNIQUE NOT NULL,
                                senha varchar(40) NOT NULL
                                ) ENGINE=InnoDB;'
                );
        $stmt = $conn->query('INSERT INTO usuario
                    VALUES (null, "Herculano De Biasi", "herculano", "herculano.debiasi@gmail.com", "123456");');
    }
}

function login($conn)
{
    if (isset($_POST['logar']) and !empty($_POST['usuario']) and !empty($_POST['senha'])) {
        $username = $_POST['usuario'];
        $senha = $_POST['senha'];

        $consulta = "SELECT * FROM usuario WHERE username = '$username' AND senha = '$senha'";

        $stmt = $conn->query($consulta);
        $usuario = $stmt->fetch();

        if (!$usuario) {
            $mensagem = 'Usuário ou senha não encontrado!';

            return $mensagem;
        } else {
            configura_sessao();
            $_SESSION["usuario"] = $usuario;
            verifica_sessao();
            header("Location: listagem.php");
        }
    }
}

function configura_sessao()
{
    // Duração da sessão no servidor
    // ini_set('session.cookie_secure', 1);
    // ini_set('session.cookie_httponly', 1);
    ini_set("session.cookie_lifetime", 1200);
    ini_set("session.gc_maxlifetime", 1200);
}

function verifica_sessao()
{
    $tempo_inativo = 1200; // 2 minutos em segundos

    if (isset($_SESSION['ULTIMA_ATIVIDADE']) && (time() - $_SESSION['ULTIMA_ATIVIDADE'] > $tempo_inativo)) {
        session_unset();
        session_destroy();
        session_start();
    }
    $_SESSION['ULTIMA_ATIVIDADE'] = time(); // Atualiza instante da última atividade
}
