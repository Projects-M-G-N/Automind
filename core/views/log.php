<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse para poder ver nossos produtos</title>
    <link rel="stylesheet" href="./public/assets/css/log.css">
    <link rel="shortcut icon" href="./public/assets/img/A.ico" type="image/x-icon">
</head>

<body>
    <header>
        <h3>Automind</h3>
        <div class="menu-log">
            <div class="logo">
                <!-- <img src="./public/assets/images/logo.png" alt="logozinha"> -->
            </div>
            <div class="botoes">
                <button onclick="window.location.href='./?a=cadastro'">Cadastro</button>
                <button onclick="window.location.href='./?a=login'">Login</button>
            </div>
        </div>
    </header>
    <main>
        <div class="caixa" id="about">
            <h1><span>Entre para </span> nossa comunidade</h1>
            <div class="about-text">
                <p>A plataforma Automind utiliza a Teoria de resposta ao item TRI para gerar provas e corrigi-las com o mesmo método aplicado pelo Exame Nacional do Ensino Médio ENEM. Esse sistema é utilizado para evitar pontuações altas através de acertos casuais (onde o aluno não sabia a resposta da questão).</p>
            </div>
            <div class="entrar">
                <button onclick="window.location.href='./?a=cadastro'">Junte-se a nós</button>
            </div>
        </div>

        <div class="caixa" id="servicos">
            <h1>Serviços</h1>
            <div class="quadrados">
                <a href="">
                    <div class="servico">Serviço 1</div>
                </a>
                <a href="">
                    <div class="servico">Serviço 2</div>
                </a>
                <a href="">
                    <div class="servico">Serviço 3</div>
                </a>
                <a href="">
                    <div class="servico">Serviço 4</div>
                </a>
                <a href="">
                    <div class="servico">Serviço 5</div>
                </a>
                <a href="">
                    <div class="servico">Serviço 6</div>
                </a>
            </div>
            <h2>E muito mais</h2>
        </div>

        <div class="caixa" id="empresa">
            <div class="sob-data">
                <div>
                    <h4>Sobre a empresa</h4>
                    <h3>Quem somos</h3>
                </div>
            </div>
            <div class="data">
                <h3>A Automind</h3>
                <p>A Automind é uma empresa de sistemas com um propósito claro: usar a tecnologia para o bem da comunidade. Nossas soluções são mais do que inovações técnicas, são ferramentas para promover o progresso coletivo.</p>
                <p>Somos uma equipe apaixonada pela educação e tecnologia, combinando o melhor dos dois mundos para criar soluções únicas que ajudam estudantes. Nosso propósito é oferecer novas perspectivas e conexões através das ferramentas educacionais, buscando sempre inovar e surpreender em cada transação.</p>
            </div>
        </div>

        <div class="caixa" id="cadastro">
            <div class="propa">
                <h1>Ainda não tem um conta?</h1>
                <h3>Faça seu cadastro no melhor site de gerenciamento financeiro do mercado!</h3>
                <button onclick="window.location.href='./?a=cadastro'">Cadastre-se</button>
            </div>
        </div>
    </main>
    <script src="./public/assets/js/slider_log.js"></script>
</body>

</html>
