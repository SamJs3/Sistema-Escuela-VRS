/* query para creacion de tabla de roles */
CREATE TABLE roles (
    id_rol INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(255) NOT NULL UNIQUE KEY,
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR(11) DEFAULT '1'
) ENGINE=InnoDB;

INSERT INTO roles (nombre_rol, fyh_creacion) VALUES ('ADMINISTRADOR', '2024-08-22 16:54:20');
INSERT INTO roles (nombre_rol, fyh_creacion) VALUES ('DIRECTOR', '2024-08-22 16:54:20');




/* query para creacion de tabla usuarios */
create table usuarios(
    id_usuario  INT (11) NOT NULL auto_increment PRIMARY KEY,
    nombres     VARCHAR (255) NOT NULL,
    apellidos   VARCHAR (255) NOT NULL,
    rol_id      INT (11) NOT NULL,
    correo      VARCHAR (255) NOT NULL UNIQUE KEY,
    password    text NOT NULL,

    fyh_creacion datetime NULL,
    fyh_actualizacion DATETIME NULL,
    estado      varchar (11) DEFAULT '1',
    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade 
)ENGINE=InnoDB;

INSERT INTO usuarios (nombres,apellidos,rol_id,correo,password,fyh_creacion)
VALUES ('Samuel','Sunum','1','vrsanchez.admn@gmail.com','$2y$10$Xzi7n..aAXFfoZd3no6tf.vCJpSHRgcqD8RtBGbJO7z17jQ8oBEFG','2024-08-15 02:35:18')




/* primer query */
/* if(isset($_SESSION['email recibido'])){
    //echo "El usuario inicio sesion";
    $email_sesion = $_SESSION['email recibido'];
    //query que permite buscar el nombre del usuario activo en sesion
    $query_sesion = $pdo->prepare("SELECT * FROM usuarios WHERE correo = '$email_sesion' and estado ='1';");
    $query_sesion->execute();

    $datos_usuario = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datos_usuario as $datos_usuario){
       $nombre_usuario = $datos_usuario['nombres'];
       $cargo_usuario = $datos_usuario['rol_id'];
    } */