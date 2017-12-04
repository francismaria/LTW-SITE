PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;


CREATE TABLE users (
	USER_ID  	INTEGER PRIMARY KEY AUTOINCREMENT,
	USERNAME 	VARCHAR(30) NOT NULL,
	PASSWORD 	VARCHAR(30) NOT NULL,
	EMAIL 		TEXT NOT NULL,
	FIRST_NAME	VARCHAR(30) NOT NULL,
	LAST_NAME 	VARCHAR(70) NOT NULL,
	BDAY		INTEGER NOT NULL,
	BMONTH		TEXT NOT NULL,
	BYEAR		INTEGER NOT NULL,
	IMG_NAME	TEXT NOT NULL
);

CREATE TABLE servers (
  server_id INTEGER PRIMARY KEY AUTOINCREMENT,
  name      TEXT,
  url       TEXT
);

CREATE TABLE tags (
  tag_id  INTEGER PRIMARY KEY AUTOINCREMENT,
  value   TEXT
);

/* Users -------------------------------------------------
/**/
INSERT INTO users VALUES(1,'francisMaria','PasswordAs173','fran@hotmail.com','Francisco','Maria',16,'september',1998,'francisMaria.jpg');
INSERT INTO users VALUES(2,'pedro','12345','fran@hotmail.com','Francisco','Maria',16,'september',1998,'francisMaria.jpg');


/* Servers ------------------------------------------------
/**/
INSERT INTO servers(name, url) VALUES ('Pedro Azevedo', 'http://gnomo.fe.up.pt/~up201306026/ltw_helpoo');


COMMIT;
