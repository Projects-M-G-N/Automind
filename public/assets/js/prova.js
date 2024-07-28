async function check(id) {
    let emitido = document.querySelector(".emitir");
    let pdf = document.querySelector(".gerarPDF");
    let word = document.querySelector(".gerarWord");
    const dados = await fetch('./public/api/checkProva.php?id=' + id);
    dados.json()
    .then(resultado => {
        if(resultado) {
            emitido.disabled = true;
            pdf.disabled = false;
            word.disabled = false
        } else {
            emitido.disabled = false;
            pdf.disabled = true;
            word.disabled = true;
        }
    })
}

async function emitirProva(id) {
    await fetch('./public/api/emitirProva.php?id=' + id);
    check(id);
}