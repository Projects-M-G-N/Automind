<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | Criação de prova</title>
</head>

<body>

    <h1>Criação de prova</h1>
    <form action="" method="post">

        <!-- ===================================================================================================================== -->

        <h3>Turma</h3>
        <label for="edif"><input type="radio" name="turma" id="edif" value="edif" checked>Edificações</label>
        <label for="eletro"><input type="radio" name="turma" id="eletro" value="eletro">Eletrotécnica</label>
        <label for="info"><input type="radio" name="turma" id="info" value="info">Informática</label>
        <label for="tst"><input type="radio" name="turma" id="tst" value="tst">Segurança do Trabalho</label>

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

        <!-- ===================================================================================================================== -->

        <h3>Quantidade de questões*</h3>

        <input type="number" name="quantQuest" id="quantQuest" min="3" max="30" required value="3">

        <!-- ===================================================================================================================== -->

        <input type="submit" value="Criar provas">

    </form>
</body>

</html>