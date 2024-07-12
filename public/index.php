<?php

// Abrir sessão(Para saber se existe alguma sessão login)
session_start();

// Carregando todas as classesdo projeto
require_once('../vendor/autoload.php');

// Login validação(Vê se existe a sessão login)
if (!isset($_SESSION['login'])) {

    // Verifica se o formulario foi enviado
    if (isset($_POST['logar'])) {

        // Acessa o BD
        $gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

        // Preparação para o comando do BD(prevenir mysql injection)
        $comando = $gestor->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha LIMIT 1");

        // Execução do comando(apos a verificação da variavel email e senha)
        $comando->execute(

            [
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha']
            ]

        );
        $_SESSION['usuario'] = $_POST['email'];

        // Checagem para ver se o usuario existe
        if ($comando->rowCount() == 1) {

            $_SESSION['login'] = true;

            // Redirecionamento para a página inicial
            echo "<script>window.location.href='./'</script>";
        }
    }

    if (isset($_POST['cadastrar'])) {

        $gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $comando = $gestor->prepare("SELECT * FROM usuarios WHERE email=:email LIMIT 1");
        $comando->execute(
            [
                ':email' => $email
            ]
        );

        if ($comando->rowCount() == 1) {
            $existe = true;
        } else {
            $existe = false;
        }
        if ($existe) {
            echo "<script>alert('Email já existe');</script>";
            echo "<script>window.location.href='./?a=cadastro'</script>";
            die;
        }

        $cadastrar = $gestor->prepare("INSERT INTO usuarios VALUES(NULL, :nome, :email, :senha, 1)");
        $cadastrar->execute(
            [
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senha,
            ]
        );

        $_SESSION['login'] = true;
        $_SESSION['usuario'] = $email;

        echo "<script>window.location.href='./'</script>";
    }
}
// Verifica se a sessão esta criada e se ela é verdadeira
if (isset($_SESSION['login'])) {
    require_once('../core/rotas.php');
} else {
    require_once('../core/login.php');
}

if (isset($_POST['cadastrarQuest'])) {
    $gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
    $email = $_SESSION["usuario"];
    $prof = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()["id"];
    $data = date('Y-m-d H:m:s');

    $assunto = $_POST['assunto'];
    $visu = $_POST['visu'];
    $dificuldade = $_POST['dif'];

    $textquest = $_POST['cadQuest'];

    if ($_POST['opcCorreta'] == 1) {
        $altCor = $_POST['opc1'];
        $opcAlt1 = $_POST['opc2'];
        $opcAlt2 = $_POST['opc3'];
        $opcAlt3 = $_POST['opc4'];
        $opcAlt4 = $_POST['opc5'];
    } else if ($_POST['opcCorreta'] == 2) {
        $altCor = $_POST['opc2'];
        $opcAlt1 = $_POST['opc3'];
        $opcAlt2 = $_POST['opc4'];
        $opcAlt3 = $_POST['opc5'];
        $opcAlt4 = $_POST['opc1'];
    } else if ($_POST['opcCorreta'] == 3) {
        $altCor = $_POST['opc3'];
        $opcAlt1 = $_POST['opc4'];
        $opcAlt2 = $_POST['opc5'];
        $opcAlt3 = $_POST['opc1'];
        $opcAlt4 = $_POST['opc2'];
    } else if ($_POST['opcCorreta'] == 4) {
        $altCor = $_POST['opc4'];
        $opcAlt1 = $_POST['opc5'];
        $opcAlt2 = $_POST['opc1'];
        $opcAlt3 = $_POST['opc2'];
        $opcAlt4 = $_POST['opc3'];
    } else {
        $altCor = $_POST['opc5'];
        $opcAlt1 = $_POST['opc1'];
        $opcAlt2 = $_POST['opc2'];
        $opcAlt3 = $_POST['opc3'];
        $opcAlt4 = $_POST['opc4'];
    }

    $sql_quest = $gestor->prepare("INSERT INTO questao VALUES (NULL, :prof, :assunto, :texto, :opcCor, :alt1, :alt2, :alt3, :alt4, :visu, :dificuldade, :data_cad)");
    $sql_quest->execute(
        [
            ":prof" => $prof,
            ":assunto" => $assunto,
            ":texto" => $textquest,
            ":opcCor" => $altCor,
            ":alt1" => $opcAlt1,
            ":alt2" => $opcAlt2,
            ":alt3" => $opcAlt3,
            ":alt4" => $opcAlt4,
            ":visu" => $visu,
            ":dificuldade" => $dificuldade,
            ":data_cad" => $data,
        ]
    );
}
