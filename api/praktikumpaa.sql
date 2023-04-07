create table users (
	id char(10) not null,
 	username varchar(50) not null,
	password varchar(50) not null,
    created date not null
)
create table datas ( 
	id int(10) not null AUTO_INCREMENT, 
	name varchar(50) not null, 
	email varchar(50) not null, 
	mobile varchar(50) not null, 
	PRIMARY KEY (id) 
);