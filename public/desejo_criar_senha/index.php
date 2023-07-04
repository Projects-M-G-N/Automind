<?php 

// Iniciando a sessão
session_start();

// Configurações(Carrega as configurações de base do site)
require_once('../../config.php');

// Preparando o envio de email
require_once('../../src/PHPMailer.php');
require_once('../../src/SMTP.php');
require_once('../../src/Exception.php');

// Usando os arquivos de email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Vê se o usuario esta logado
if(!isset($_SESSION['login'])){

    if(isset($_POST['enviar'])){

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
        if ($comando->rowCount() == 1) {

            $mail = new PHPMailer(true);
            $senha_temp = 'hdhudkdj';

            try{

                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'emailparatestes303@gmail.com';
                $mail->Password = 'senhaemailtestes123';
                $mail->Port = 587;

                $mail->setFrom('emailparatestes303@gmail.com');
                $mail->addAddress($_POST['emailS']);

                $mail->isHTML(true);
                $mail->Subject = 'Sua nova senha';
                $mail->Body = "Seu codigo é <h1>$senha_temp</h1>";

                if($mail->send()){
                    echo "Email enviado com sucesso";
                }else{
                    echo "Ocorreu um erro";
                }

            }catch(Exception $e){

                // include('../../core/views/senha_nova.php');
                echo "Erro";

            }

        }

    }

    include('../../core/views/senha_nova.php');

}

?>