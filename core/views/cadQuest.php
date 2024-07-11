<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?> | Cadastro Questão</title>
  <link rel="stylesheet" href="./public/assets/css/cadQuest.css">
  <link rel="shortcut icon" href="./public/assets/img/logo.ico" type="image/x-icon">
</head>
<body>
  <div class="container">
    <form class="form" action="?a=cadQuestao" method="post" enctype="multipart/form-data" autocomplete="off">
      <!-- ===================================================================================================================== -->

      <div class="form-left">
        <div class="form-section">
          <h3>Cadastro de Questão</h3>
          
          <label for="sub-questao">Pergunta da Questão</label>
          <input type="text" name="sub-questao" id="sub-questao" placeholder="Pergunta da Questão">

          <label for="imagem">Imagem da Questão</label>
          <input type="file" name="imagem" id="imagem" accept="image/*">

          
          <!-- ===================================================================================================================== -->
          <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

          <div style="display: block;">
            
            <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->
            <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

          </div>
        </div>
      </div>

      <div class="form-right">
        <div class="form-section">
          <!-- ===================================================================================================================== -->

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