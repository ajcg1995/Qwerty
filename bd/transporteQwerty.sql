--BASE DE DATOS VERSION 1.0
--ULTIMA ACTUALIZACION 17/03/2018

CREATE DATABASE QWERTYTRANSPORTES;
use QWERTYTRANSPORTES;

--Creación de las tablas 
CREATE TABLE ROL(
	idRol int NOT NULL AUTO_INCREMENT, PRIMARY KEY(idRol),
        nombreRol VARCHAR(150)
);
ALTER TABLE ROL
ADD UNIQUE (nombreRol) 

CREATE TABLE permiso(
	idPermiso int NOT NULL AUTO_INCREMENT, PRIMARY KEY(idPermiso),
	nombrePermiso VARCHAR(150)
);
ALTER TABLE permiso
ADD UNIQUE (nombrePermiso) 

CREATE TABLE RolPermiso(
	idPermiso INT,
	idRol int,
	PRIMARY KEY(idRol,idPermiso),
	FOREIGN KEY (idPermiso) REFERENCES permiso(idPermiso),
	FOREIGN KEY (idRol) REFERENCES rol(idRol)
);


CREATE TABLE EMPRESA(
	idEmpresa int NOT NULL AUTO_INCREMENT, PRIMARY KEY(idEmpresa),
	nombreEmpresa VARCHAR(150),
	encargado VARCHAR(150),
	telefono varchar(100),
	direccion varchar(300),
        correo VARCHAR(50)
);
ALTER TABLE EMPRESA
ADD UNIQUE (nombreEmpresa) 


CREATE TABLE Usuario(
	idUsuario VARCHAR(70) NOT NULL, PRIMARY KEY(idUsuario),
	nombreUsuario VARCHAR(50),
	apellidoUsuario VARCHAR(50),
	contrasena MEDIUMTEXT, --cambiar por longtext
	foto VARCHAR(50),
	estadoUsuario Boolean,
        idEmpresa int,
        idRol int,
	FOREIGN KEY (idEmpresa) REFERENCES empresa(idEmpresa),
	FOREIGN KEY (idRol) REFERENCES rol(idRol)
);



CREATE TABLE noticia
(
	idNoticia int NOT NULL AUTO_INCREMENT, PRIMARY KEY(idNoticia),
	fechaNoticia date,
	descripcionNoticia varchar (1000),
	idEmpresa int,
	imgNoticia blob,
	FOREIGN KEY (idEmpresa) REFERENCES empresa(idEmpresa) 
);

CREATE TABLE ruta
(
	idRuta varchar(100) NOT NULL, PRIMARY KEY(idRuta),
	idEmpresa int,
	nombreRuta varchar(100),
	gps longtext,
	imgHorario varchar(100),
	estado Boolean,
	horario varchar(100),
	FOREIGN KEY (idEmpresa) REFERENCES empresa(idEmpresa)
);
ALTER TABLE RUTA
ADD UNIQUE (nombreRuta)

CREATE TABLE dispositivo
(
	idDispositivo varchar(100),
	idRuta varchar(100),
	FOREIGN KEY (idRuta) REFERENCES ruta(idRuta)
)

CREATE TABLE tarifa
(
	monto double,
	descripcion varchar (200),
	idRuta varchar(100),
	FOREIGN KEY (idRuta) REFERENCES ruta(idRuta)  
)
--Fin de las tablas de la base de datos


--INICIO DE PROCEDIMIENTOS ALMACENADOS
--LISTAR TODOS LOS ROLES
DROP PROCEDURE IF EXISTS PAlistarRoles;
DELIMITER $$
CREATE PROCEDURE PAlistarRoles() 
  BEGIN
    SELECT idRol, nombreRol from Rol; 
  END
$$
DELIMITER ;

--AGREGAR UN ROL NUEVO
DROP PROCEDURE IF EXISTS PAagregarRoles;
DELIMITER $$
CREATE PROCEDURE PAagregarRoles(IN nombreRol varchar(50)) 
BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SHOW ERRORS LIMIT 1;
        RESIGNAL;
        ROLLBACK;
    END; 
        DECLARE EXIT HANDLER FOR SQLWARNING
    BEGIN
        SHOW WARNINGS LIMIT 1;
        RESIGNAL;
        ROLLBACK;
    END;
    START TRANSACTION;
        insert into Rol (idRol, nombreRol) values(null, nombreRol);
        commit;  
END
$$
DELIMITER;


--ELIMINAR UN ROL 
DROP PROCEDURE IF EXISTS PAeliminarRoles;
DELIMITER $$
CREATE PROCEDURE PAeliminarRoles(IN id INT) 
BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SHOW ERRORS LIMIT 1;
        RESIGNAL;
        ROLLBACK;
    END; 
        DECLARE EXIT HANDLER FOR SQLWARNING
    BEGIN
        SHOW WARNINGS LIMIT 1;
        RESIGNAL;
        ROLLBACK;
    END;
    START TRANSACTION;
        delete from Rol where idRol = id;
    commit;  
