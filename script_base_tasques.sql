#SCRIPT CREACI� BASE DE DADES PER PLUGIN DE TASQUES DEL WORDPRESS

DROP DATABASE IF EXISTS tasques;
CREATE DATABASE IF NOT EXISTS tasques;
CREATE USER IF NOT EXISTS 'user'@'localhost' IDENTIFIED BY 'aplicacions';
GRANT ALL PRIVILEGES ON cotxes . * TO 'user'@'localhost';
FLUSH PRIVILEGES;

USE tasques;
CREATE TABLE IF NOT EXISTS tasques (
  Codi                INT UNSIGNED AUTO_INCREMENT,
  Texte               VARCHAR(250) NOT NULL,
  
  CONSTRAINT PK_TASQUES PRIMARY KEY (Codi)
);



#Inicialitzaci� de la taula tasques

INSERT INTO tasques(Codi,Texte)
  VALUES (1,"Recopil.lar informaci� sobre el software"),(2,"Recopil.lar informaci� sobre l'estructura del centre"),
         (3,"Recopil.lar informaci� sobre el servidor on s'instal.lar� GLPI"),(4,"Efectuar instal.laci� GLPI"),
         (5,"Comprovar instal.laci� i rendiment"),(6,"Adaptar els serveis a les necessitats del centre"),
         (7,"Estudiar �s de plugins"),(8,"Implementar si s'escau plugins i noves funcionalitats"),
         (9,"Fer proves d'estabilitat"),(10,"Implementaci� del sistema en producci�"),(11,"Seguiment de l'aplicaci�"),
         (12,"Documentaci� del projecte")