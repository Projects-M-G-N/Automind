var form = document.querySelector('#formulario');
form.addEventListener("submit", (event) => {
    event.preventDefault();
    var professor = document.querySelector('#professor').value;
    var turma = document.querySelector('#turma').value;
    var bimestre = document.querySelector('#bimestre').value;
    var quantQuest = document.querySelector('#quantQuest').value;

    $.ajax({
        url: './check.php',
        method: 'POST',
        data: { professor: professor, turma: turma, bimestre: bimestre },
        dataType: 'json'
    }).done(function (result) {
        if (result >= 3 && quantQuest <= result) {
            form.submit();
        } else if (result < 3) {
            alert('Existem menos de 3 questões cadastradas!');
        } else if (quantQuest > result) {
            alert('A quantidade máxima de questões é de ' + result);
        }
    });
})