END
$$
DELIMITER ;

--ACTUALIZAR UN ROL 
DROP PROCEDURE IF EXISTS PAactualizarRoles;
DELIMITER $$
CREATE PROCEDURE PAactualizarRoles(IN id INT, IN nombre varchar(50)) 
BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SHOW ERRORS LIMIT 1;
        RESIGNAL;
        ROLLBACK;
    END; 
        DECLARE EXIT HANDLER FOR SQLWARNING
    BEGIN
        SHOW WARNINGS LIMIT 1;
        RESIGNAL;
        ROLLBACK;
    END;
    START TRANSACTION;
        update Rol SET nombreRol= nombre where idRol = id;
    commit;  
END
$$
DELIMITER ;

--LISTAR TODOS LOS PERMISOS
DROP PROCEDURE IF EXISTS PAlistarPermisos;
DELIMITER $$
CREATE PROCEDURE PAlistarPermisos() 
  BEGIN
    SELECT idPermiso, nombrePermiso from Permiso; 
  END
$$
DELIMITER ;

--LISTAR TODOS LOS USUARIOS
DROP PROCEDURE IF EXISTS PAlistarUsuarios;
DELIMITER $$
CREATE PROCEDURE PAlistarUsuarios() 
BEGIN
SELECT emp.nombreEmpresa, emp.encargado, emp.telefono, emp.direccion, emp.direccion, emp.idEmpresa,emp.correo,
rol.idRol,rol.nombreRol, us.idUsuario, us.nombreUsuario, us.apellidoUsuario,us.contrasena,
 us.foto, us.estadoUsuario, us.idEmpresa, us.idRol from
(SELECT nombreEmpresa, encargado, telefono, direccion, idEmpresa, correo from Empresa)emp,
(SELECT idRol, nombreRol from Rol)rol,
(SELECT idUsuario, nombreUsuario, apellidoUsuario,contrasena,foto,estadoUsuario,idEmpresa,idRol from Usuario)us 
where emp.idEmpresa = us.idEmpresa and rol.idRol = us.idRol;
END
$$
DELIMITER ;

--lISTAR TODAS LAS RUTAS
DROP PROCEDURE IF EXISTS PAlistarRutas;
DELIMITER $$
CREATE PROCEDURE PAlistarRutas() 
BEGIN
SELECT idRuta,idEmpresa,nombreRuta,gps,imgHorario,estado,horario  from Ruta;
END
$$
DELIMITER ;

--LISTAR TODAS LAS EMPRESAS
DROP PROCEDURE IF EXISTS PAlistarEmpresas;
DELIMITER $$
CREATE PROCEDURE PAlistarEmpresas() 
BEGIN
SELECT correo, idEmpresa, nombreEmpresa, encargado, telefono, direccion  from Empresa;
END
$$
DELIMITER ;

--LISTAR TODOS LOS DISPOSITIVOS
DROP PROCEDURE IF EXISTS PAlistarDispositivos;
DELIMITER $$
CREATE PROCEDURE PAlistarPermisosPorRol(IN codigoRol INT) 
  BEGIN
SELECT rolper.idPermiso, per.nombrePermiso from 
    (SELECT idPermiso, nombrePermiso from Permiso) per,
(SELECT idPermiso from RolPermiso where idRol = codigoRol) rolper
where per.idPermiso = rolper.idPermiso;
  END
$$
DELIMITER ;

--LISTAR TODAS LAS RUTAS ASOCIADAS A UNA EMPRESA
DROP PROCEDURE IF EXISTS PAlistarRutasPorEmpresa;
DELIMITER $$
CREATE PROCEDURE PAlistarRutasPorEmpresa(IN codigoEmpresa INT) 
  BEGIN
--terminar
  END
$$
DELIMITER ;

--LISTAR TODOS LOS BUSES ASOCIADOS A UNA RUTA
DROP PROCEDURE IF EXISTS PAlistarBuesePorRutas;
DELIMITER $$
CREATE PROCEDURE PAlistarBuesePorRutas(IN codigoRuta INT) 
  BEGIN
--terminar
  END
$$
DELIMITER ;



DROP PROCEDURE IF EXISTS PAusuarioLogueado;
DELIMITER $$
CREATE PROCEDURE PAusuarioLogueado(IN usuario varchar(50), IN con MEDIUMTEXT)
BEGIN
SELECT emp.nombreEmpresa, emp.encargado, emp.telefono, emp.direccion, emp.direccion, emp.idEmpresa,emp.correo,
rol.idRol,rol.nombreRol, us.idUsuario, us.nombreUsuario, us.apellidoUsuario,us.contrasena,
 us.foto, us.estadoUsuario, us.idEmpresa, us.idRol from
