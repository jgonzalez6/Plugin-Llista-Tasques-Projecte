#SCRIPT CREACIÓ BASE DE DADES PER PLUGIN DE TASQUES DEL WORDPRESS

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



#Inicialització de la taula tasques

INSERT INTO tasques(Codi,Texte)
  VALUES (1,"Recopil.lar informació sobre el software"),(2,"Recopil.lar informació sobre l'estructura del centre"),
         (3,"Recopil.lar informació sobre el servidor on s'instal.larà GLPI"),(4,"Efectuar instal.lació GLPI"),
         (5,"Comprovar instal.lació i rendiment"),(6,"Adaptar els serveis a les necessitats del centre"),
         (7,"Estudiar ús de plugins"),(8,"Implementar si s'escau plugins i noves funcionalitats"),
         (9,"Fer proves d'estabilitat"),(10,"Implementació del sistema en producció"),(11,"Seguiment de l'aplicació"),
         (12,"Documentació del projecte")