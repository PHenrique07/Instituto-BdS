CREATE DATABASE BDS;
USE BDS;

CREATE TABLE LoginUsuário (
    idLoginU INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL,
    telefone VARCHAR(11) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    cpf VARCHAR(11) NOT NULL
);

CREATE TABLE Usuario (
    idUsuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    registroTrabalhista VARCHAR(100) NOT NULL UNIQUE,
    idUsername INT UNIQUE NOT NULL,
    FOREIGN KEY (idUsername) REFERENCES LoginUsuário (idLoginU)
);

CREATE TABLE LoginEmpresa (
    idLoginE INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    telefone VARCHAR(11) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    cnpj VARCHAR(18) NOT NULL UNIQUE, /* Corrigido "cpnj" para "cnpj" */
    bioPerfil VARCHAR(300) NOT NULL,
    redeSocial VARCHAR(50)
);

CREATE TABLE Empresa (
    idEmpresa INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL UNIQUE,
    cnpj VARCHAR(18) NOT NULL UNIQUE, /* Corrigido "cpnj" para "cnpj" */
    idEmpresaLogin INT UNIQUE NOT NULL,
    FOREIGN KEY (idEmpresaLogin) REFERENCES LoginEmpresa (idLoginE)
);

CREATE TABLE PerfilEmpresa (
    idPerfil INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    fotoPerfil INT NOT NULL UNIQUE,
    bioPerfil VARCHAR(300) NOT NULL,
    redeSociais VARCHAR(300),
    idLoginPerfil INT UNIQUE NOT NULL,
    FOREIGN KEY (idLoginPerfil) REFERENCES LoginEmpresa (idLoginE)
);
 /*essa seria a nossa tabela q tava dando erro
 CREATE TABLE Avaliacao (
    idAvaliacao INT PRIMARY KEY NOT NULL AUTO_INCREMENT,       
    nome VARCHAR(100) NOT NULL,                -- Nome do avaliador
    email VARCHAR(100) NOT NULL,               -- Email do avaliador
    celular VARCHAR(20) NOT NULL,              -- Número de celular do avaliador
    cargo VARCHAR(50) NOT NULL,                -- Cargo do avaliador na empresa
    historia VARCHAR(1000) NOT NULL,           -- Histórico ou relato
    registroTrabalhista VARCHAR(50) NOT NULL,  -- Registro trabalhista, deve ser único
    estrelas TINYINT NOT NULL, -- Nota (1 a 5 estrelas)
    -- FOREIGN KEY (idEmpresaAvaliacao) REFERENCES LoginEmpresa (idLoginE),      tiramos essa linha pq ela tava contanto o idEmpresaAvaliacao na tabela e dando erro para enviar dados no PHP, pq não tem como vc colocar um id variavel la
    CONSTRAINT chk_estrelas CHECK (estrelas BETWEEN 1 AND 5)
); */

CREATE TABLE Avaliacao (
    idAvaliacao INT PRIMARY KEY NOT NULL AUTO_INCREMENT,       
    nome VARCHAR(100) NOT NULL,                -- Nome do avaliador
    email VARCHAR(100) NOT NULL,               -- Email do avaliador
    celular VARCHAR(20) NOT NULL,              -- Número de celular do avaliador
    cargo VARCHAR(50) NOT NULL,                -- Cargo do avaliador na empresa
    historia VARCHAR(1000) NOT NULL,           -- Histórico ou relato
    registroTrabalhista VARCHAR(50) NOT NULL,  -- Registro trabalhista, deve ser único
    estrelas TINYINT NOT NULL, -- Nota (1 a 5 estrelas)
    IdEmpresaAvaliacao INT NOT NULL,           -- ID da empresa sendo avaliada
    CONSTRAINT chk_estrelas CHECK (estrelas BETWEEN 1 AND 5),
    CONSTRAINT fk_empresa_avaliacao FOREIGN KEY (IdEmpresaAvaliacao) REFERENCES LoginEmpresa(idLoginE)
    ON DELETE CASCADE
);
SELECT * FROM Avaliacao;
drop table Avaliacao;