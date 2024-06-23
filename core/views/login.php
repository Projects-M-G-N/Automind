<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Login</title>
    <link rel="stylesheet" href="./public/assets/css/login.css">
    <link rel="shortcut icon" href="./public/assets/img/favicon3.ico" type="image/x-icon">
</head>

<body>
    <div class="main-login">
        <div class="card-login">
            <h1>ACESSO AO SISTEMA</h1>

            <form action="" method="post">
                <div class="textfield">
                    <label for="email">EMAIL</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                </div>

                <div class="textfield">
                    <label for="senha">SENHA</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                </div>

                <button class="btn-login" name="logar">Acessar</button>
                <div class="link">
                    <a href="./?a=cadastro">É novo por aqui? Faça seu cadastro!</a>
                </div>
            </form>
        </div>

    </div>


</body>

</html>