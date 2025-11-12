create database novazul;
use novazul;
create table agendamentos (
nome varchar(100) not null,
cpf varchar(11) primary key,
telefone varchar(50) not null,
idade varchar(50) not null,
data_consulta date not null,
data_envio timestamp default current_timestamp
);