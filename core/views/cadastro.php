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
                            <label for="inst">Tipo de Instituição</label>
                            <select name="inst" id="inst">
                                <option value="d">selecione seu tipo de Instituição.</option>
                                <option value="a">Instituição Pública(estadual,municipal)</option>
                                <option value="b">Instituição Pública Federal</option>
                                <option value="c">Instituição Privada</option>
                            </select>
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
                            <label for="inst1">Nome da instituição</label>
                            <input type="text" name="inst1" id="inst1" placeholder="Digite o nome de sua instituição" required minlength="8">
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


        document.querySelector('form').addEventListener('submit', function(event) {
        var instituicao = document.getElementById('inst');
        if (instituicao.value === 'd') {
            alert('Por favor, selecione um tipo de instituição válido.');
            instituicao.focus();
            event.preventDefault();
        }
    });
    </script>



</body>

</html>