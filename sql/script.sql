CREATE SCHEMA automind;

USE automind;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT UNIQUE,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE turma (
    id INT NOT NULL AUTO_INCREMENT UNIQUE,
    nome VARCHAR(10) NOT NULL,
    curso VARCHAR(30) NOT NULL,
    anoletivo INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE questao (
    id INT NOT NULL UNIQUE,
    idprofessor INT NOT NULL,
    turmaquestao INT NOT NULL,
    bimestrequestao INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idprofessor)
        REFERENCES usuarios (id),
	FOREIGN KEY (turmaquestao)
        REFERENCES turma (id)
);

CREATE TABLE textoquestao (
    id INT NOT NULL UNIQUE,
    textoquestao TEXT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE imgquestao (
    id INT NOT NULL UNIQUE,
    img TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE perguntaquestao (
    id INT NOT NULL UNIQUE,
    textoquestao TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE alternativas (
    id INT NOT NULL UNIQUE,
    alternativacorreta CHAR(1) NOT NULL,
    alternativaa TEXT NOT NULL,
    alternativab TEXT NOT NULL,
    alternativac TEXT NOT NULL,
    alternativad TEXT NOT NULL,
    alternativae TEXT NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO usuarios VALUES (NULL, 'teste', 'teste@gmail.com', '1234567890');

INSERT INTO turma VALUES (NULL, 'edif', 'Edificações',  1),
						 (NULL, 'edif', 'Edificações', 2),
                         (NULL, 'edif', 'Edificações', 3),
                         (NULL, 'eletro', 'Eletrotécnica', 1),
                         (NULL, 'eletro', 'Eletrotécnica', 2),
                         (NULL, 'eletro', 'Eletrotécnica', 3),
                         (NULL, 'info', 'Informática', 1),
                         (NULL, 'info', 'Informática', 2),
                         (NULL, 'info', 'Informática', 3),
                         (NULL, 'tst', 'Segurança do Trabalho', 1),
                         (NULL, 'tst', 'Segurança do Trabalho', 2),
                         (NULL, 'tst', 'Segurança do Trabalho', 3);