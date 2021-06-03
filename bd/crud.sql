
create database crud;
use crud;

create table t_equipos(
			id int auto_increment,
            nombredelequipo varchar(50),
            modelo varchar(50),
            serie varchar(50),
            imagen longblob not null,
			nombre varchar(50),
			apellido varchar(50),
			email varchar(50),
			telefono varchar(50),
            Fecha datetime default current_timestamp,
			primary key(id)
					);

