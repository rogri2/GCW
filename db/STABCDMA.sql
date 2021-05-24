DROP DATABASE IF EXISTS STABCDMA;
CREATE DATABASE  IF NOT EXISTS STABCDMA;
USE STABCDMA;

DROP TABLE IF EXISTS Winners;

CREATE TABLE IF NOT EXISTS Winners(
	ID_Winners 	INT NOT NULL AUTO_INCREMENT,
    Usuario 	VARCHAR(20),
    Wins 		INT,
    CONSTRAINT PK_Winners PRIMARY KEY (ID_Winners)
);

DROP PROCEDURE IF EXISTS sp_Win;

DELIMITER //
CREATE PROCEDURE sp_Win(IN spUser varchar(20))
BEGIN
	DECLARE aux_user VARCHAR(20);
	
    SET aux_user = (SELECT Usuario FROM Winners WHERE Usuario = spUser);
    
    IF aux_user <> '' THEN
		UPDATE Winners SET Wins = Wins + 1 WHERE Usuario = spUser;
	ELSE
		INSERT INTO Winners SET Usuario = spUser, Wins = 1;
    END IF;
    
    
END; //
DELIMITER ;