<?php 

if(!isset($_POST['criarprovas'])) {
    header('Location: ./?a=criarprova');
}

$gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

$email = $_SESSION["professor"];
$prof = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()["id"];
$turma = $_POST['turma'];
$ano = $_POST['serie'];
$let = $gestor->query("SELECT id FROM turma WHERE nome='$turma' AND ano=$ano")->fetch()["id"];
$quantQuest = $_POST['quantQuest'];
$bimestre = $_POST['bimestre'];

$quest = $gestor->query("SELECT id FROM questao WHERE professor=$prof AND turma=$let AND bimestre=$bimestre")->fetchAll();

if(count($quest) < $_POST['quantQuest']) {
    $_SESSION['deuErrado'];
    header("Location: ./?a=criarprova");
}

// Cod só pra saber como funciona o sorteio
// $var = [];

// for ($i=0; $i < 10; $i++) { 
//     $cod = rand(1, 10);
//     if (in_array($cod, $var)) {
//         echo "esta aqui $cod<br>";
//     }else {
//         array_push($var, $cod);
//     }
// }

// var_dump($var);
?>