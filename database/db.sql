/* query para creacion de tabla de roles */
CREATE TABLE roles (
    id_rol INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(255) NOT NULL UNIQUE,
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR(11) DEFAULT '1'
) ENGINE=InnoDB;

INSERT INTO roles (nombre_rol, fyh_creacion) VALUES ('ADMINISTRADOR', '2024-08-22 16:54:20');
INSERT INTO roles (nombre_rol, fyh_creacion) VALUES ('DIRECTOR', '2024-08-22 16:54:20');


/* query para creacion de tabla usuarios */
CREATE TABLE usuarios(
    id_usuario  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id      INT (11) NOT NULL,
    correo      VARCHAR (255) NOT NULL UNIQUE,
    password    TEXT NOT NULL,
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado      VARCHAR (11) DEFAULT '1',
    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;

INSERT INTO usuarios (rol_id,correo,password,fyh_creacion)
VALUES (1,'vrsanchez.admn@gmail.com','$2y$10$Xzi7n..aAXFfoZd3no6tf.vCJpSHRgcqD8RtBGbJO7z17jQ8oBEFG','2024-08-15 02:35:18');


/* Tabla Personas */
CREATE TABLE personas(
    id_persona  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id  INT (11) NOT NULL,
    nombres     VARCHAR (50) NOT NULL,
    apellidos   VARCHAR (50) NOT NULL,
    cui         VARCHAR (25) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    direccion   VARCHAR (255) NOT NULL,
    celular     VARCHAR (20) NOT NULL,
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado      VARCHAR (11) DEFAULT '1',
    FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;

INSERT INTO personas (usuario_id,nombres,apellidos,cui,fecha_nacimiento,direccion,celular,fyh_creacion)
VALUES (1,'Dayana Eli','Hernandez','123456789','2002-10-14','colonia san antonio, zona 7','41801200','2024-08-15 02:35:18');


/* Tabla administrativos */
CREATE TABLE administrativos (

  id_administrativo      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id             INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;


/* Tabla docentes */
CREATE TABLE docentes (

  id_docente             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id             INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;

/* tabla año escolar */
CREATE TABLE año_escolar(

  id_periodo      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  periodo         VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO año_escolar (periodo,fyh_creacion,estado)
VALUES ('Año 2024','2024-09-06 20:29:10','1');


/* Tabla de niveles */
CREATE TABLE niveles (
id_nivel       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
periodo_id     INT (11) NOT NULL,
nivel          VARCHAR (255) NOT NULL,
turno          VARCHAR (255) NOT NULL,

fyh_creacion   DATETIME NULL,
fyh_actualizacion DATETIME NULL,
estado        VARCHAR (11),

FOREIGN KEY (periodo_id) REFERENCES año_escolar (id_periodo) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;

INSERT INTO niveles (periodo_id,nivel,turno,fyh_creacion,estado)
VALUES (1,'Pre-Primaria','Tarde','2024-09-13 20:29:10','1');


/* Tabla de grados */
CREATE TABLE grados (

  id_grado       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nivel_id       INT (11) NOT NULL,
  grado          VARCHAR (255) NOT NULL,
  seccion        VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;

INSERT INTO grados (nivel_id,grado,seccion,fyh_creacion,estado)
VALUES (1,'Parvulos','A','2024-09-20 15:05:10','1');




/* Tabla Estudiantes */
CREATE TABLE estudiantes (

  id_estudiante             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id                INT (11) NOT NULL,
  nivel_id                  INT (11) NOT NULL,
  grado_id                  INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (grado_id) REFERENCES grados (id_grado) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;


/* Tabla Padres de Familia */
CREATE TABLE padres_familia (

  id_padre             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  estudiante_id        INT (11) NOT NULL,
  nombres_pf              VARCHAR (50) NULL,
  apellidos_pf            VARCHAR (50) NULL,
  cui_pf                  VARCHAR (25) NULL,
  celular_pf              VARCHAR (50) NULL,
  parentezco              VARCHAR (50) NULL,
  encargado_dos           VARCHAR (50) NULL,
  numero_dos              VARCHAR (50) NULL,



  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;


/* query para creacion de tabla de datos para la configuracion de la escuela */
CREATE TABLE datos_institucion(
    id_inst_config         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_institucion     VARCHAR (255) NOT NULL,
    logo                   VARCHAR (255) NULL,
    direccion              VARCHAR (255) NOT NULL,
    telefono               VARCHAR (255) NULL,
    correo                 VARCHAR (255) NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado      VARCHAR (11) DEFAULT '1'
    
)ENGINE=InnoDB;

INSERT INTO datos_institucion (nombre_institucion,logo,direccion,telefono,correo,fyh_creacion)
VALUES ('Escuela Vicente R Sánchez','logo.jpg','Plazuela el Calvario zona 1 Quetzaltenango','5575044','vrsanchez.admn@gmail.com','2024-09-05 02:35:18');






/* Tabla de cursos */
CREATE TABLE cursos (

  id_curso      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_curso  VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO cursos (nombre_curso,fyh_creacion,estado)
VALUES ('Lenguaje','2024-10-01 08:27:10','1');


CREATE TABLE asignaciones (

  id_asignacion      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  docente_id         INT (11) NOT NULL,
  nivel_id           INT (11) NOT NULL,
  curso_id           INT (11) NOT NULL,
  grado_id           INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (curso_id) REFERENCES cursos (id_curso) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (grado_id) REFERENCES grados (id_grado) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;


CREATE TABLE calificaciones (

  id_calificacion      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  docente_id           INT (11) NOT NULL,
  estudiante_id        INT (11) NOT NULL,
  curso_id             INT (11) NOT NULL,
  nota1                INT (11) NULL,
  nota2                INT (11) NULL,
  nota3                INT (11) NULL,
  nota4                INT (11) NULL,
  promedio             INT (11) NULL,
 

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (curso_id) REFERENCES cursos (id_curso) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;


CREATE TABLE observaciones (

  id_observacion       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  docente_id           INT (11) NOT NULL,
  estudiante_id        INT (11) NOT NULL,
  curso_id             INT (11) NOT NULL,
  observacion          VARCHAR (255) NULL,
  fecha                VARCHAR (50) NULL,   
  nota                 TEXT NOT NULL,
  
 

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (curso_id) REFERENCES cursos (id_curso) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;

CREATE TABLE permisos (
    id_permiso        INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_url        VARCHAR (100) NOT NULL,
    url               TEXT    NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)

)ENGINE=InnoDB;


CREATE TABLE roles_permisos (
    id_rol_permiso INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id INT(11) NOT NULL,
    permiso_id INT(11) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (permiso_id) REFERENCES permisos (id_permiso) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;