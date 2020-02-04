drop database if exists Banco_Postagens;
create database Banco_Postagens;
use Banco_Postagens;

create table postagem(
id int(11) auto_increment primary key not null,
titulo varchar(100) not null,
conteudo varchar(1000) not null
)charset=utf8;
create table comentario(
id int(11) auto_increment primary key not null,
nome varchar(45) not null,
mensagem varchar(300) not null,
id_postagem int(11) not null
);
INSERT INTO `postagem`(`id`, `titulo`, `conteudo`) VALUES (1,'inferno','funciona joça')

