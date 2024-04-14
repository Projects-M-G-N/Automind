<?php

// Abrir sessão(Para saber se existe alguma sessão login)
session_start();

// Carregando todas as classesdo projeto
require_once('../vendor/autoload.php');

// Login validação(Vê se existe a sessão login)
if (!isset($_SESSION['login'])) {

    // Verifica se o formulario foi enviado
    if (isset($_POST['acao'])) {

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
            header('Location: /Avaliacao-TRI/');
        }
    }

}
// Verifica se a sessão esta criada e se ela é verdadeira
if(isset($_SESSION['login'])) {
    require_once('../core/rotas.php');
} else {
    require_once('../core/login.php');
}
