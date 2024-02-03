<?php

use core\classes\Functions;

$gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

$email = $_SESSION["professor"];
$prof = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()["id"];
$turma = $_POST['turma'];
$quantQuest = $_POST['quantQuest'];
$bimestre = $_POST['bimestre'];

$quest = $gestor->query("SELECT questao.id FROM questao WHERE idprofessor=$prof AND turmaquestao=$turma AND bimestrequestao=$bimestre")->fetchAll(PDO::FETCH_ASSOC);

$alunos = $gestor->query("SELECT COUNT(alunos.id) AS totalAluno FROM alunos, turma WHERE alunos.curso = turma.id AND turma.id = $turma")->fetch()['totalAluno'];

$fun = new Functions();

$gabaritos = $fun->sorteioGabarito($quest, $alunos, $quantQuest);

var_dump($gabaritos);

// var_dump($quest);

// if(count($quest) < $_POST['quantQuest']) {
//     $_SESSION['deuErrado'];
//     header("Location: ./?a=criarprova");
// }
?>