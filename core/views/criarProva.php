<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Criação de prova</title>
    <style>
        /* Estilizando o corpo do documento */
        body {
            font-family: Arial, sans-serif;
            background-color: #ededed;
            margin: 0;
            padding: 0;
        }

        /* Estilizando a entrada */
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
    </style>

</head>

<body>
    <div class="entrada">
        <h1>Criação de prova</h1>
        <form action="?a=gerarProvas" method="post" id="formulario">

            <h3>Turmas</h3>

            <select name="turma" id="turma">
                <?php
                $gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

                $email = $_SESSION["professor"];
                $prof = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()["id"];

                $turmas = $gestor->query("SELECT turma.* FROM turma, professor WHERE professor.id_turma = turma.id AND professor.id_usuario = $prof");
                while ($turma = $turmas->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <option value="<?= $turma['id'] ?>"><?= $turma['curso'] ?> <?= $turma['anoletivo'] ?>º ano</option>
                <?php
                }
                ?>

            </select>

            <h3>Período*</h3>

            <select name="bimestre" id="bimestre" required>
                <option value="1">1° Bimestre</option>
                <option value="2">2° Bimestre</option>
                <option value="3">3° Bimestre</option>
                <option value="4">4° Bimestre</option>
            </select>

            <?php echo $gestor->query("SELECT COUNT(questao.id) AS num FROM questao, usuarios WHERE questao.idprofessor = usuarios.id AND usuarios.id = $prof")->fetch()['num']?>
            <input type="hidden" name="professor" id="professor" value="<?= $prof?>">

            <h3>Quantidade de questões*</h3>

            <input type="number" name="quantQuest" id="quantQuest" min="3" max="45" required value="3">
            <input type="submit" value="Criar provas" name="criarprovas" id="criarprovas">

        </form>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./assets/js/criarProva.js"></script>
</body>

</html>