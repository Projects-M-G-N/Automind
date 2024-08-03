<?php

use Dompdf\Dompdf;

$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$email = $_SESSION['usuario'];

$nome = $gestor->query("SELECT nome FROM usuarios WHERE email='$email'")->fetch()['nome'];
$idProva = $_GET['id'];
$quantQuest = $gestor->query("SELECT COUNT(id) as quest FROM provas WHERE idprova='$idProva'")->fetch()['quest'];
$questoes = $gestor->query("SELECT item.* FROM provas, item WHERE provas.idprova='$idProva' AND provas.itens=item.id");
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
$dados .= "<div class='linha'>";
$dados .= "<div class='nomes'>";
$dados .= "<h3>Professor: $nome</h3>";
$dados .= "</div>";
$dados .= "<div class='data'>";
$dados .= "<h3>Data: __/__/____</h3>";
$dados .= "</div>";
$dados .= "</div>";
$dados .= "<div class='nomes'>";
$dados .= "<h3>Nome: _________________________________________________________________</h3>";
$dados .= "</div>";
$dados .= "<div class='nomes'>";
$dados .= "<h3>Instituição: _____________________________________________________________</h3>";
$dados .= "</div>";
$dados .= "<div class='codigo'>";
$dados .= "<h3>Código: $idProva</h3>";
$dados .= "</div>";
$dados .= "</header>";
$dados .= "<div class='pagina-em-branco'></div>";
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
        $dados .= "<tr>";
        $dados .= "<td>$num</td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $dados .= "<td><div class='opc'></div></td>";
        $cont++;
    }

    $dados .= "</tbody>";
    $dados .= "</table>";

    $cont += 15;
}

$dados .= "</div>";
$quest = 1;
$dados .= "<div class='questoes-pagina'>";
while ($questao = $questoes->fetch(PDO::FETCH_ASSOC)) {
    $texto = $questao['texto_questao'];
    $numOpcCor = $questao['numopccor'];

    $opcoes = [
        $questao['opcalternativa1'],
        $questao['opcalternativa2'],
        $questao['opcalternativa3'],
        $questao['opcalternativa4'],
        $questao['opccorreta']
    ];

    $opcoesCorretas = [
        1 => [$opcoes[4], $opcoes[0], $opcoes[1], $opcoes[2], $opcoes[3]],
        2 => [$opcoes[1], $opcoes[4], $opcoes[0], $opcoes[2], $opcoes[3]],
        3 => [$opcoes[2], $opcoes[3], $opcoes[4], $opcoes[0], $opcoes[1]],
        4 => [$opcoes[3], $opcoes[4], $opcoes[1], $opcoes[2], $opcoes[0]],
        5 => [$opcoes[4], $opcoes[0], $opcoes[1], $opcoes[2], $opcoes[3]]
    ];

    $opcoesCorretas = $opcoesCorretas[$numOpcCor];

    $dados .= "<div class='questoes'>";
    $dados .= "<div class='enunciado'>";
    $dados .= "<p>$quest)</p>";
    $dados .= "<div>$texto</div>";
    $dados .= "</div>";
    $dados .= "<div class='alternativas'>";
    $dados .= "<ul>";
    foreach (range('a', 'e') as $index => $letra) {
        $dados .= "<li>$letra) $opcoesCorretas[$index]</li>";
    }
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
