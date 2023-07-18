<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME?> | Inicio</title>
</head>
<body>
    <form action="" method="post">

<!-- ===================================================================================================================== -->

        <h3>Cadastro de quesão</h3>

        <label for="questao">Texto da questão*</label><br>

        <input type="text" name="questao" id="questao" placeholder="Texto da questão" required><br>

        <label for="imagem">Imagem da questão</label><br>

        <input type="file" name="imagem" id="imagem" accept="image/*"><br>

        <label for="sub-questao">Pergunta da questão</label><br>

        <input type="text" name="sub-questao" id="sub-questao" placeholder="Pergunta da questão"><br>

<!-- ===================================================================================================================== -->

        <h3>Alternativas</h3>

        <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->
        
        <label for="alternativa_a">Letra A*</label><br>
        <input type="text" name="alternativa_a" id="alternativa_a" class="alternativa" required><br>

        <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

        <label for="alternativa_b">Letra B*</label><br>
        <input type="text" name="alternativa_b" id="alternativa_b" class="alternativa" required><br>

        <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->
        
        <label for="alternativa_c">Letra C*</label><br>
        <input type="text" name="alternativa_c" id="alternativa_c" class="alternativa" required><br>

        <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->

        <label for="alternativa_d">Letra D*</label><br>
        <input type="text" name="alternativa_d" id="alternativa_d" class="alternativa" required><br>

        <!-- --==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==- -->
        
        <label for="alternativa_e">Letra E*</label><br>
        <input type="text" name="alternativa_e" id="alternativa_e" class="alternativa" required>

<!-- ===================================================================================================================== -->

        <h3>Turmas</h3>

        <label for="info"><input type="checkbox" name="info" id="info" value="info">informática</label>

        <label for="edif"><input type="checkbox" name="edif" id="edif" value="edif">Edificações</label>

        <label for="tst"><input type="checkbox" name="tst" id="tst" value="tst">Segurança do Trabalho</label>

        <label for="eletro"><input type="checkbox" name="eletro" id="eletro" value="eletro">Eletrotécnica</label>

<!-- ===================================================================================================================== -->

        <h3>Periodo*</h3>

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
        </select><br>
        
<!-- ===================================================================================================================== -->
         
        <input type="submit" value="Cadastrar questão">
    </form>
</body>
</html>