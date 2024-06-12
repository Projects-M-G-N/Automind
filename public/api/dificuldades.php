<?php
header('Content-Type: application/json');

$id_ques = filter_input(INPUT_GET, 'idQuest', FILTER_DEFAULT);


$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$resultado = $gestor->query("SELECT questao.dificuldade FROM questao WHERE id='$id_ques'")->fetch()['dificuldade'];

echo json_encode($resultado);