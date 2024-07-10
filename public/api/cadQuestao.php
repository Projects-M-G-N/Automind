<?php
header('Content-Type: application/json');

$id_ques = filter_input(INPUT_GET, 'idQuest', FILTER_DEFAULT);
$id_prof = filter_input(INPUT_GET, 'idProf', FILTER_DEFAULT);


$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$prova = $gestor->query("SELECT * FROM prova WHERE emitido='false' AND id_prof='$id_prof' LIMIT 1");

if ($prova->rowCount() == 1) {
    $id_prova = $gestor->query("SELECT id FROM prova WHERE emitido='false' AND id_prof='$id_prof'")->fetch()['id'];
} else {
    $gestor->query("INSERT INTO prova VALUES (NULL, '$id_prof', '$data', 'false', NULL)");
    $id_prova = $gestor->query("SELECT id FROM prova WHERE emitido='false' AND id_prof='$id_prof'")->fetch()['id'];
}

$resultado = $gestor->query("INSERT INTO provas VALUES (NULL, '$id_prof', '$id_ques', '$id_prova')");

echo json_encode($resultado);