let pdf = document.querySelector('.gerarPDF');
let word = document.querySelector('.gerarWord');
let QuestProva = document.querySelector('.QuestProva');
let mainProva = document.querySelector(".main-prova");
let gabarito = document.querySelector(".gabarito");
let questoes = document.querySelector(".questoes");

// pdf.disabled = true;
word.disabled = true;

async function chamarQuestoes(id) {
    pdf.addEventListener('click', (e) => {
        window.location.href = './?a=pdf&idProva=' + id;
    })
    const dados = await fetch('./public/api/buscarProva.php?idProva=' + id);
    const resposta = await dados.json();
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

    for (let index = 0; index < resposta[0]; index++) {
        let questao = document.createElement('div');
        questao.classList.add("questao");

        let enunciado = document.createElement('div');
        enunciado.classList.add("enunciado");

        let paragrafo = document.createElement('p');
        let textEnunciado = document.createTextNode((index+1) + ") " + resposta[1][index]['texto_questao']);
        paragrafo.appendChild(textEnunciado);

        enunciado.appendChild(paragrafo);

        let imgDiv = document.createElement('div');
        imgDiv.classList.add('img');

        let img = document.createElement('img');
        img.src = "./public/assets/img/" + resposta[1][index]['img'];

        img.alt = '';
        
        imgDiv.appendChild(img);
        let pergunta = document.createElement('div');
        pergunta.classList.add('pergunta');

        let paragrafoPergunta = document.createElement('p');
        if(resposta[1][index]['pergunta'] != null) {
            let textoPergunta = document.createTextNode(resposta[1][index]['pergunta']);
            paragrafoPergunta.appendChild(textoPergunta);
        }

        pergunta.appendChild(paragrafoPergunta);

        let alt = document.createElement('div');
        alt.classList.add('alt');

        let pa = document.createElement('p');
        let text_a = document.createTextNode('a) ' + resposta[2][index]['alternativaa']);
        pa.appendChild(text_a);

        let pb = document.createElement('p');
        let text_b = document.createTextNode('b) ' + resposta[2][index]['alternativab']);
        pb.appendChild(text_b);

        let pc = document.createElement('p');
        let text_c = document.createTextNode('c) ' + resposta[2][index]['alternativac']);
        pc.appendChild(text_c);

        let pd = document.createElement('p');
        let text_d = document.createTextNode('d) ' + resposta[2][index]['alternativad']);
        pd.appendChild(text_d);

        let pe = document.createElement('p');
        let text_e = document.createTextNode('e) ' + resposta[2][index]['alternativae']);
        pe.appendChild(text_e);

        alt.appendChild(pa);
        alt.appendChild(pb);
        alt.appendChild(pc);
        alt.appendChild(pd);
        alt.appendChild(pe);

        questao.appendChild(enunciado);
        questao.appendChild(imgDiv);
        questao.appendChild(pergunta);
        questao.appendChild(alt);

        questoes.appendChild(questao);
    }
    QuestProva.style.display = 'flex';
}

function fecharProva() {
    QuestProva.style.display = 'none';
    gabarito.innerHTML = '';
    questoes.innerHTML = '';
}