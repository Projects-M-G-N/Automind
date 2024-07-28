<?php
header('Content-Type: application/json');

$id_prova = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$resultado = $gestor->query("SELECT emitido FROM prova WHERE id='$id_prova'")->fetch()['emitido'];

if($resultado == 0) {
    $dados = false;
} else {
    $dados = true;
}

echo json_encode($dados);