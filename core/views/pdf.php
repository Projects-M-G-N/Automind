<?php

use Dompdf\Dompdf;

$gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

$email = $_SESSION['usuario'];

$nome = $gestor->query("SELECT nome FROM usuarios WHERE email='$email'")->fetch()['nome'];
$idProva = $_GET['idProva'];
$quantQuest = $gestor->query("SELECT COUNT(id) as quest FROM provas WHERE idprova='$idProva'")->fetch()['quest'];
$questoes = $gestor->query("SELECT questao.* FROM provas, questao WHERE provas.questoes=questao.id AND provas.idprova='$idProva'");
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
$dados .= "<header>";
$dados .= "<div class='nome'>";
$dados .= "<p>Aplicador: $nome</p>";
$dados .= "<p>Discente: _________________________________</p>";
$dados .= "</div>";
$dados .= "<div class='data'>";
$dados .= "<p>Data: __/__/____</p>";
$dados .= "</div>";
$dados .= "</header>";
$dados .= "<main>";
$dados .= "<div class='gabarito-cod'>";
$dados .= "<h3>Código: $idProva</h3>";
$dados .= "<div class='gabarito'>";
$cont = 0;
for ($j = 0; $j < 3; $j++) {
    for ($i = $cont; $i < $quantQuest; $i++) {
        if ($i % 15 == 0) {
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
        $dados .= "<tr>";
        $dados .= "<td>" . $i + 1 . "</td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "</tr>";
        $cont++;
    }
    $dados .= "</table>";
}
$dados .= "</div>";
$dados .= "</div>";
$dados .= "<div class='questoes'>";
$num = 0;
while ($questao = $questoes->fetch(PDO::FETCH_ASSOC)) {
    $num++;
    $dados .= "<div class='questao'>";
    $dados .= "<div class='enunciado'>";
    $dados .= "<p>$num)" . $questao['texto_questao'] . "</p>";
    $dados .= "</div>";
    if (!empty($questao['img'])) {
        // $dados .= "<div class='img'><img src='http://localhost/Avaliacao-TRI/public/assets/img/" . $questao['img'] . "' alt=''></div>";
    }
    if (!empty($questao['pergunta'])) {
        $dados .= "<div class='pergunta'><p>" . $questao['pergunta'] . "</p></div>";
    }
    $dados .= "<div class='alt'>";
    $idQuest = $questao['id'];
    $alternativas = $gestor->query("SELECT * FROM alternativas WHERE id='$idQuest'");
    while ($alternativa = $alternativas->fetch(PDO::FETCH_ASSOC)) {
        $dados .= "<p>a)" . $alternativa['alternativaa'] . "</p>";
        $dados .= "<p>b)" . $alternativa['alternativab'] . "</p>";
        $dados .= "<p>c)" . $alternativa['alternativac'] . "</p>";
        $dados .= "<p>d)" . $alternativa['alternativad'] . "</p>";
        $dados .= "<p>e)" . $alternativa['alternativae'] . "</p>";
    }
    $dados .= "</div>";
    $dados .= "</div>";
}
$dados .= "</div>";
$dados .= "</main>";
$dados .= "</body>";
$dados .= "</html>";


$dompdf->loadHtml($dados);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();
