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

CREATE TABLE questao (
    id INT NOT NULL UNIQUE,
    idprofessor INT NOT NULL,
    turmaquestao INT NOT NULL,
    bimestrequestao INT NOT NULL,
    data_cad DATETIME NOT NULL,
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

CREATE TABLE provas (
    id INT NOT NULL AUTO_INCREMENT,
    id_aluno INT NOT NULL,
    id_professor INT NOT NULL,
    questoes TEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_aluno)
        REFERENCES alunos (id),
    FOREIGN KEY (id_professor)
        REFERENCES professor (id_usuario)
);

INSERT INTO usuarios VALUES (NULL, 'teste', 'teste@gmail.com', '1234567890'),
							(NULL, 'adm', 'adm@adm.com', 'adm12345'),
                            (NULL, 'professor', 'prof@prof.com', 'prof12345'),
                            (NULL, 'teste', 'teste@teste.com', NULL);

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
                         
INSERT INTO professor VALUES (1, 7),
							 (1, 8),
                             (1, 9),
                             (3, 1),
                             (3, 2),
                             (3, 3),
                             (3, 4),
                             (3, 5),
                             (3, 6),
                             (3, 7),
                             (3, 8),
                             (3, 9),
                             (3, 10),
                             (3, 11),
                             (3, 12);