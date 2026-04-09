create database BDS;
use BDS;

create table LoginUsuário (
idLoginU int primary key not null auto_increment,
nome varchar(50) not null,
username varchar(50) not null unique,
email varchar(50) not null,
telefone varchar(11) not null unique,
senha varchar(50) not null,
cpf varchar(11) not null
)

create table Usuario (
idUsuario int primary key not null auto_increment ,
cpf varchar(11) not null unique,
registroTrabalhista varchar(100) not null unique,
idUsername int unique not null,
foreign key (idUsername) references LoginUsuário (idLoginU)
)

create table LoginEmpresa (
idLoginE int primary key not null auto_increment,
nome varchar(50) not null,
username varchar(50) not null unique,
email varchar(50) not null unique,
telefone varchar(11) not null unique,
senha varchar(50) not null,
cnpj varchar(18) not null unique, /*coloquei 18 caracteres pra considerar os ". / e -" se o animal colocar*/
fotoPerfil longblob not null,
bioPerfil varchar(300) not null,
redeSocial varchar(50)
)

create table Empresa (
idEmpresa int primary key not null auto_increment,
nome varchar(50) not null unique,
cpnj varchar(15) not null unique,
idEmpresaLogin int unique not null,
foreign key (idEmpresaLogin) references LoginEmpresa (idLoginE)
)

create table PerfilEmpresa (
idPerfil int primary key not null auto_increment,
nome varchar(50) not null,
fotoPerfil int not null unique,
bioPerfil varchar(300) not null,
redeSociais varchar(300),
idLoginPerfil int unique not null,
foreign key (idLoginPerfil) references LoginEmpresa (idLoginE) 
)

create table Avaliacao (
idAvaliacao int primary key not null auto_increment,
idEmpresaAvaliacao int unique not null,
cargo varchar(50) not null,
foreign key (idEmpresaAvaliacao) references Empresa (idEmpresa),
idUsuarioAvalicao int unique not null,
foreign key (idUsuarioAvalicao) references Usuario (idUsuario),
estrelas TINYINT CHECK (estrelas BETWEEN 1 AND 5),
historia varchar(1000) not null,
registroTrabalhista varchar(50) not null unique
)