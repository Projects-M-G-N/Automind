<?php 

// Abrir sessão
session_start();

// Configurações
require_once('../config.php');

// Login validação
// if(!isset($_SESSION['login'])){

//     if(isset($_POST['acao'])){
//         // $gestor = new PDO("mysql:host=". MYSQL_SERVER .";bdname=". MYSQL_DATABASE .";charset=utf8", MYSQL_USER, MYSQL_PASS);

//         $gestor = new PDO("mysql:host=localhost;dbname=teste;charset=utf8", "root", "");

//         $comando = $gestor->prepare("SELECT * FROM pessoas WHERE nome=:email AND senha=:senha");
//         $comando->execute(
//             [
//                 ':nome' => $_POST['email'],
//                 ':senha' => $_POST['pass']
//             ]
//         );

//     }

//     include('../core/views/login.php');
// }
// else{
//     include('../core/views/inicio.php');
// }

// Auto load
require_once('../vendor/autoload.php');

// Rotas
require_once('../core/rotas.php');