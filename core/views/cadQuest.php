<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?> | Cadastro Questão</title>
  <link rel="stylesheet" href="./public/assets/css/cadQuest.css">
</head>
<body>
  <div class="container">
    <form class="form" action="?a=cadQuestao" method="post" enctype="multipart/form-data" autocomplete="off">
      <!-- ===================================================================================================================== -->

      <div class="form-left">
        <div class="form-section">
          <h3>Cadastro de Questão</h3>

          <label for="questao">Texto da Questão*</label>
          <input type="text" name="questao" id="questao" placeholder="Texto da Questão" required>

          <label for="imagem">Imagem da Questão</label>
          <input type="file" name="imagem" id="imagem" accept="image/*">

          <label for="sub-questao">Pergunta da Questão</label>
          <input type="text" name="sub-questao" id="sub-questao" placeholder="Pergunta da Questão">
          <!-- ===================================================================================================================== -->

          <h3>Alternativas</h3>
          <div class="form-section">
            <h4>alternativa correta</h4>

            <select name="alteCor" id="alteCor">
              <option value="a">A</option>
              <option value="b">B</option>
              <option value="c">C</option>
              <option value="d">D</option>
              <option value="e">E</option>
            </select>
          </div>

          <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

          <div style="display: block;">
            <div>
              <label for="alternativa_a">Letra A*</label>
              <input type="text" name="alternativa_a" id="alternativa_a" class="alternativa" required>
            </div>
            <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

            <div>
              <label for="alternativa_b">Letra B*</label>
              <input type="text" name="alternativa_b" id="alternativa_b" class="alternativa" required>
            </div>
            <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->
          </div>
          <div style="display: block;">
            <div>
              <label for="alternativa_c">Letra C*</label>
              <input type="text" name="alternativa_c" id="alternativa_c" class="alternativa" required>
            </div>
            <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

            <div>
              <label for="alternativa_d">Letra D*</label>
              <input type="text" name="alternativa_d" id="alternativa_d" class="alternativa" required>
            </div>
            <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

          </div>
          <div style="display: block;">
            <div>
              <label for="alternativa_e">Letra E*</label>
              <input type="text" name="alternativa_e" id="alternativa_e" class="alternativa" required>
            </div>
            <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

          </div>
        </div>
      </div>

      <div class="form-right">
        <div class="form-section">
          <!-- ===================================================================================================================== -->

          <h3>Assuntos</h3>

          <select name="assunto" id="assunto">
            <?php
            $gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);

            $email = $_SESSION["usuario"];
            $prof = $gestor->query("SELECT id FROM usuarios WHERE email='$email'")->fetch()["id"];

            $tags = $gestor->query("SELECT * FROM tags");
            while ($tag = $tags->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <option value="<?= $tag['id'] ?>"><?= $tag['nome'] ?></option>
            <?php
            }
            ?>

          </select>
        </div>

        <div class="form-section">
          <!-- ===================================================================================================================== -->

          <h3>Dificuldade</h3>

          <select name="dif" id="dif">
            <option value="fácil">Fácil</option>
            <option value="médio">Médio</option>
            <option value="difícil">Difícil</option>
          </select>
        </div>

        <div class="form-section">
          <!-- ===================================================================================================================== -->

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
          <input type="submit" value="Cadastrar Questão" name="cadastrar">
        </div>
        <a href="./?a=bancodequestoes" class="gerar-prova">Ver banco de Questões</a> <br>
        <a href="./?a=inicio" class="gerar-prova"> voltar ao inicio</a>
      </div>
      
    </form>
  </div>
</body>

</html>