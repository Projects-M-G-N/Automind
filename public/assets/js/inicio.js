const startBtn = document.getElementById('start-btn');
const modal = document.getElementById('modal');
const closeBtn = document.getElementById('close-btn');
const provasFeitasBtn = document.getElementById('provasFeitasBtn');
const bancoQuestoesBtn = document.getElementById('bancoQuestoesBtn');
const cadQuestaoBtn = document.getElementById('cadQuestaoBtn');
const criarProvaBtn = document.getElementById('criarProvaBtn');
const provasFeitasBtnModal = document.getElementById('provasFeitasBtnModal');
const bancoQuestoesBtnModal = document.getElementById('bancoQuestoesBtnModal');

startBtn.addEventListener('click', function() {
    modal.style.display = 'flex';
});

closeBtn.addEventListener('click', function() {
    modal.style.display = 'none';
});

provasFeitasBtnModal.addEventListener('click', function() {
    modal.style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
