PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;


CREATE TABLE users (
	USER_ID  	INTEGER PRIMARY KEY AUTOINCREMENT,
	ROLE 		INTEGER,
	USERNAME 	VARCHAR(30) NOT NULL,
	PASSWORD 	VARCHAR(30) NOT NULL,
	EMAIL 		TEXT NOT NULL,
	FIRST_NAME	VARCHAR(30) NOT NULL,
	LAST_NAME 	VARCHAR(70) NOT NULL,
	BDAY		INTEGER NOT NULL,
	BMONTH		TEXT NOT NULL,
	BYEAR		INTEGER NOT NULL,
	IMG_NAME	TEXT
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

CREATE TABLE projects (
	project_id 		INTEGER PRIMARY KEY AUTOINCREMENT,
	project_name 	VARCHAR(50) NOT NULL,
	user_id 		INTEGER REFERENCES users
);

CREATE TABLE lists (
	list_id		INTEGER PRIMARY KEY AUTOINCREMENT,
	list_name	VARCHAR(30) NOT NULL,
	user_id		INTEGER REFERENCES users NOT NULL
);

CREATE TABLE tasks (
	task_id 			INTEGER PRIMARY KEY AUTOINCREMENT,
	task_name 			VARCHAR(50) NOT NULL,
	task_description	VARCHAR(500),
	task_completed		INTEGER NOT NULL, /*0 not completed 1 completed (false,true)*/
	limit_day			INTEGER NOT NULL,
	limit_month			INTEGER NOT NULL,
	limit_year			INTEGER NOT NULL,
);

CREATE TABLE listProject (
  list_id 		INTEGER REFERENCES lists,
  project_id 	INTEGER REFERENCES projects,
  role	  		INTEGER NOT NULL,
  
  PRIMARY KEY (list_id, project_id)
);

CREATE TABLE taskList (
  task_id INTEGER REFERENCES tasks,
  list_id INTEGER REFERENCES lists,
  
  PRIMARY KEY (task_id, list_id)
);

CREATE TABLE projectTaskUser (
	project_id 	INTEGER REFERENCES projects,
	task_id 	INTEGER REFERENCES tasks,
	user_id 	INTEGER REFERENCES users,
	
	PRIMARY KEY (project_id, task_id, user_id)
);
/* Users -------------------------------------------------
/* administrators: role = 1
/* common users:   role = 3
/**/
INSERT INTO users VALUES(1, 3,'francisMaria','PasswordAs173','fran@hotmail.com','Francisco','Maria',16,'september',1998,'francisMaria.jpg');
INSERT INTO users VALUES(2, 1,'pedro','12345','fran@hotmail.com','Pedro','Azevedo',16,'september',1998,NULL);
INSERT INTO users VALUES(3, 3, 'bruno','54321', 'bruno@hotmal.com', 'Bruno', 'Miguel', 19, 'september', 1997, NULL);


/* Servers ------------------------------------------------
/**/
INSERT INTO servers(name, url) VALUES ('Pedro Azevedo', 'http://gnomo.fe.up.pt/~up201306026/ltw_helpoo');
INSERT INTO servers(name, url) VALUES ('Francisco Maria', 'http://gnomo.fe.up.pt/~up201306026/ltw');
INSERT INTO servers(name, url) VALUES ('Bruno Miguel', 'http://gnomoo.fe.up.pt/~up201504781/LtwProjeto/Projeto')


/* Lists ----------------------------------------------
/**/
INSERT INTO lists VALUES(1, 'Ltw Project', 3);
INSERT INTO lists VALUES(2, 'Lcom Project', 3);


/* Tasks --------------------------------------------------
/**/
INSERT INTO tasks VALUES(1, 'Implement todolists page', 'Every User has several todo lists; there should be a page that will display them all', 0, 12, 12, 2017);
INSERT INTO tasks VALUES(2, 'Implement tasks page', 'Every todo list has several tasks; there should be a page that will display all the tasks of a list', 0, 12, 12, 2017);
INSERT INTO tasks VALUES(3, 'Implement Mouse and Keyboard Input', 'Platform should move using the keyboard and mouse', 0, 20, 12, 2017);


COMMIT;
