async function addQuest(id, idProf) {
    var btn = document.getElementById(id);
    const dados = await fetch('./public/api/cadQuestao.php?idQuest=' + id + '&idProf=' + idProf);
    const resposta = await dados.json();
    console.log(resposta)
    btn.innerHTML = "<i class='bi bi-check2'></i> Questão cadastrada";
    btn.classList.add('cad');
    btn.classList.remove('add');
    btn.disabled = true;
}

const usuario = document.getElementById('idUsu').value;

async function check(id) {
    const dados = await fetch('./public/api/listaQuestoes.php?idProf=' + id);
    const lista = await dados.json();
    let questoes = document.querySelectorAll('.add');
    for (let index = 0; index < questoes.length; index++) {
        const element = questoes[index];
        if (lista.indexOf(parseInt(element.value)) > -1) {
            element.innerHTML = "<i class='bi bi-check2'></i> Questão cadastrada";
            element.classList.add('cad');
            element.classList.remove('add');
            element.disabled = true;
        }
    }
}

check(usuario);