<?php
header('Content-Type: application/json');

$id_prof = filter_input(INPUT_GET, 'idProf', FILTER_DEFAULT);


$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$resultado = $gestor->query("SELECT questao.* FROM prova, provas, questao WHERE provas.idprova=prova.id AND prova.emitido=0 AND provas.questoes=questao.id AND provas.usuario='$id_prof'");

$lista = [];
while($questao = $resultado->fetch(PDO::FETCH_ASSOC)) {
    array_push($lista, $questao['id']);
}

echo json_encode($lista);