CREATE SCHEMA automind;

USE automind;

CREATE TABLE plano (
    id INT NOT NULL AUTO_INCREMENT,
    valor DECIMAL(10 , 2 ) NOT NULL,
    tipo VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE tags (
    id INT NOT NULL AUTO_INCREMENT,
    nome TEXT NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT UNIQUE,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    plano INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (plano)
        REFERENCES plano (id)
);

CREATE TABLE questao (
    id INT NOT NULL UNIQUE,
    idprofessor INT NOT NULL,
    assunto INT NOT NULL,
    texto_questao TEXT NOT NULL,
    img TEXT,
    pergunta TEXT,
    visu VARCHAR(10) NOT NULL,
    dificuldade VARCHAR(10) NOT NULL,
    data_cad DATETIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idprofessor)
        REFERENCES usuarios (id),
    FOREIGN KEY (assunto)
        REFERENCES tags (id)
);

CREATE TABLE turma (
    id INT NOT NULL AUTO_INCREMENT UNIQUE,
    nome VARCHAR(10) NOT NULL,
    curso VARCHAR(30) NOT NULL,
    anoletivo INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE administrador (
    id_usuario INT NOT NULL,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_usuario)
        REFERENCES usuarios (id)
);

CREATE TABLE professor (
    id_usuario INT NOT NULL,
    id_turma INT NOT NULL,
    PRIMARY KEY (id_usuario , id_turma),
    FOREIGN KEY (id_usuario)
        REFERENCES usuarios (id),
    FOREIGN KEY (id_turma)
        REFERENCES turma (id)
);

CREATE TABLE alunos (
    id INT NOT NULL AUTO_INCREMENT UNIQUE,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    curso INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (curso)
        REFERENCES turma (id)
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

CREATE TABLE provas (
    id INT NOT NULL AUTO_INCREMENT,
    usuario INT NOT NULL,
    questoes INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario)
        REFERENCES usuarios (id),
	FOREIGN KEY (questoes)
        REFERENCES questao (id)
);

INSERT INTO plano VALUES (NULL, 0, "Gratuito");

INSERT INTO tags VALUES (NULL, 'nhwebfherb');

INSERT INTO usuarios VALUES (NULL, 'teste', 'teste@gmail.com', '1234567890', 1),
							(NULL, 'adm', 'adm@adm.com', 'adm12345', 1),
                            (NULL, 'professor', 'prof@prof.com', 'prof12345', 1);

INSERT INTO administrador VALUES (2);

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