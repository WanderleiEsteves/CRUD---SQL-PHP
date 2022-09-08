create database LoginCadastro;

use LoginCadastro;

create table usuario(
id int unsigned auto_increment not null primary key,
nome varchar(80) not null,
email varchar(80) not null,
senha varchar(80) not null,
dt_nasc date not null,
telefone varchar(15) not null,
endereco varchar(200) not null
)engine=innodb;

select * from usuario;

insert into usuario values (null,'Wanderlei','wanderlei.oliveiraj@gmail.com','213','2000/02/20','(31) 98794-8321','Rua violeta'),
						   (null,'Mônica','monicaoli@gmail.com','321','2000/01/14','(31) 90865-4321','Avenida Amazonas'),
                           (null,'Julio','juliof@gmail.com','124','2000/03/30','(31) 95425-7532','Rua alexandrita'),
                           (null,'Sérgio','serginm@gmail.com','4215','2000/04/20','(31) 93127-3129','Rua esmeralda'),
                           (null,'karen','karenhe@gmail.com','435','2000/05/21','(31) 94230-3128','Avenida Silva Lobo');
