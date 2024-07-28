<?php

use Dompdf\Dompdf;

$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$email = $_SESSION['usuario'];

$nome = $gestor->query("SELECT nome FROM usuarios WHERE email='$email'")->fetch()['nome'];
$idProva = $_GET['id'];
$quantQuest = $gestor->query("SELECT COUNT(id) as quest FROM provas WHERE idprova='$idProva'")->fetch()['quest'];
$questoes = $gestor->query("SELECT questao.* FROM provas, questao WHERE provas.idprova='$idProva' AND provas.questoes=questao.id");
$dompdf = new Dompdf(['enable_remote' => true]);

$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
$dados .= "<title>Prova em pdf</title>";
$dados .= "<link rel='stylesheet' href='http://localhost/Avaliacao-TRI/public/assets/css/pdf.css'>";
$dados .= "<link rel='shortcut icon' href='http://localhost/Avaliacao-TRI/public/assets/img/logo.ico' type='image/x-icon'>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<div class='folha'>";
$dados .= "<header>";
$dados .= "<div class='nomes'>";
$dados .= "<h3>Nome: _________________________________________________________________</h3>";
$dados .= "<h3>Professor: $nome</h3>";
$dados .= "<h3>Instituição: _____________________________________________________________</h3>";
$dados .= "</div>";
$dados .= "<div class='data'>";
$dados .= "<h3>Data : __/__/____</h3>";
$dados .= "</div>";
$dados .= "</header>";
$dados .= "<div class='codigo'>";
$dados .= "<h3>Código: $idProva</h3>";
$dados .= "</div>";
$dados .= "<div class='main-prova'>";
$dados .= "<div class='gabarito'>";
$cont = 0;
for ($i = 0; $i < 3; $i++) {
    for ($j = $cont; $j < $quantQuest; $j++) {
        if ($j % 15 == 0) {
            $dados .= "<table>";
            $dados .= "<thead>";
            $dados .= "<tr>";
            $dados .= "<th>Questão</th>";
            $dados .= "<th>A</th>";
            $dados .= "<th>B</th>";
            $dados .= "<th>C</th>";
            $dados .= "<th>D</th>";
            $dados .= "<th>E</th>";
            $dados .= "</tr>";
            $dados .= "</thead>";
        }
        $num = $j + 1;
        $dados .= "<td>$num</td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $cont++;
    }
    $dados .= "</table>";
}
$dados .= "</div>";
$quest = 1;
while ($questao = $questoes->fetch(PDO::FETCH_ASSOC)) {
    $texto = $questao['texto_questao'];
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
    $dados .= "<div class='questoes'>";
    $dados .= "<div class='enunciado'>";
    $dados .= "<p>$quest)</p>";
    $dados .= "$texto";
    $dados .= "</div>";
    $dados .= "<div class='alternativas'>";
    $dados .= "<ul>";
    $dados .= "<li data-letter='a)'>$opc1</li>";
    $dados .= "<li data-letter='b)'>$opc2</li>";
    $dados .= "<li data-letter='c)'>$opc3</li>";
    $dados .= "<li data-letter='d)'>$opc4</li>";
    $dados .= "<li data-letter='e)'>$opc5</li>";
    $dados .= "</ul>";
    $dados .= "</div>";
    $dados .= "</div>";
    $quest++;
}
$dados .= "</div>";
$dados .= "</div>";
$dados .= "</body>";
$dados .= "</html>";


$dompdf->loadHtml($dados);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();
