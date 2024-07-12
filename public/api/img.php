<?php 
$img = uniqid();
$extensao = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
$imagem = $img . "." . $extensao;
$pasta = "../assets/img/quest/";

move_uploaded_file($_FILES['image']['tmp_name'], $pasta . $imagem);

$retorno['success'] = true;
$retorno['file'] = 'http://localhost/Avaliacao-TRI/public/assets/img/quest/' . $imagem;

echo json_encode($retorno);
?>