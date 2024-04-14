<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Criação de prova</title>
    <link rel="stylesheet" href="./public/assets/css/criarProvas.css">
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ededed;
            margin: 0;
            padding: 0;
        }

        .entrada {
            max-width: 400px;
            margin: 0 auto;
            padding: 50px;
            background-color: #fff;
            border-radius: 5px;
            margin-top: 50px;
            box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.3);

        }


        h2 {
            text-align: center;
            color: #ff6f00;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        /* Estilizando o botão de envio */
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #ff6f00;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
        }

        /* Estilizando as seleções de período */
        select {
            width: 48%;
            padding: 8px;
            border: 1px solid #ff6f00;
            border-radius: 5px;
            font-size: 16px;
        }

        h1 {
            color: #ff6f00;
        }
    </style> -->

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