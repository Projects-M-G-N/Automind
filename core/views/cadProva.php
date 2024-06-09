<?php
if (!isset($_POST['cadastrar'])) {
    header("Location: ./");
}

$gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
$id = $gestor->query("SELECT COUNT(id) count FROM questao ")->fetch()["count"] + 1;
$email = $_SESSION["usuario"];
$prof = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()["id"];
$assunto = $_POST['assunto'];
$visu = $_POST['visu'];
$dificuldade = $_POST['dif'];
$data = date('Y-m-d H:m:s');

$textquest = $_POST['questao'];

if (!empty($_FILES['imagem']['name'])) {
    $img = uniqid();
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $imagem = $img . "." . $extensao;
    $pasta = "../public/assets/img/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $imagem);
} else {
    $imagem = null;
}

if (!empty($_POST['sub-questao'])) {
    $pergquest = $_POST['sub-questao'];
} else {
    $pergquest = null;
}

$sql_quest = $gestor->prepare("INSERT INTO questao VALUES (:id, :prof, :assunto, :texto, :img, :pergunta, :visu, :dificuldade, :data_cad)");
$sql_quest->execute(
    [
        ":id" => $id,
        ":prof" => $prof,
        ":assunto" => $assunto,
        ":texto" => $textquest,
        ":img" => $imagem,
        ":pergunta" => $pergquest,
        ":visu" => $visu,
        ":dificuldade" => $dificuldade,
        ":data_cad" => $data,
    ]
);


$altCor = $_POST['alteCor'];
$altA = $_POST['alternativa_a'];
$altB = $_POST['alternativa_b'];
$altC = $_POST['alternativa_c'];
$altD = $_POST['alternativa_d'];
$altE = $_POST['alternativa_e'];

$sql_alt = $gestor->prepare("INSERT INTO alternativas VALUES (:id, :altCorreta, :a, :b, :c, :d, :e);");
$sql_alt->execute(
    [
        ":id" => $id,
        ":altCorreta" => $altCor,
        ":a" => $altA,
        ":b" => $altB,
        ":c" => $altC,
        ":d" => $altD,
        ":e" => $altE,
    ]
);

header('Location: ./');
