<?php
header('Content-Type: application/json');

$id_prova = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');

$data = date('Y-m-d');

$resultado = $gestor->query("UPDATE prova SET emitido='1', emissao='$data' WHERE id='$id_prova'");
