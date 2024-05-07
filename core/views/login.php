<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME?> | Login</title>
    <link rel="stylesheet" href="./public/assets/css/login.css">
</head>
<body>
    <div class="entrada">
        <h2>ACESSO AO SISTEMA</h2>
        <br>
        <form action="" method="post">
            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email" placeholder="Digite seu email" required>
            <br> 
            <br>

            <label for="senha">SENHA</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            <br> 
          
        
            <input type="submit" name="acao" value="Acessar">
        <div class="links">
            <a href="">Central de atendimento</a>
            <a href="/Avaliacao-TRI/public/desejo_criar_senha/">Criar senha</a>
        </div>

    </form>
    </div>


</body>
</html>