const ctx = document.getElementById('graficoDif');
let valores = [0, 0, 0];
async function addQuest(id, idProf) {
    var btn = document.getElementById(id);
    const dados = await fetch('./public/api/cadQuestao.php?idQuest=' + id + '&idProf=' + idProf);
    const resposta = await dados.json();
    console.log(resposta)
    btn.innerHTML = "<i class='bi bi-check2'></i> Questão cadastrada";
    btn.classList.add('cad');
    btn.classList.remove('add');
    btn.disabled = true;
    check(idProf);
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
    grafico(lista);
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
}

check(usuario);