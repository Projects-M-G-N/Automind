const ctx = document.getElementById('graficoDif');
let valores = [0, 0, 0];
async function addQuest(id, idProf) {
    var btnCad = document.getElementById(id);
    var btnRem = document.getElementById("rem" + id);
    const dados = await fetch('./public/api/cadQuestao.php?idQuest=' + id + '&idProf=' + idProf);
    btnCad.innerHTML = "<i class='bi bi-check2'></i> Questão cadastrada";
    btnCad.classList.add('cad');
    btnCad.classList.remove('add');
    btnCad.disabled = true;
    btnRem.classList.remove('notCad');
    btnRem.classList.add('rem');
    btnRem.disabled = false;
    btnRem.innerHTML = "<i class='bi bi-trash'></i> Remover Questão";
    check(idProf);
}

async function remQuest(id, prof) {
    var btnRem = document.getElementById("rem" + id);
    var btnCad = document.getElementById(id);
    const dados = await fetch('./public/api/remQuest.php?idQuest=' + id + '&idProf=' + prof);
    btnRem.innerHTML = "Questão não cadastrada";
    btnRem.classList.add('notCad');
    btnRem.classList.remove('rem');
    btnRem.disabled = true;
    btnCad.classList.remove('cad');
    btnCad.classList.add('add');
    btnCad.disabled = false;
    btnCad.innerHTML = "Adicionar Questão";
    check(prof);
}

const usuario = document.getElementById('idUsu').value;

async function check(id) {
    const listRem = document.querySelectorAll('.notCad');
    listRem.forEach(element => {
        element.disabled = true;
    });
    const dados = await fetch('./public/api/listaQuestoes.php?idProf=' + id);
    const lista = await dados.json();
    let questoes = document.querySelectorAll('.add');
    for (let index = 0; index < questoes.length; index++) {
        const element = questoes[index];
        const remove = listRem[index];
        if (lista.indexOf(parseInt(element.value)) > -1) {
            element.innerHTML = "<i class='bi bi-check2'></i> Questão cadastrada";
            element.classList.add('cad');
            element.classList.remove('add');
            element.disabled = true;
            remove.classList.add('rem');
            remove.classList.remove('notCad');
            remove.disabled = false;
            remove.innerHTML = "<i class='bi bi-trash'></i> Remover Questão"
        }
    }
    grafico(lista);
    listarQuestoes(lista);
}


let graficoDif = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['fácil', 'médio', 'difícil'],
        datasets: [{
            label: 'Dificuldade média',
            data: valores,
            borderWidth: 1,
            borderColor: '#51eb7b',
            backgroundColor: '#26ea40',
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

async function grafico(lista) {
    for (let index = 0; index < lista.length; index++) {
        const element = lista[index];
        const dados = await fetch('./public/api/dificuldades.php?idQuest=' + element);
        const dif = await dados.json();
        if (dif == 'fácil') {
            valores[0] += 1;
        } else if (dif == 'médio') {
            valores[1] += 1
        } else {
            valores[2] += 1
        }
    }
    graficoDif.update();
    valores[0] = 0;
    valores[1] = 0;
    valores[2] = 0;
}

function listarQuestoes(ids) {
    let lista = document.querySelector('.listaQuestoes ul');
    lista.innerHTML = ''
    for (let index = 0; index < ids.length; index++) {
        const element = ids[index];
        lista.innerHTML += "<a href='#quest" + element + "'><li>Questão " + (index + 1) +"</li></a>";
    }
}

check(usuario);