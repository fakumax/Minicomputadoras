USE examenes;

DROP TABLE persona_materia, tema_examen;

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


ALTER TABLE materia 
	ADD COLUMN clave VARCHAR(20),
	CHANGE año anio INT(1) NOT NULL;

INSERT INTO materia (id, nombre, descripcion, anio, clave) VALUES
(1, 'Matematica I', 'Comprende las operaciones con numeros naturales', 1, 'ferrari'),
(2, 'Matematica 2', 'Comprende las operaciones con numeros naturales', 1, 'ferrari');

INSERT INTO persona_materia (id, persona_id, materia_id) VALUES
(1, 2, 1),
(2, 2, 2);



