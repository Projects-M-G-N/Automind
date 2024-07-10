<?php 
$gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

$email = $_SESSION['usuario'];

$nome = $gestor->query("SELECT nome FROM usuarios WHERE email='$email'")->fetch()['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova em pdf</title>
    <link rel="stylesheet" href="./public/assets/css/pdf.css">
    <link rel="shortcut icon" href="./public/assets/img/logo.ico" type="image/x-icon">
</head>

<body>
    <input type="hidden" name="idProva" id="idProva" value="<?= $_GET['idProva']?>">
    <header>

        <div class="nome">
            <p>Aplicador: <?= $nome?></p>
            <p>Discente: _________________________________</p>
        </div>
        <div class="data">
            <p>Data: __/__/____</p>
        </div>

    </header>

    <main>

        <div class="gabarito-cod">
            <h3>Código: <?= $_GET['idProva']?></h3>

            <div class="gabarito">
                
            </div>
        </div>

        <div class="questoes">
        </div>

    </main>

    <script src="./public/assets/js/pdf.js"></script>
</body>

</html>