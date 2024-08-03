<?php
header('Content-Type: application/json');

$id_prova = filter_input(INPUT_GET, 'idProva', FILTER_DEFAULT);

$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$numeroQuest = $gestor->query("SELECT COUNT(id) as quant FROM provas WHERE idprova='$id_prova'")->fetch()['quant'];
$resultados = $gestor->query("SELECT item.* FROM item, provas WHERE provas.idprova='$id_prova' AND provas.itens=item.id");

$listaResult = array();
array_push($listaResult, $numeroQuest);

$listaQuest = array();
$listaAlt = array();
while($resultado = $resultados->fetch(PDO::FETCH_ASSOC)) {
    array_push($listaQuest, $resultado);
    $id = $resultado['id'];
    $alt = $gestor->query("SELECT * FROM alternativas WHERE id='$id'");
    while($alter = $alt->fetch(PDO::FETCH_ASSOC)) {
        array_push($listaAlt, $alter);
    }
}

array_push($listaResult, $listaQuest);
array_push($listaResult, $listaAlt);

echo json_encode($listaResult);