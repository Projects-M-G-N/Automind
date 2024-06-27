<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="./public/assets/css/inicio.css">
    <script defer src="./public/assets/js/inicio.js"></script>
    <link rel="shortcut icon" href="./public/assets/img/logo.ico" type="image/x-icon">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="./public/assets/img/logo1.jpg" altg="logozinha">
            </div>
            <ul>
                <li><a href="./?a=cadQuest" class="gerar-prova" id="cadQuestaoBtn">Cadastrar Questão</a></li>
                <li><a href="./?a=provas" class="gerar-prova" id="provasFeitasBtn">Ver Provas Já Feitas</a></li>
                <li><a href="./?a=bancodequestoes" class="gerar-prova" id="bancoQuestoesBtn">Banco de Questões</a></li>
            </ul>
            <a href="./?a=logout">Sair</a>
        </nav>
    </header>

    <main>
        <section class="intro">
            <div class="intro-text">
                <h1>Bem-vindo ao Automind</h1>
                <p>
                    Descubra a <strong>Automind</strong>, sua parceira para avaliações inteligentes. Utilizando a <em>Teoria de Resposta ao Item (TRI)</em>, a Automind elabora e corrige provas de forma precisa, como no Exame Nacional do Ensino Médio (ENEM). Nossa tecnologia minimiza pontuações obtidas por sorte, garantindo que suas notas representem fielmente seu conhecimento.
                </p>
                <p>
                    Além de gerar e corrigir provas automaticamente, a Automind oferece recursos avançados como análise estatística de desempenho dos alunos, personalização de questões por dificuldade e tema, e integração com sistemas educacionais para facilitar o processo de avaliação e aprendizagem.
                </p>
                <button class="btn" id="start-btn">Comece Agora</button>
            </div>
            <div class="intro-image">
                <img src="./public/assets/img/foto2.jpg" alt="Educação Automind">
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Automind. Todos os direitos reservados.</p>
    </footer>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" id="close-btn">&times;</span>
            <h2>O que você deseja fazer?</h2>
            <p>Escolha uma das opções abaixo para começar:</p>
            <a href="./?a=cadQuest" class="modal-btn" id="cadQuestaoBtn">Cadastrar Questão</a>
            <a href="./?a=criarprova" class="modal-btn">Gerar Nova Prova</a>
            <a href="./?a=provas" class="modal-btn" id="provasFeitasBtnModal">Ver Provas Já Feitas</a>
            <a href="./?a=bancodequestoes" class="modal-btn" id="bancoQuestoesBtn">Banco de Questões</a>
        </div>
    </div>

</body>

</html>
