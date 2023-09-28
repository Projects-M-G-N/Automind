<?php
if (!isset($_POST['cadastrar'])) {
    header("Location: ./");
}

$gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
$id = $gestor->query("SELECT COUNT(id) count FROM questao ")->fetch()["count"]+1;
$email = $_SESSION["professor"];
$prof = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()["id"];
$turma = $_POST['turma'];
$ano = $_POST['serie'];
$let = $gestor->query("SELECT id FROM turma WHERE nome='$turma' AND ano=$ano")->fetch()["id"];
$bimestre = $_POST['bimestre'];
$sql_quest = $gestor->query("INSERT INTO questao VALUES ($id, '$prof', $let, $bimestre);");

$textquest = $_POST['questao'];
$sql_text = $gestor->query("INSERT INTO textoquestao VALUES ($id, '$textquest');");

if (isset($_FILES['imagem'])) {
    $img = uniqid();
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $imagem = $img . "." . $extensao;
    $pasta = "../public/assets/img/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $imagem);
    $sql_img = $gestor->query("INSERT INTO imgquestao VALUES ($id, '$imagem');");
}

if (!empty($_POST['sub-questao'])) {
    $pergquest = $_POST['sub-questao'];
    $sql_perg = $gestor->query("INSERT INTO perguntaquestao VALUES ($id, '$pergquest');");
}

$altCor = $_POST['alteCor'];
$altA = $_POST['alternativa_a'];
$altB = $_POST['alternativa_b'];
$altC = $_POST['alternativa_c'];
$altD = $_POST['alternativa_d'];
$altE = $_POST['alternativa_e'];
$sql_alt = $gestor->query("INSERT INTO alternativas VALUES ($id, '$altCor', '$altA', '$altB', '$altC', '$altD', '$altE');");

header('Location: ./');