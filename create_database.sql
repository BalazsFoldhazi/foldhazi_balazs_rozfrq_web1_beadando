CREATE DATABASE 1912elore;

USE 1912elore;

CREATE TABLE users(
    user_name Varchar(15) primary key not null,
	user_veznev Varchar(15) not null,
    user_kernev Varchar(15) not null,
    user_email Varchar(30) not null,
    user_jelszo Varchar(64) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;;

CREATE TABLE emails(
    id int AUTO_INCREMENT primary key not null,
	nev Varchar(30) not null,
	email Varchar(30) not null,
	targy Varchar(30) not null,
    uzenet Varchar(400) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;;

CREATE USER '1912elore'@'localhost' IDENTIFIED BY '1912elore';
CREATE USER '1912elore'@'%' IDENTIFIED BY '1912elore';


GRANT SELECT, INSERT, DELETE ON emails TO '1912elore'@'localhost' IDENTIFIED BY '1912elore';
GRANT SELECT, INSERT, DELETE ON emails TO '1912elore'@'%' IDENTIFIED BY '1912elore';

GRANT SELECT, INSERT, DELETE ON users TO '1912elore'@'localhost' IDENTIFIED BY '1912elore';
GRANT SELECT, INSERT, DELETE ON users TO '1912elore'@'%' IDENTIFIED BY '1912elore';
