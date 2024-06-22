<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | cadastro</title>
    <link rel="stylesheet" href="./public/assets/css/cadastro.css">
    <link rel="shortcut icon" href="./public/assets/img/favicon3.ico" type="image/x-icon">
</head>

<body>
    <div class="main-cadastro">
        <div class="card-cadastro">
            <h1>CADASTRO NO SISTEMA</h1>

            <form action="" method="post">
                <div class="textfield">
                    <label for="nome">NOME</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome" maxlength="100" required>
                </div>

                <div class="textfield">
                    <label for="email">EMAIL</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu email" maxlength="50" required>
                </div>

                <div class="textfield">
                    <label for="senha">SENHA</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" maxlength="50" required>
                </div>

                <button class="btn-cadastro" name="cadastrar">Acessar</button>
                <div class="link">
                    <a href="./?a=login">Já tem conta? Então faça login!</a>
                </div>
            </form>
        </div>

    </div>
</body>

</html>