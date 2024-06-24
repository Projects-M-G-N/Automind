let pdf = document.querySelector('.gerarPDF');
let word = document.querySelector('.gerarWord');
let QuestProva = document.querySelector('.QuestProva');
let mainProva = document.querySelector(".main-prova");
let gabarito = document.querySelector(".gabarito");

pdf.disabled = true;
word.disabled = true;

async function chamarQuestoes(id) {
    const dados = await fetch('./public/api/buscarProva.php?idProva=' + id);
    const resposta = await dados.json();
    console.log(resposta);
    const tabela1 = document.createElement('table');
    const tabela2 = document.createElement('table');
    const tabela3 = document.createElement('table');
    let cont = 0;
    for (let index = 1; index < resposta[0]+1; index++) {
        if (index <= 15) {
            if (cont === 0) {
                cont ++;
                let thead = document.createElement('thead');
                let tr = document.createElement('tr');
                let questao = document.createElement('th');
                let text_quest = document.createTextNode('Questão');
                questao.appendChild(text_quest);

                let quest_a = document.createElement('th');
                let text_a = document.createTextNode('A');
                quest_a.appendChild(text_a);

                let quest_b = document.createElement('th');
                let text_b = document.createTextNode('B');
                quest_b.appendChild(text_b);

                let quest_c = document.createElement('th');
                let text_c = document.createTextNode('C');
                quest_c.appendChild(text_c);

                let quest_d = document.createElement('th');
                let text_d = document.createTextNode('D');
                quest_d.appendChild(text_d);

                let quest_e = document.createElement('th');
                let text_e = document.createTextNode('E');
                quest_e.appendChild(text_e);

                tr.appendChild(questao);
                tr.appendChild(quest_a);
                tr.appendChild(quest_b);
                tr.appendChild(quest_c);
                tr.appendChild(quest_d);
                tr.appendChild(quest_e);

                thead.appendChild(tr);
                tabela1.appendChild(thead)
            }

            let num = document.createElement('td');
            let pos = document.createTextNode(index);
            num.appendChild(pos)

            let opc1 = document.createElement('div');
            opc1.classList.add('opc');
            let opc2 = document.createElement('div');
            opc2.classList.add('opc');
            let opc3 = document.createElement('div');
            opc3.classList.add('opc');
            let opc4 = document.createElement('div');
            opc4.classList.add('opc');
            let opc5 = document.createElement('div');
            opc5.classList.add('opc');

            let alt1 = document.createElement('td')
            alt1.appendChild(opc1);
            let alt2 = document.createElement('td');
            alt2.appendChild(opc2);
            let alt3 = document.createElement('td');
            alt3.appendChild(opc3);
            let alt4 = document.createElement('td');
            alt4.appendChild(opc4);
            let alt5 = document.createElement('td');
            alt5.appendChild(opc5);

            let quest = document.createElement('tr');
            quest.appendChild(num);
            quest.appendChild(alt1);
            quest.appendChild(alt2);
            quest.appendChild(alt3);
            quest.appendChild(alt4);
            quest.appendChild(alt5);
            tabela1.appendChild(quest);

        } else if (index > 15 && index <= 30) {
            if (cont === 1) {
                cont++;
                let thead = document.createElement('thead');
                let tr = document.createElement('tr');
                let questao = document.createElement('th');
                let text_quest = document.createTextNode('Questão');
                questao.appendChild(text_quest);

                let quest_a = document.createElement('th');
                let text_a = document.createTextNode('A');
                quest_a.appendChild(text_a);

                let quest_b = document.createElement('th');
                let text_b = document.createTextNode('B');
                quest_b.appendChild(text_b);

                let quest_c = document.createElement('th');
                let text_c = document.createTextNode('C');
                quest_c.appendChild(text_c);

                let quest_d = document.createElement('th');
                let text_d = document.createTextNode('D');
                quest_d.appendChild(text_d);

                let quest_e = document.createElement('th');
                let text_e = document.createTextNode('E');
                quest_e.appendChild(text_e);

                tr.appendChild(questao);
                tr.appendChild(quest_a);
                tr.appendChild(quest_b);
                tr.appendChild(quest_c);
                tr.appendChild(quest_d);
                tr.appendChild(quest_e);

                thead.appendChild(tr);
                tabela2.appendChild(thead)
            }

            let num = document.createElement('td');
            let pos = document.createTextNode(index);
            num.appendChild(pos)

            let opc1 = document.createElement('div');
            opc1.classList.add('opc');
            let opc2 = document.createElement('div');
            opc2.classList.add('opc');
            let opc3 = document.createElement('div');
            opc3.classList.add('opc');
            let opc4 = document.createElement('div');
            opc4.classList.add('opc');
            let opc5 = document.createElement('div');
            opc5.classList.add('opc');

            let alt1 = document.createElement('td')
            alt1.appendChild(opc1);
            let alt2 = document.createElement('td');
            alt2.appendChild(opc2);
            let alt3 = document.createElement('td');
            alt3.appendChild(opc3);
            let alt4 = document.createElement('td');
            alt4.appendChild(opc4);
            let alt5 = document.createElement('td');
            alt5.appendChild(opc5);

            let quest = document.createElement('tr');
            quest.appendChild(num);
            quest.appendChild(alt1);
            quest.appendChild(alt2);
            quest.appendChild(alt3);
            quest.appendChild(alt4);
            quest.appendChild(alt5);
            tabela2.appendChild(quest);

        } else {
            if (cont === 2) {
                cont++;
                let thead = document.createElement('thead');
                let tr = document.createElement('tr');
                let questao = document.createElement('th');
                let text_quest = document.createTextNode('Questão');
                questao.appendChild(text_quest);

                let quest_a = document.createElement('th');
                let text_a = document.createTextNode('A');
                quest_a.appendChild(text_a);

                let quest_b = document.createElement('th');
                let text_b = document.createTextNode('B');
                quest_b.appendChild(text_b);

                let quest_c = document.createElement('th');
                let text_c = document.createTextNode('C');
                quest_c.appendChild(text_c);

                let quest_d = document.createElement('th');
                let text_d = document.createTextNode('D');
                quest_d.appendChild(text_d);

                let quest_e = document.createElement('th');
                let text_e = document.createTextNode('E');
                quest_e.appendChild(text_e);

                tr.appendChild(questao);
                tr.appendChild(quest_a);
                tr.appendChild(quest_b);
                tr.appendChild(quest_c);
                tr.appendChild(quest_d);
                tr.appendChild(quest_e);

                thead.appendChild(tr);
                tabela3.appendChild(thead)
            }

            let num = document.createElement('td');
            let pos = document.createTextNode(index);
            num.appendChild(pos)

            let opc1 = document.createElement('div');
            opc1.classList.add('opc');
            let opc2 = document.createElement('div');
            opc2.classList.add('opc');
            let opc3 = document.createElement('div');
            opc3.classList.add('opc');
            let opc4 = document.createElement('div');
            opc4.classList.add('opc');
            let opc5 = document.createElement('div');
            opc5.classList.add('opc');

            let alt1 = document.createElement('td')
            alt1.appendChild(opc1);
            let alt2 = document.createElement('td');
            alt2.appendChild(opc2);
            let alt3 = document.createElement('td');
            alt3.appendChild(opc3);
            let alt4 = document.createElement('td');
            alt4.appendChild(opc4);
            let alt5 = document.createElement('td');
            alt5.appendChild(opc5);

            let quest = document.createElement('tr');
            quest.appendChild(num);
            quest.appendChild(alt1);
            quest.appendChild(alt2);
            quest.appendChild(alt3);
            quest.appendChild(alt4);
            quest.appendChild(alt5);
            tabela3.appendChild(quest);

        }

    }
    gabarito.appendChild(tabela1);
    gabarito.appendChild(tabela2);
    gabarito.appendChild(tabela3);
    QuestProva.style.display = 'flex';
}

function fecharProva() {
    QuestProva.style.display = 'none';
}