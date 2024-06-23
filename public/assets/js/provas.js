let pdf = document.querySelector('.gerarPDF');
let word = document.querySelector('.gerarWord');
let QuestProva = document.querySelector('.QuestProva');

pdf.disabled = true;
word.disabled = true;

function chamarQuestoes(id) {
    QuestProva.style.display = 'flex';
}

function fecharProva() {
    QuestProva.style.display = 'none';
}