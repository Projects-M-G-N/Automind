CREATE SCHEMA automind;

USE automind;

CREATE TABLE plano (
    id INT NOT NULL AUTO_INCREMENT,
    valor DECIMAL(10 , 2 ) NOT NULL,
    tipo VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE materias (
    id INT NOT NULL AUTO_INCREMENT,
    nome TEXT NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT UNIQUE,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    plano INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (plano)
        REFERENCES plano (id)
);

CREATE TABLE prova (
	id INT NOT NULL AUTO_INCREMENT,
    id_prof INT NOT NULL,
    criacao DATETIME NOT NULL,
    emitido BOOLEAN NOT NULL,
    emissao DATE,
    PRIMARY KEY (id),
    FOREIGN KEY (id_prof)
        REFERENCES usuarios (id)
);

CREATE TABLE item (
    id INT NOT NULL AUTO_INCREMENT UNIQUE,
    idprofessor INT NOT NULL,
    materia INT NOT NULL,
    texto_questao TEXT NOT NULL,
    opccorreta TEXT NOT NULL,
    opcalternativa1 TEXT NOT NULL,
    opcalternativa2 TEXT NOT NULL,
    opcalternativa3 TEXT NOT NULL,
    opcalternativa4 TEXT NOT NULL,
    numopccor INT NOT NULL,
    visu VARCHAR(10) NOT NULL,
    dificuldade VARCHAR(10) NOT NULL,
    data_cad DATETIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idprofessor)
        REFERENCES usuarios (id),
    FOREIGN KEY (materia)
        REFERENCES materias (id)
);

CREATE TABLE administrador (
    id_usuario INT NOT NULL,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_usuario)
        REFERENCES usuarios (id)
);

CREATE TABLE provas (
    id INT NOT NULL AUTO_INCREMENT,
    usuario INT NOT NULL,
    itens INT NOT NULL,
    idprova INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario)
        REFERENCES usuarios (id),
	FOREIGN KEY (itens)
        REFERENCES item (id),
	FOREIGN KEY (idprova)
        REFERENCES prova (id)
);

INSERT INTO plano VALUES (NULL, 0, "Gratuito");

INSERT INTO materias VALUES (NULL, 'Artes'),
                        (NULL, 'Biologia'),
                        (NULL, 'Educação Física'),
                        (NULL, 'Espanhol'),
                        (NULL, 'Filosofia'),
                        (NULL, 'Física'),
                        (NULL, 'Geografia'),
                        (NULL, 'História'),
                        (NULL, 'Inglês'),
                        (NULL, 'Literatura'),
                        (NULL, 'Matemática'),
                        (NULL, 'Português'),
                        (NULL, 'Química'),
                        (NULL, 'Sociologia');


INSERT INTO usuarios VALUES (NULL, 'teste', 'teste@gmail.com', '1234567890', 1),
							(NULL, 'adm', 'adm@adm.com', 'adm12345', 1),
                            (NULL, 'professor', 'prof@prof.com', 'prof12345', 1);

INSERT INTO administrador VALUES (2);

/*INSERT INTO item (id, idprofessor, materia, texto_questao, opccorreta, opcalternativa1, opcalternativa2, opcalternativa3, opcalternativa4, numopccor, visu, dificuldade, data_cad) VALUES
(NULL, 3, 6, 'Em um experimento, um bloco é lançado horizontalmente sobre uma superfície plana e rugosa com uma velocidade inicial de 10 m/s. Sabendo que o bloco para completamente após percorrer 50 m, qual o coeficiente de atrito cinético entre o bloco e a superfície?', '0,1', '0,2', '0,1', '0,3', '0,4', 2, 'publico', 'médio', NOW()),
(NULL, 3, 6, 'Uma mola ideal é comprimida por uma força de 20 N, resultando em uma deformação de 0,4 m. Qual é a constante elástica da mola?', '50 N/m', '50 N/m', '40 N/m', '60 N/m', '30 N/m', 1, 'publico', 'fácil', NOW()),
(NULL, 3, 6, 'Um carro se move em linha reta com uma aceleração constante de 2 m/s². Se sua velocidade inicial é de 5 m/s, qual será sua velocidade após 3 segundos?', '11 m/s', '9 m/s', '11 m/s', '10 m/s', '12 m/s', 3, 'publico', 'fácil', NOW()),
(NULL, 3, 6, 'Uma onda sonora tem frequência de 440 Hz e se propaga no ar com uma velocidade de 340 m/s. Qual é o comprimento de onda dessa onda sonora?', '0,77 m', '0,77 m', '0,88 m', '0,68 m', '0,79 m', 1, 'publico', 'fácil', NOW()),
(NULL, 3, 6, 'Uma partícula move-se com velocidade constante de 20 m/s em uma trajetória circular de raio 5 m. Qual é a aceleração centrípeta da partícula?', '80 m/s²', '60 m/s²', '80 m/s²', '40 m/s²', '20 m/s²', 3, 'publico', 'médio', NOW()),
(NULL, 3, 6, 'Dois resistores, um de 4 Ω e outro de 6 Ω, são conectados em paralelo. Qual é a resistência equivalente dessa associação?', '2,4 Ω', '2,4 Ω', '4,4 Ω', '5,0 Ω', '3,6 Ω', 1, 'publico', 'médio', NOW()),
(NULL, 3, 6, 'Qual é a potência dissipada por uma lâmpada de resistência 100 Ω quando submetida a uma tensão de 220 V?', '484 W', '440 W', '484 W', '500 W', '450 W', 2, 'publico', 'médio', NOW()),
(NULL, 3, 6, 'Um gás ideal ocupa um volume de 2 L a uma pressão de 3 atm e temperatura de 300 K. Se o volume for reduzido para 1 L e a pressão aumentar para 6 atm, qual será a nova temperatura do gás?', '300 K', '300 K', '450 K', '150 K', '200 K', 1, 'publico', 'médio', NOW()),
(NULL, 3, 6, 'Um corpo de massa 2 kg está a 5 m de altura em relação ao solo. Qual é a energia potencial gravitacional desse corpo?', '100 J', '50 J', '100 J', '150 J', '200 J', 2, 'publico', 'fácil', NOW()),
(NULL, 3, 6, 'Um transformador ideal tem 200 espiras no primário e 50 espiras no secundário. Se a tensão no primário é de 120 V, qual será a tensão no secundário?', '30 V', '20 V', '30 V', '40 V', '50 V', 3, 'publico', 'dificil', NOW());*/
