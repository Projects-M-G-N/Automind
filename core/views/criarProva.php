<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Criação de prova</title>
    <link rel="stylesheet" href="./public/assets/css/criarProvas.css">

</head>
<body>
    <?php 
    $gestor = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');
    $email = $_SESSION['usuario'];

    $usuario = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()['id'];
    $questoes = $gestor->query("SELECT id FROM questao WHERE visu='Publico' OR idprofessor='$usuario'")->fetchAll();
    foreach ($questoes as $questao) {
        echo $questao['id'] . '<br>';
    }
    ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./assets/js/criarProva.js"></script>
</body>

</html>