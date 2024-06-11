<?php
header('Content-Type: application/json');

$id_ques = filter_input(INPUT_GET, 'idQuest', FILTER_DEFAULT);
$id_prof = filter_input(INPUT_GET, 'idProf', FILTER_DEFAULT);


$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$resultado = $gestor->query("INSERT INTO provas VALUES (NULL, '$id_prof', '$id_ques')");

echo json_encode($resultado);