<?php
$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');
$email = $_SESSION['usuario'];
$usuario = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()['id'];
$provas = $gestor->query("SELECT * FROM prova WHERE id_prof='$usuario'");
$cont = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Provas</title>
    <link rel="stylesheet" href="./public/assets/css/provas.css">
    <link rel="shortcut icon" href="./public/assets/img/logo.ico" type="image/x-icon">
</head>

<body>

    <header>
        <nav>
            <div class="logo">
                <img src="./public/assets/img/logo1.jpg" altg="logozinha">
            </div>   
                   
            <ul>
                <li><a href="./" class="gerar-prova" id="provasFeitasBtn">Início</a></li>
                <li><a href="./?a=cadQuest" class="gerar-prova" id="cadQuestaoBtn">Cadastrar Questão</a></li>
                <li><a href="./?a=bancodequestoes" class="gerar-prova" id="bancoQuestoesBtn">Banco de Questões</a></li>
            </ul>
            <a href="./?a=logout">Sair</a>
        </nav>
    </header>

    <main>
        <div class="provas">
            <?php 
            while ($prova = $provas->fetch(PDO::FETCH_ASSOC)) {
                $cont += 1;
            ?>
            <div class="prova" onclick="window.location.href='./?a=prova&id=<?= $prova['id']?>'">
                <h3>Prova <?= $cont?></h3>
                <p>Emissão: <?= ($prova['emitido'] == 0) ? "Não foi emitida" : $prova['emissao']?></p>
            </div>
            <?php }?>
        </div>
    </main>
</body>

</html>