<?php
$idProva = $_GET['id'];
if (!isset($idProva)) {
    header('Location: ./?a=provas');
}

$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');
$email = $_SESSION['usuario'];
$usuario = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()['id'];
$questoes = $gestor->query("SELECT questao.* FROM provas, questao WHERE provas.id='$idProva' AND provas.questoes=questao.id");
$gabarito = $gestor->query("SELECT COUNT(id) as quant FROM provas WHERE id='$idProva'")->fetch()['quant'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova</title>
    <link rel="stylesheet" href="./public/assets/css/prova.css">
</head>

<body>

    <div class="folha">
        <div class="main-prova">
            <div class="gabarito">
                <?php
                $cont = 0;
                for ($i = 0; $i < 3; $i++) { ?>
                    <?php for ($j = $cont; $j < $gabarito; $j++) {
                        if ($j % 15 == 0) {
                    ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Questão</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th>E</th>
                                    </tr>
                                </thead>
                            <?php } ?>
                            <tr>
                                <td><?= $j + 1 ?></td>
                                <td>
                                    <div class="opc"></div>
                                </td>
                                <td>
                                    <div class="opc"></div>
                                </td>
                                <td>
                                    <div class="opc"></div>
                                </td>
                                <td>
                                    <div class="opc"></div>
                                </td>
                                <td>
                                    <div class="opc"></div>
                                </td>
                            </tr>
                        <?php $cont++;
                    } ?>
                            </table>
                        <?php } ?>
            </div>
            <?php
            while ($questao = $questoes->fetch(PDO::FETCH_ASSOC)) {
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
                <div class="questoes">
                    <div class="enunciado">
                        <?= $texto ?>
                    </div>
                    <div class="alternativas">
                        <ul>
                            <li>a) <?= $opc1 ?></li>
                            <li>b) <?= $opc2 ?></li>
                            <li>c) <?= $opc3 ?></li>
                            <li>d) <?= $opc4 ?></li>
                            <li>e) <?= $opc5 ?></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- <div class="opcoes">
            <button class="emitir">Emitir prova</button>
            <button class="gerarWord">Gerar em Word</button>
            <button class="gerarPDF">Gerar em PDF</button>
        </div> -->
    </div>

    <!-- <script src="./public/assets/js/prova.js"></script> -->
</body>

</html>