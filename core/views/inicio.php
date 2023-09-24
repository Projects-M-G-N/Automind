<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?> | Inicio</title>
  <style>
    /* Estilos globais */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f1f1f1;
    }

    /* Estilos do formulário */
    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      height: 100vh;
    }

    .form {
      width: 100%;
      max-width: 1000px;
      padding: 100px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
    }

    .form-left {
      flex: 2;
      padding-right: 50px;
    }

    .form-right {
      flex: 1;
      padding-left: 20px;
    }

    .form-section {
      margin-bottom: 20px;
    }

    h3 {
      margin-top: 10px;
      font-weight: bold;
      color: #FFA500;
      /* Laranja */
    }

    h4 {
      color: #c0810c;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
      color: #555;
    }

    input[type="text"],
    input[type="file"],
    select {
      width: 100%;
      padding: 12px;
      margin-top: 5px;
      margin-bottom: 5px;
      border: 1px solid #FFA500;
      /* Laranja */
      border-radius: 4px;
      font-size: 16px;
      color: #555;
    }

    .alternativa {
      margin-right: 10px;
    }

    input[type="submit"] {
      display: inline-block;
      padding: 12px 24px;
      background-color: #FFA500;
      /* Laranja */
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #ff8c00;
      /* Laranja mais escuro no hover */
    }

    a.gerar-prova {
      text-decoration: none;
      color: #FFA500;
      transition: .8s;
    }

    a.gerar-prova:hover {
      text-decoration: underline;
      color: #000;
      font-size: 1.2em;
      font-weight: 500;
    }

    @media screen and (max-width: 800px) {
      .form {
        flex-direction: column;
        padding: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <form class="form" action="" method="post" enctype="multipart/form-data">
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

          <h3>Turmas</h3>

          <label for="edif"><input type="radio" name="turma" id="edif" value="edif" checked>Edificações</label>
          <label for="eletro"><input type="radio" name="turma" id="eletro" value="elet">Eletrotécnica</label>
          <label for="info"><input type="radio" name="turma" id="info" value="info">Informática</label>
          <label for="tst"><input type="radio" name="turma" id="tst" value="segt">Segurança do Trabalho</label>
        </div>

        <div class="form-section">

          <!-- ===================================================================================================================== -->

          <h3>Período*</h3>

          <select name="serie" id="serie" required>
            <option value="1">1° Ano</option>
            <option value="2">2° Ano</option>
            <option value="3">3° Ano</option>
          </select>

          <select name="bimestre" id="bimestre" required>
            <option value="1">1° Bimestre</option>
            <option value="2">2° Bimestre</option>
            <option value="3">3° Bimestre</option>
            <option value="4">4° Bimestre</option>
          </select>
        </div>
        <!-- ===================================================================================================================== -->
        <!-- Botão "Cadastrar Questão" -->
        <div class="form-section" style="text-align: center;">
          <input type="submit" value="Cadastrar Questão" name="cadastrar">
        </div>
        <a href="./?a=criarprova" class="gerar-prova">Gerar prova</a>
      </div>
    </form>
  </div>
</body>

</html>

<?php
if (isset($_POST['cadastrar'])) {
  $gestor = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
  $id = $gestor->query("SELECT COUNT(id) count FROM questao ")->fetch()["count"];
  $email = $_SESSION['professor'];
  $prof = $gestor->query("SELECT id FROM usuarios WHERE email=$email")->fetch()["id"];
  $turma = $_POST['turma'];
  $ano = $_POST['serie'];
  $let = $gestor->query("SELECT id FROM turma WHERE nome=$turma AND ano=$ano")->fetch()["id"];
  $bimestre = $_POST['bimestre'];
  $sql_quest = $gestor->query("INSERT INTO questao VALUES ($id, $prof, $let, $bimestre);");

  $textquest = $_POST['questao'];
  $sql_text = $gestor->query("INSERT INTO textoquestao VALUES ($id, $textquest);");

  if (isset($_FILES['imagem'])) {
    $img = uniqid();
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $imagem = $img . "." . $extensao;
    $pasta = "../public/assets/img/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $imagem);
    $sql_img = $gestor->query("INSERT INTO questao VALUES ($id, $imagem);");
  }

  if (!empty($_POST['sub-questao'])) {
    $pergquest = $_POST['sub-questao'];
    $sql_perg = $gestor->query("INSERT INTO perguntaquestao VALUES ($id, $pergquest);");
  }

  $altCor = $_POST['alteCor'];
  $altA = $_POST['alternativa_a'];
  $altB = $_POST['alternativa_b'];
  $altC = $_POST['alternativa_c'];
  $altD = $_POST['alternativa_d'];
  $altE = $_POST['alternativa_e'];
  $sql_alt = $gestor->query("INSERT INTO alternativas VALUES ($id, $altCor, $altA, $altB, $altC, $altD, $altE);");
}
?>