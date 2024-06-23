<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Login</title>
    <link rel="stylesheet" href="./public/assets/css/login.css">
    <link rel="shortcut icon" href="./public/assets/img/favicon3.ico" type="image/x-icon">
    <script src="https://accounts.google.com/gsi/client" async></script>

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
                <div class="link">
                    <a href="./?a=cadastro">É novo por aqui? Faça seu cadastro!</a>
                </div>
                <button class="btn-login" name="logar">Acessar</button>
            
            <div id="g_id_onload"
                data-client_id="612166376899-996lnjn1e8cnvv9vjrv6u9f1oiu4sj5r.apps.googleusercontent.com"
                data-context="signin"
                data-ux_mode="redirect"
                data-login_uri="http://localhost/Avaliacao-TRI/?a=inicio"
                
                data-auto_prompt="false">
            </div>
            <div class="g_id_signin"
                data-type="standard"
                data-shape="pill"
                data-theme="filled_blue"
                data-text="signin_with"
                data-size="large"
                data-logo_alignment="left">
            </div>
         </div>
            
            </form>
  <body>

    </div>


</body>

</html>