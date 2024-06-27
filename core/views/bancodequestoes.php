<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Banco de Questões</title>
    <link rel="stylesheet" href="./public/assets/css/bancodequestoes.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="shortcut icon" href="./public/assets/img/logo.ico" type="image/x-icon">

</head>

<body>
    <?php
    $gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');
    $email = $_SESSION['usuario'];
    $usuario = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()['id'];
    $questoes = $gestor->query("SELECT * FROM questao WHERE visu='Publico' OR idprofessor='$usuario'");
    ?>
    <header>
        <nav>
        <div class="logo">
                <img src="./public/assets/img/logo1.jpg" altg="logozinha">
        </div>
            <ul>
                <li><a href="./" class="gerar-prova" id="provasFeitasBtn">Início</a></li>
                <li><a href="./?a=cadQuest" class="gerar-prova" id="cadQuestaoBtn">Cadastrar Questão</a></li>
                <li><a href="./?a=provas" class="gerar-prova" id="provasFeitasBtn">Ver Provas Já Feitas</a></li>
            </ul>
            <a href="./?a=logout">Sair</a>
        </nav>
    </header>

    <main>
        <div class="questoes">
            <input type="hidden" name="" id="idUsu" value="<?= $usuario?>">
            <?php
            while ($questao = $questoes->fetch(PDO::FETCH_ASSOC)) {
                $id_quest = $questao['id'];
                $texto = $questao['texto_questao'];
                $img = $questao['img'];
                $pergunta = is_null($questao['pergunta']) ? null : $questao['pergunta'];
                $dificuldade = $questao['dificuldade'];
                $alternativas = $gestor->query("SELECT * FROM alternativas WHERE id='$id_quest'");
                while ($alt = $alternativas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <div class="questao" id="quest<?= $id_quest?>">
                        <h4>Dificuldade: <?= $dificuldade?></h4>
                        <p class="texto-questao"><?= $texto ?></p class="texto-questao">
                        <img src="./public/assets/img/<?= $img ?>" alt="">
                        <p class="pergunta-questao"><?= $pergunta ?></p class="pergunta-questao">
                        <div class="alternativas">
                            <ul>
                                <li class="<?php echo ($alt['alternativacorreta'] == 'a') ? "altCorreta alternativa" : "alternativa"?>">A - <?= $alt['alternativaa']?></li>
                                <li class="<?php echo ($alt['alternativacorreta'] == 'b') ? "altCorreta alternativa" : "alternativa"?>">B - <?= $alt['alternativab']?></li>
                                <li class="<?php echo ($alt['alternativacorreta'] == 'c') ? "altCorreta alternativa" : "alternativa"?>">C - <?= $alt['alternativac']?></li>
                                <li class="<?php echo ($alt['alternativacorreta'] == 'd') ? "altCorreta alternativa" : "alternativa"?>">D - <?= $alt['alternativad']?></li>
                                <li class="<?php echo ($alt['alternativacorreta'] == 'e') ? "altCorreta alternativa" : "alternativa"?>">E - <?= $alt['alternativae']?></li>
                            </ul>
                        </div>
                        <button class="add" onclick="addQuest(<?= $id_quest?>, <?= $usuario?>)" id="<?= $id_quest?>" value="<?= $id_quest?>">
                            Adicionar Questão
                        </button>
                    </div>
            <?php  }
            } ?>
        </div>
        <div class="prova">
            <div class="popUp">
                <div class="graficoDifQuestoes">
                    <canvas id="graficoDif"></canvas>
                </div>
                <div class="listaQuestoes">
                    <h4>Questões:</h4>
                    <ul>
                        
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./public/assets/js/bancodequestoes.js"></script>
</body>

</html>