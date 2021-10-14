# Customer-Database
CREATE DATABASE trip;
CREATE TABLE trip(
id int NOT NULL AUTO_INCREMENT,
firstname varchar(50) NOT NULL
lastname varchar(50) NOT NULL,
email varchar(50) NOT NULL,
status enum(Active,InActive) NOT NULL,
datetime DATETIME DEFAULT(CURRENT_TIMESTAMP)
);
