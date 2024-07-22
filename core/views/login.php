<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Login</title>
    <link rel="stylesheet" href="./public/assets/css/login.css">
    <link rel="shortcut icon" href="./public/assets/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <form action="" method="post">
                <div class="cabeca">
                    <div class="titulo">
                        <h1>Acesso</h1>
                    </div>
                    <div class="cadastro">
                        <button type="button" onclick="window.location.href='./?a=cadastro'">Cadastro</button>
                    </div>
                </div>
                
                <div class="grupo_input">
                    <div class="caixa">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="caixa">
                        <label for="senha">Senha</label>
                        <div class="input-wrapper">
                            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                            <button type="button" id="idmostrar-senha" class="eye" onclick="mostrarSenha()">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                        <p><a class="suporte" href="">Esqueceu a senha?</a></p>
                    </div>
                </div>
                
                <div class="entrar">
                    <button class="btn-login" name="logar">Acessar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function mostrarSenha() {
            var senhaInput = document.getElementById("senha");
            var mostrarSenhaBtn = document.getElementById("idmostrar-senha");

            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                mostrarSenhaBtn.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
            } else {
                senhaInput.type = "password";
                mostrarSenhaBtn.innerHTML = '<i class="bi bi-eye-fill"></i>';
            }
        }
    </script>
</body>

</html>
