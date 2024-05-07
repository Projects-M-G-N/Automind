<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Criar Senha</title>
    <link rel="stylesheet" href="./public/assets/css/senha_nova.css">
    <script>
        window.onload = function() {
            const emailInput = document.getElementById('email');
            const codigoInput = document.getElementById('codigo');
            const enviarButton = document.querySelector('.Teubotao button');

            emailInput.addEventListener('input', function() {
                const email = emailInput.value.trim();
                enviarButton.disabled = email === '';
                codigoInput.disabled = true;
                codigoInput.classList.add('blocked');
                codigoInput.classList.remove('enabled');
                enviarButton.classList.toggle('enabled', email !== '');
            });

            enviarButton.addEventListener('click', function(event) {
                event.preventDefault();
                codigoInput.disabled = false;
                codigoInput.classList.remove('blocked');
                codigoInput.classList.add('enabled');
                enviarButton.disabled = true;
            });
        };
    </script>
</head>

<body>
    <div class="entrada">
        <h2>CRIAÇÃO DE SENHA</h2>
        <br>
        <form action="" method="post" class="GEANZINHODOGRAU190">
            <div class="GabrielVankleber">
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>

            </div>
            <br>
            <div class="GabrielVankleber">
                <label for="codigo">CODIGO</label>
                <input type="text" id="codigo" required disabled class="blocked" placeholder="Digite sua senha" required>
            </div><br>
            <div class="Teubotao">
                <button type="submit" name="acao" disabled class="blocked">ENVIAR</button>
            </div>
    </div>

    </form>
    </div>

</body>

</html>