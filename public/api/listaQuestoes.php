<?php
header('Content-Type: application/json');

$id_prof = filter_input(INPUT_GET, 'idProf', FILTER_DEFAULT);


$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$resultado = $gestor->query("SELECT item.* FROM prova, provas, item WHERE provas.idprova=prova.id AND prova.emitido=0 AND provas.itens=item.id AND provas.usuario='$id_prof'");

$lista = [];
while($questao = $resultado->fetch(PDO::FETCH_ASSOC)) {
    array_push($lista, $questao['id']);
}

echo json_encode($lista);