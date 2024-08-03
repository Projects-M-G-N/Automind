<?php
header('Content-Type: application/json');

$id_ques = filter_input(INPUT_GET, 'idQuest', FILTER_DEFAULT);
$id_prof = filter_input(INPUT_GET, 'idProf', FILTER_DEFAULT);


$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$prova = $gestor->query("SELECT id FROM prova WHERE emitido='false' AND id_prof='$id_prof' LIMIT 1")->fetch()['id'];

$resultado = $gestor->query("DELETE FROM provas WHERE idprova='$prova' AND usuario='$id_prof' AND itens='$id_ques'");

echo json_encode($resultado);
