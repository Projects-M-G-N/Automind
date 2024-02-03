<?php
header('Content-Type: application/json');
require('../config.php');

$professor = $_POST['professor'];
$turma = $_POST['turma'];
$bimestre = $_POST['bimestre'];

$gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

$quantQuest = $gestor->query("SELECT COUNT(questao.id) AS num FROM questao, usuarios WHERE questao.idprofessor = usuarios.id AND questao.turmaquestao = $turma AND questao.bimestrequestao = $bimestre AND usuarios.id = $professor")->fetch()['num'];
echo json_encode($quantQuest);
