<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Cadastro</title>
    <link rel="stylesheet" href="./public/assets/css/cadastro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="./public/assets/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <div class="container">
        <div class="form">
            <form action="" method="post">
                <div class="cabeca">
                    <div class="titulo">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login">
                        <button onclick="window.location.href='./?a=login'">Login</button>
                    </div>
                </div>
                <div class="grupo_input">
                        <div class="caixa">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" maxlength="100" required>
                        </div>
                        <div class="caixa">
                            <label for="idcelular">Celular</label>
                            <input type="tel" name="celular" id="idcelular" placeholder="(xx) xxxxx-xxxx" required>
                        </div>
                        <div class="caixa">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="Digite seu email" maxlength="50" required>
                        </div>
                        <div class="caixa">
                            <label for="inst">Instituição de ensino</label>
                            <input type="text" name="inst" id="inst" placeholder="Digite sua instituição" required>
                        </div>
                        <div class="caixa">
                            <label for="senha">Senha</label>
                            <div class="input-wrapper">
                                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" maxlength="50" required>
                                <button type="button" id="idmostrar-senha" onclick="mostrarSenha()">
                                    <i class="bi bi-eye-fill eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="caixa">
                            <label for="csenha">Confirme sua senha</label>
                            <input type="password" name="csenha" id="csenha" placeholder="Digite sua senha outra vez" required minlength="8">
                            <div id="erro_senha" style="color: red; font-size: 10px;"></div>
                        </div>
                </div>
                    <div class="genero">
                    <div class="genero-titulo">
                        <h5>Gênero</h5>
                    </div>
                    <div class="genero-grupo">
                        <div class="genero-input">
                            <input type="radio" name="genero" id="idmasculino" value="mas">
                            <label for="idmasculino">Masculino</label>
                        </div>
                        <div class="genero-input">
                            <input type="radio" name="genero" id="idfeminino" value="fem">
                            <label for="idfeminino">Feminino</label>
                        </div>
                        <div class="genero-input">
                            <input type="radio" name="genero" id="idoutros" value="out">
                            <label for="idoutros">Outros</label>
                        </div>
                        <div class="genero-input">
                            <input type="radio" name="genero" id="idnone" checked>
                            <label for="idnone">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>
                <div class="continuar">
                    <button class="btn-cadastro" name="cadastrar">Acessar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        $('#idcelular').mask('(00) 00000-0000');
        function mostrarSenha() {
            var senhaInput = document.getElementById("senha");
            var mostrarSenhaBtn = document.getElementById("idmostrar-senha");

            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                mostrarSenhaBtn.innerHTML = '<i class="bi bi-eye-slash-fill eye"></i>';
            } else {
                senhaInput.type = "password";
                mostrarSenhaBtn.innerHTML = '<i class="bi bi-eye-fill eye"></i>';
            }
        }


        function validarSenha() {
            var senha = document.getElementById('senha').value;
            var confirmarSenha = document.getElementById('csenha').value;
            var mensagemErro = document.getElementById('erro_senha');
            var inputSenha = document.getElementById('senha');
            var inputConfirmarSenha = document.getElementById('csenha');

            if (senha !== confirmarSenha) {
                mensagemErro.innerHTML = 'As senhas não correspondem.';
                inputSenha.style.border = '1px solid red';
                inputConfirmarSenha.style.border = '1px solid red';
                return false; 
            } else {
                mensagemErro.innerHTML = ''; 
                inputSenha.style.border = ''; 
                inputConfirmarSenha.style.border = ''; 
                return true;
            }
        }

    
        document.querySelector('form').addEventListener('submit', function (event) {
            if (!validarSenha()) {
                event.preventDefault(); 
            }
        });
    </script>



</body>

</html>