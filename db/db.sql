create table tbsetores
(
	strid SERIAL NOT NULL,
	strnome VARCHAR(255) NOT NULL
);

create table tbperguntas
(
	perid SERIAL NOT NULL,
	perdescricao VARCHAR(255) NOT NULL,
	perativa BOOLEAN,
	strid INT NOT NULL
);

create table tbavaliacao
(
	avaid SERIAL NOT NULL,
	avanota integer not null,
	perid integer not null
);

create table tbusuarios
(
	usrid serial not null,
	usrname char(255) not null,
	usremail varchar(255) not null,
	userpassword varchar(255) not null,
	usrativo boolean not null,
	strid int not null
);


alter table tbavaliacao add constraint pk_avaliacao primary key (avaid);
alter table tbavaliacao add constraint fk_pergunta foreign key (perid) references tbperguntas(perid);

alter table tbperguntas add constraint pk_id_pergunta primary key (perid);
alter table tbperguntas add constraint fk_id_setor foreign key (strid) references tbsetores(strid);

alter table tbusuarios add constraint pk_id_user primary key (usrid);
alter table tbusuarios add constraint fk_id_setor foreign key (strid) references tbsetores(strid);

alter table tbsetores add constraint pk_id_setor primary key (strid);