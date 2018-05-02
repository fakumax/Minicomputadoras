-- -------------------------------------
-- BASE DE DATOS dbexamenes
-- -------------------------------------

CREATE DATABASE examenes;
GRANT ALL PRIVILEGES ON examenes.* TO
root@localhost WITH GRANT OPTION;
USE examenes;

-- -------------------------------------
-- ESTRUCTURAS DE TABLAS Y VOLCAR DATOS
-- -------------------------------------

CREATE TABLE IF NOT EXISTS persona (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	dni INT(8) NOT NULL, 
	apellido VARCHAR(50) NOT NULL, 
	nombre VARCHAR(50) NOT NULL, 
	telefono VARCHAR(20), 
	email VARCHAR(50), 
	fecha_ing DATETIME NOT NULL, 
	clave VARCHAR(70) NOT NULL, 
	tipo CHAR(1) NOT NULL, 
	PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO persona (id, dni, apellido, nombre, telefono, email, fecha_ing, clave, tipo) VALUES
(1, 11111111, 'Administrador', 'Administrador', NULL, 'admin', '2017-11-07 13:13:21', '$2y$10$Gypsx4RtQhcw3Jr5EBiDX.5ilmxKzRDGbngdB9bJsx3B.i9.T0/Nu', 'A'),
(2, 22222222, 'Rodriguez', 'Guillermo', NULL, 'profesor', '2017-11-07 13:13:21', '$2y$10$31nAJwWO7aoLx2Z7xiT6UOA0SdW7.TLPZIPhYGz5TdNm3QjywsSVK', 'P'),
(3, 33333333, 'Perez', 'Juan', '3764333333', 'alumno@gmail.com', '2017-11-07 13:13:21', '$2y$10$wJX3IG01foLTUFS9b666VuOqxuo3zYqLVIVhKxqp2LvGRzxyNCOFm', 'S');
 
CREATE TABLE IF NOT EXISTS materia (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	nombre VARCHAR(50) NOT NULL, 
	descripcion TEXT, 
	anio INT(1) NOT NULL;
	clave VARCHAR(20),
	PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO materia (id, nombre, descripcion, anio, clave) VALUES
(1, 'Matematica I', 'Comprende las operaciones con numeros naturales', 1, 'ferrari'),
(2, 'Matematica 2', 'Comprende las operaciones con numeros enteros', 2, 'volkswagen');

CREATE TABLE IF NOT EXISTS persona_materia (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	persona_id INT(5) NOT NULL, 
	materia_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (persona_id) REFERENCES persona(id)
	ON DELETE CASCADE ON UPDATE CASCADE, 
	FOREIGN KEY (materia_id) REFERENCES materia(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO persona_materia (id, persona_id, materia_id) VALUES
(1, 2, 1),
(2, 2, 2);

CREATE TABLE IF NOT EXISTS unidad (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	nombre VARCHAR(50) NOT NULL, 
	descripcion TEXT, 
	numero INT(2), 
	materia_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (materia_id) REFERENCES materia(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS tema (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	nombre VARCHAR(50) NOT NULL, 
	descripcion TEXT, 
	numero INT(2), 
	unidad_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (unidad_id) REFERENCES unidad(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS pregunta (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	nombre VARCHAR(50) NOT NULL, 
	enunciado TEXT NOT NULL, 
	tipo INT(2) NOT NULL, 
	valor INT(3) NOT NULL, 
	porcentaje_error INT(3) NOT NULL, 
	url_imagen VARCHAR(70), 
	tema_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (tema_id) REFERENCES tema(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS respuesta (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	descripcion VARCHAR(50) NOT NULL, 
	correspondiente VARCHAR(50), 
	correcto BOOLEAN NOT NULL, 
	pregunta_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (pregunta_id) REFERENCES pregunta(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS etiqueta (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	descripcion VARCHAR(50) NOT NULL, 
	correspondiente VARCHAR(50) NOT NULL, 
	correcto BOOLEAN NOT NULL, 
	pregunta_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (pregunta_id) REFERENCES pregunta(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS examen (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	nombre VARCHAR(50) NOT NULL, 
	fecha_limite DATETIME NOT NULL, 
	nota_minima INT(2) NOT NULL, 
	tiempo TIME NOT NULL, 
	correcciones INT(1), 
	PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS tema_examen (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	tema_id INT(5) NOT NULL, 
	examen_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (tema_id) REFERENCES tema(id)
	ON DELETE CASCADE ON UPDATE CASCADE, 
	FOREIGN KEY (examen_id) REFERENCES examen(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS examen_tomado (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	fecha DATETIME NOT NULL, 
	estado INT(1) NOT NULL, 
	nota_minima INT(2) NOT NULL, 
	examen_id INT(5) NOT NULL, 
	persona_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (examen_id) REFERENCES examen(id)
	ON DELETE CASCADE ON UPDATE CASCADE, 
	FOREIGN KEY (persona_id) REFERENCES persona(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS res_elegida (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	respuesta_id INT(5) NOT NULL, 
	examen_tomado_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (respuesta_id) REFERENCES respuesta(id)
	ON DELETE CASCADE ON UPDATE CASCADE, 
	FOREIGN KEY (examen_tomado_id) REFERENCES examen_tomado(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS etiq_elegida (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	etiqueta_id INT(5) NOT NULL, 
	examen_tomado_id INT(5) NOT NULL, 
	PRIMARY KEY (id), 
	FOREIGN KEY (etiqueta_id) REFERENCES etiqueta(id)
	ON DELETE CASCADE ON UPDATE CASCADE, 
	FOREIGN KEY (examen_tomado_id) REFERENCES examen_tomado(id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;