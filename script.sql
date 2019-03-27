	CREATE DATABASE ranking;
	USE ranking;

	CREATE TABLE Materia(idMateria int not null auto_increment primary key,
						 materia varchar(32) not null);
                         
	CREATE TABLE Tipo(idTipo int not null auto_increment primary key,
					  tipo varchar(32) not null);

	CREATE TABLE Estudiante(idEstudiante int not null auto_increment primary key,
							nombre varchar(32) not null,
							apellidos varchar(32) not null,
							fechaNacimiento date not null,
							centroEscolar varchar(32) not null);
							
	CREATE TABLE Certificacion(idCertificacion int not null auto_increment primary key,
							   idTipo int not null,
							   idEstudiante int not null,
							   nota decimal(4,2) not null,
							   foreign key(idTipo) references Tipo(idTipo),
							   foreign key(idEstudiante) references Estudiante(idEstudiante));

	CREATE TABLE Nota(idNota int not null auto_increment primary key,
					  idEstudiante int not null,
					  idMateria int not null,
					  nota decimal(4,2) not null,
					  periodo varchar(16) not null,
					  anio varchar(4) not null,
					  porcentaje varchar(8) not null,
					  foreign key (idEstudiante) references Estudiante(idEstudiante),
					  foreign key (idMateria) references Materia(idMateria));