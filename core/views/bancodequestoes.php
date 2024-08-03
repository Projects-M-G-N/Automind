<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Banco de itens</title>
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
                <li><a href="./?a=cadQuest" class="gerar-prova" id="cadQuestaoBtn">Cadastrar Item</a></li>
                <li><a href="./?a=provas" class="gerar-prova" id="provasFeitasBtn">Minhas Avaliações</a></li>
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
                $dificuldade = $questao['dificuldade'];
                $numOpcCor = $questao['numopccor'];
                if ($numOpcCor == 1) {
                    $opc1 = $questao['opccorreta'];
                    $opc2 = $questao['opcalternativa1'];
                    $opc3 = $questao['opcalternativa2'];
                    $opc4 = $questao['opcalternativa3'];
                    $opc5 = $questao['opcalternativa4'];
                } else if ($numOpcCor == 2) {
                    $opc1 = $questao['opcalternativa4'];
                    $opc2 = $questao['opccorreta'];
                    $opc3 = $questao['opcalternativa1'];
                    $opc4 = $questao['opcalternativa2'];
                    $opc5 = $questao['opcalternativa3'];
                } else if ($numOpcCor == 3) {
                    $opc1 = $questao['opcalternativa3'];
                    $opc2 = $questao['opcalternativa4'];
                    $opc3 = $questao['opccorreta'];
                    $opc4 = $questao['opcalternativa1'];
                    $opc5 = $questao['opcalternativa2'];
                } else if ($numOpcCor == 4) {
                    $opc1 = $questao['opcalternativa2'];
                    $opc2 = $questao['opcalternativa3'];
                    $opc3 = $questao['opcalternativa4'];
                    $opc4 = $questao['opccorreta'];
                    $opc5 = $questao['opcalternativa1'];
                } else {
                    $opc1 = $questao['opcalternativa1'];
                    $opc2 = $questao['opcalternativa2'];
                    $opc3 = $questao['opcalternativa3'];
                    $opc4 = $questao['opcalternativa4'];
                    $opc5 = $questao['opccorreta'];
                }
                
            ?>
                    <div class="questao" id="quest<?= $id_quest?>">
                        <h4>Dificuldade: <?= $dificuldade?></h4>
                        <?= $texto ?>
                        <div class="alternativas">
                            <ul>
                                <li class="<?= $numOpcCor == 1 ? "altCorreta alternativa" : "alternativa"?>"><?= $opc1?></li>
                                <li class="<?= $numOpcCor == 2 ? "altCorreta alternativa" : "alternativa"?>"><?= $opc2?></li>
                                <li class="<?= $numOpcCor == 3 ? "altCorreta alternativa" : "alternativa"?>"><?= $opc3?></li>
                                <li class="<?= $numOpcCor == 4 ? "altCorreta alternativa" : "alternativa"?>"><?= $opc4?></li>
                                <li class="<?= $numOpcCor == 5 ? "altCorreta alternativa" : "alternativa"?>"><?= $opc5?></li>
                            </ul>
                        </div>
                        <button class="add" onclick="addQuest(<?= $id_quest?>, <?= $usuario?>)" id="<?= $id_quest?>" value="<?= $id_quest?>">
                            Adicionar Item
                        </button>
                        <button class="notCad" onclick="remQuest(<?= $id_quest?>, <?= $usuario?>)" id="<?= 'rem' . $id_quest?>">
                            Item não Cadastrado
                        </button>
                    </div>
            <?php  }?>
        </div>
        <div class="prova">
            <div class="popUp">
                <div class="graficoDifQuestoes">
                    <canvas id="graficoDif"></canvas>
                </div>
                <div class="listaQuestoes">
                    <h4>Itens:</h4>
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