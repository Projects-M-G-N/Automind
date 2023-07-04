<?php 

// Abrir sessão(Para saber se existe alguma sessão login)
session_start();

// Configurações(Carrega as configurações de base do site)
require_once('../config.php');

// Login validação(Vê se existe a sessão login)
if(!isset($_SESSION['login']) || $_SESSION['login'] === false){

    // Verifica se o formulario foi enviado
    if(isset($_POST['acao'])){

        // Ignore isso por enquanto
        // $gestor = new PDO("mysql:host=". MYSQL_SERVER .";bdname=". MYSQL_DATABASE .";charset=utf8", MYSQL_USER, MYSQL_PASS);

        // Acessa o BD
        $gestor = new PDO("mysql:host=localhost;dbname=teste;charset=utf8", "root", "");

        // Preparação para o comando do BD(prevenir mysql injection)
        $comando = $gestor->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha LIMIT 1");

        // Execução do comando(apos a verificação da variavel email e senha)
        $comando->execute(

            [
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha']
            ]

        );

        // Checagem para ver se o usuario existe
        if ($comando->rowCount() == 1) {

            $_SESSION['login'] = true;

            // Redirecionamento para a página inicial
            header('Location: /Avaliacao-TRI/public/');

        }

    }

    // Ficar repetindo a tela de login até o usuario entrar
    include('../core/views/login.php');

}
// Verifica se a sessão esta criada e se ela é verdadeira
elseif(isset($_SESSION['login']) && $_SESSION['login'] === true){

    // Auto load(Conectar as rotas)
    require_once('../vendor/autoload.php');

    // Rotas(Gerir as rotas)
    require_once('../core/rotas.php');

}