<?php

// Iniciando a sessão
session_start();

// Configurações(Carrega as configurações de base do site)
require_once('../../config.php');

// Vê se o usuario esta logado
if (!isset($_SESSION['login'])) {

    if (isset($_POST['enviar'])) {

        // Acesso ao BD
        $gestor = new PDO("mysql:host=localhost;dbname=teste;charset=utf8", "root", "");

        // Preparação para o comando do BD(prevenir mysql injection)
        $comando = $gestor->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");

        // Execução do comando(apos a verificação da variavel email e senha)
        $comando->execute(

            [
                ':email' => $_POST['emailS']
            ]

        );

        // Checagem para ver se o usuario existe

    }
}
