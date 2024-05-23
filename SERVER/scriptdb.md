/* READ BEFORE USE, DATABASE 
WORKING ONLY IN MYSQL, 
APACHE SERVER.*/

-- creating database (datalake_projectx)

create database datalake_projectx;

USE datalake_projectx;


-- ADDING TABLE data_flights

CREATE TABLE data_flights(
    codigo_voo int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    empresa varchar(50),
    horario_func varchar(50)
);

-- ADDING PERMISSION DATABASE

CREATE TABLE perm_db(
    IDusr int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    permissions varchar(50),
    active varchar(3)
);

-- ADDING TABLE user.flight

CREATE TABLE user_flight(
    codigo_user int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name_user varchar(255) NOT NULL,
    passwd_user varchar(50) NOT NULL,
    identity varchar(50) NOT NULL,
    IDusr int
);




-- ADDING RESERVA_db

CREATE TABLE reserva_db(
    IDvoo int PRIMARY KEY NOT NULL,
    codigo_user int,
    codigo_voo int,
    lugares int,
    reserva varchar(3),
    FOREIGN KEY(codigo_user) REFERENCES user_flight(codigo_user),
    FOREIGN KEY(codigo_voo) REFERENCES data_flights(codigo_voo)
);



-- ADDING DATA TO datalake.projectx

INSERT INTO data_flights (empresa, horario_func)
VALUES ('LatamVoos', '00:00 - 23:59'),
       ('InternationalFlights', '00:00 - 23:59'),
       ('CallmeFly', '00:00 - 23:59'),
       ('JapanFlights', '00:00 - 23:59');

-- ADDING DATA TO user.flight

INSERT INTO user_flight (name_user, passwd_user, identity, IDusr)
VALUES ('AdminDb', '123456', 'admin.db.usr' , 967),
       ('AdminFLY', '1234567', 'admin.db.fly', 968),
       ('AdminDL.db', 'Admin.admin', 'admin.admin', 999),
       ('teste1', 'teste', 'usr.teste', 100),
       ('teste2', 'teste', 'usr.teste2', 110),
       ('teste3', 'teste', 'usr.teste3', 120),
       ('teste4', 'teste', 'usr.teste4', 130);

-- ADDING DATA TO perm_db



INSERT INTO perm_db (IDusr, permissions, active)
VALUES (967, 'db.admin', 'yes'),
       (968, 'fly.manager', 'yes'),
       (999, 'admin.admin.admin', 'yes'),
       (100, 'member', 'no'),
       (110, 'member', 'yes'),
       (120, 'member', 'yes'),
       (130, 'member', 'yes');
       


