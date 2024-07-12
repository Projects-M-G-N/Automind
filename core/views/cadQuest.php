<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?> | Cadastro Questão</title>
  <link rel="stylesheet" href="./public/assets/css/cadQuest.css">
  <link rel="shortcut icon" href="./public/assets/img/logo.ico" type="image/x-icon">
  <link rel="stylesheet" href="./public/trumbowyg/dist/ui/trumbowyg.css">
  <link rel="stylesheet" href="./public/trumbowyg/dist/plugins/mathml/ui/trumbowyg.mathml.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="./public/trumbowyg/dist/trumbowyg.js"></script>
  <script type="text/javascript" src="./public/Trumbowyg/dist/langs/pt_br.js"></script>
  <script src="./public/trumbowyg/dist/plugins/upload/trumbowyg.upload.js"></script>
  <script src="./public/trumbowyg/dist/plugins/mathml/trumbowyg.mathml.js"></script>
</head>

<body>
  <div class="container">
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">

      <div class="form-left">

        <div class="form-section">

          <h3>Cadastro de Questão</h3>

          <label for="cadQuest">Cadastrar questão</label>
          <textarea name="cadQuest" id="cadQuest" required></textarea>

          <label for="opc1">Opção 1:</label>

          <label for="opcCorreta1">Marcar como opção correta</label>
          <input type="radio" name="opcCorreta" id="opcCorreta1" value="1" checked>

          <textarea name="opc1" id="opc1" class="opcs" required></textarea>

          <label for="opc2">Opção 2:</label>

          <label for="opcCorret2">Marcar como opção correta</label>
          <input type="radio" name="opcCorreta" id="opcCorret2" value="2">

          <textarea name="opc2" id="opc2" class="opcs" required></textarea>

          <label for="opc3">Opção 3:</label>

          <label for="opcCorreta3">Marcar como opção correta</label>
          <input type="radio" name="opcCorreta" id="opcCorreta3" value="3">

          <textarea name="opc3" id="opc3" class="opcs" required></textarea>

          <label for="opc4">Opção 4:</label>

          <label for="opcCorreta4">Marcar como opção correta</label>
          <input type="radio" name="opcCorreta" id="opcCorreta4" value="4">

          <textarea name="opc4" id="opc4" class="opcs" required></textarea>

          <label for="opc5">Opção 5:</label>

          <label for="opcCorreta5">Marcar como opção correta</label>
          <input type="radio" name="opcCorreta" id="opcCorreta5" value="5">

          <textarea name="opc5" id="opc5" class="opcs" required></textarea>

        </div>
      </div>

      <div class="form-right">
        <div class="form-section">
          <h3>Matéria</h3>

          <select name="assunto" id="assunto">
            <?php
            $gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

            $email = $_SESSION["usuario"];
            $prof = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()["id"];

            $materias = $gestor->query("SELECT * FROM materias");
            while ($materia = $materias->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <option value="<?= $materia['id'] ?>"><?= $materia['nome'] ?></option>
            <?php
            }
            ?>

          </select>
        </div>

        <div class="form-section">
          <h3>Dificuldade</h3>

          <select name="dif" id="dif">
            <option value="fácil">Fácil</option>
            <option value="médio">Médio</option>
            <option value="difícil">Difícil</option>
          </select>
        </div>

        <div class="form-section">
          <h3>Visualização</h3>

          <div class="radi">
            <input type="radio" name="visu" id="publi" value="publico" checked>
            <label for="publi">Público</label>
          </div>
          <div class="radi">
            <input type="radio" name="visu" id="priva" value="privado">
            <label for="priva">Privado</label>
          </div>
        </div>

        <!-- Botão "Cadastrar Questão" -->
        <div class="form-section" style="text-align: center;">
          <input type="submit" value="Cadastrar Questão" name="cadastrarQuest">
        </div>
        <a href="./?a=bancodequestoes" class="gerar-prova">Ver banco de Questões</a> <br>
        <a href="./?a=inicio" class="gerar-prova"> voltar ao inicio</a>
      </div>

    </form>
  </div>
  <script src="./public/assets/js/cadQUest.js"></script>
</body>

</html>