<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME?> | Login</title>
    <style>
        /* Estilizando o bode de ipueira do documento */
        body{
            font-family: Arial, sans-serif;
        }

        /* Estilizaçao da entrada */
        .entrada{
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            margin-top: 100px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        } 
        
        /* Estilizando o h2 para o cabeçalho na entrada*/
        .entrada h2{
            text-align: center;
            color: #333;
        }

        /* Estilizando o nome Email e Senha */
        .entrada label{
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        /* Estilizando os inputs de entrada de email e senha */
        .entrada input[type="email"],
        .entrada input[type="password"]{
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #f2f2f2;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        /* Estilizando o botão de envio */
        .entrada input[type="submit"]{
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

        /* Estilizando os links */
        .entrada .links{
            text-align: center;
            margin-top: 20px;
        }

        /* Estilizando os links */
        .entrada .links a{
            margin-right: 10px;
            color: #ff6f00;
            text-decoration: none;
            transition: .3s;
            font-size: .8em;
        }

        /* Estilizando o efeito ao passar o mause nos links*/
        .entrada .links a:hover{
            color: #000;
            text-decoration: underline;
        }

        /* colocando a imagem de fundo */
        body{
            background-image: url('https://c0.wallpaperflare.com/preview/974/188/7/brazil-goias-chapada-dos-veadeiros-lago.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;           
        }
        
    </style>
</head>
<body>
    <div class="entrada">
        <h2>ACESSO AO SISTEMA</h2>
        <br>
        <form action="" method="post">
            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email" placeholder="Digite seu email">
            <br> 
            <br>

            <label for="senha">SENHA</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
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