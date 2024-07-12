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

CREATE TABLE questao (
    id INT NOT NULL AUTO_INCREMENT UNIQUE,
    idprofessor INT NOT NULL,
    materia INT NOT NULL,
    texto_questao TEXT NOT NULL,
    opccorreta TEXT NOT NULL,
    opcalternativa1 TEXT NOT NULL,
    opcalternativa2 TEXT NOT NULL,
    opcalternativa3 TEXT NOT NULL,
    opcalternativa4 TEXT NOT NULL,
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
    questoes INT NOT NULL,
    idprova INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario)
        REFERENCES usuarios (id),
	FOREIGN KEY (questoes)
        REFERENCES questao (id),
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