(SELECT nombreEmpresa, encargado, telefono, direccion, idEmpresa, correo from Empresa)emp,
(SELECT idRol, nombreRol from Rol)rol,
(SELECT idUsuario, nombreUsuario, apellidoUsuario,contrasena,foto,estadoUsuario,idEmpresa,idRol from Usuario)us 
where emp.idEmpresa = us.idEmpresa and rol.idRol = us.idRol and us.idUsuario = usuario and us.contrasena = con;
END
$$
DELIMITER ;


DROP PROCEDURE IF EXISTS PAcontrasenaUsuario;
DELIMITER $$
CREATE PROCEDURE PAcontrasenaUsuario(IN us varchar(50))
BEGIN
    SELECT contrasena from Usuario where idUsuario = us;
END
$$
DELIMITER ;


DROP PROCEDURE IF EXISTS PAactualizarContrasena;
DELIMITER $$
CREATE PROCEDURE PAactualizarContrasena(IN us varchar(50),IN con MEDIUMTEXT)
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
    ROLLBACK;
END; 
DECLARE EXIT HANDLER FOR SQLWARNING
BEGIN
    ROLLBACK;
END;
START TRANSACTION;
    UPDATE Usuario  set contrasena = con where idUsuario = us;
COMMIT;
END
$$
DELIMITER ;



--Insert a la base de datos roles
INSERT INTO ROL(idrol,nombrerol) values(1,'Administrador');
INSERT INTO ROL(idrol,nombrerol) values(2,'Coordinador');
INSERT INTO ROL(idrol,nombrerol) values(3,'Responsable');
INSERT INTO ROL(idrol,nombrerol) values(4,'Invitado');

--Insert a la base de datos permisos
INSERT INTO PERMISO(idPermiso,nombrepermiso) values(1,'Administracion general');
INSERT INTO PERMISO(idPermiso,nombrepermiso) values(2,'Administracion de empresas');
INSERT INTO PERMISO(idPermiso,nombrepermiso) values(3,'Administracion de usuarios');
INSERT INTO PERMISO(idPermiso,nombrepermiso) values(4,'Administracion de rutas');
INSERT INTO PERMISO(idPermiso,nombrepermiso) values(5,'Administracion de buses');
INSERT INTO PERMISO(idPermiso,nombrepermiso) values(6,'Administracion de horarios');
INSERT INTO PERMISO(idPermiso,nombrepermiso) values(7,'Administracion de cuenta');

INSERT INTO ROLPERMISO() VALUES(1,2);
INSERT INTO ROLPERMISO() VALUES(1,3);
INSERT INTO ROLPERMISO() VALUES(1,4);
INSERT INTO ROLPERMISO() VALUES(1,5);
INSERT INTO ROLPERMISO() VALUES(1,6);

INSERT INTO EMPRESA(idEmpresa, nombreEmpresa,encargado, telefono,direccion,correo) 
VALUES (1,'Tuasa','Juan Perez','22342312','Alajuela','tuasa@gmail.com');
INSERT INTO EMPRESA(idEmpresa, nombreEmpresa,encargado, telefono,direccion,correo) 
VALUES (2,'Busetas Heredianas','Pedro Alvarado','22344312','Heredia','busetasHeredianas@gmail.com');

INSERT INTO USUARIO(idUsuario,nombreUsuario,apellidoUsuario,contrasena,foto,estadoUsuario,idEmpresa,idRol) 
VALUES('infoqwertycr@gmail.com','Qwerty','','123','../adjuntos/qwertylogo.png',1,1,1);
INSERT INTO USUARIO(idUsuario,nombreUsuario,apellidoUsuario,contrasena,foto,estadoUsuario,idEmpresa,idRol) 
VALUES('francini113.com','Francini','Corrales','1234','../adjuntos/qwertylogo.png',1,2,1);

INSERT INTO RUTA(idRuta,idEmpresa,nombreRuta,gps,imgHorario,estado,horario) values
('1','1','Alajuela-San Jose','1','img.jpg',1,'1'); 
INSERT INTO RUTA(idRuta,idEmpresa,nombreRuta,gps,imgHorario,estado,horario) values
('2','1','Alajuela-Heredia','1','img.jpg',1,'1');
INSERT INTO RUTA(idRuta,idEmpresa,nombreRuta,gps,imgHorario,estado,horario) values
('3','1','Alajuela-Aeropuerto','1','img.jpg',1,'1');
--FIN DE PROCEDIMIENTOS ALMACENADOS 





--LLamada a procedimientos
call PaagregarRoles('Admin')