CREATE DATABASE banco_digital;

USE banco_digital;

CREATE TABLE correntista
(
	id INT AUTO_INCREMENT,
    nome VARCHAR(150),
    cpf CHAR(11),
    data_nasc DATE,
    email VARCHAR(100),
    senha VARCHAR(100),
    data_cad DATE,
    PRIMARY KEY (id)
);

CREATE TABLE conta
(
	id INT AUTO_INCREMENT,
    numero VARCHAR(150),
    tipo ENUM("Corrente", "Poupança"),
    saldo DOUBLE, 
    limite DOUBLE,
    senha VARCHAR(100),
    data_abertura DATE,
    id_correntista INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_correntista) REFERENCES correntista(id)
);

CREATE TABLE chave_pix
(
	id INT AUTO_INCREMENT,
    tipo ENUM("CPF", "Número Celular", "E-mail", "Aleatório"),
    chave VARCHAR(150),
    id_conta INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_conta) REFERENCES conta (id)
); 

CREATE TABLE transacao
(
	id INT AUTO_INCREMENT,
    valor DOUBLE,
    data_transacao TIMESTAMP,
    id_conta_remetente INT,
    id_conta_destinatario INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_conta_remetente) REFERENCES conta (id),
    FOREIGN KEY (id_conta_destinatario) REFERENCES conta (id)
);

CREATE TABLE conta_transacao_assoc
(
	id INT AUTO_INCREMENT,
    id_conta INT,
    id_transacao INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_conta) REFERENCES conta (id),
    FOREIGN KEY (id_transacao) REFERENCES transacao (id)
);