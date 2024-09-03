
/* query para creacion de tabla usuarios */
create table usuarios(
    id_usuario  INT (11) NOT NULL auto_increment PRIMARY KEY,
    nombres     VARCHAR (255) NOT NULL,
    apellidos   VARCHAR (255) NOT NULL,
    cargo       VARCHAR (255) NOT NULL,
    correo       VARCHAR (255) NOT NULL UNIQUE KEY,
    password    text NOT NULL,

    fyh_creacion datetime NULL,
    fyh_actualizacion DATETIME NULL,
    estado      varchar (11)

)ENGINE=InnoDB;



INSERT INTO usuarios (nombres,apellidos,cargo,correo,password,fyh_creacion,estado)
VALUES ('Samuel','Sunum','Administrador','Admin@vrsanchez.com','e0d6b06fa49ff04acd89e188a04377ef','2024-08-15 02:35:18')


select * from usuarios WHERE correo = 'admin@vrsanchez.com';




/* query para creacion de tabla de roles */
CREATE TABLE roles (
    id_rol INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(255) NOT NULL UNIQUE KEY,
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR(11)
) ENGINE=InnoDB;

INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('ADMINISTRADOR', '2024-08-22 16:54:20', '1');
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('DIRECTOR', '2024-08-22 16:54:20', '1');
