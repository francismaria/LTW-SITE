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
	limit_year			INTEGER NOT NULL
);


CREATE TABLE listProjects (
  list_id 		INTEGER REFERENCES lists,
  project_id 	INTEGER REFERENCES projects,
  role	  		INTEGER NOT NULL,
  
  PRIMARY KEY (list_id, project_id)
);


CREATE TABLE taskLists (
  task_id INTEGER REFERENCES tasks,
  list_id INTEGER REFERENCES lists,
  
  PRIMARY KEY (task_id, list_id)
);


CREATE TABLE projectTaskUsers (
	project_id 	INTEGER REFERENCES projects,
	task_id 	INTEGER REFERENCES tasks,
	user_id 	INTEGER REFERENCES users,
	
	PRIMARY KEY (project_id, task_id, user_id)
);


/* Users -------------------------------------------------
/* administrators: role = 1
/* common users:   role = 3
/**/
INSERT INTO users VALUES(1, 3,'FrancisMaria','PasswordAs173','fran@hotmail.com','Francisco','Maria',16,'september',1998,'francisMaria.jpg');
INSERT INTO users VALUES(2, 1,'Pedro','12345','fran@hotmail.com','Pedro','Azevedo',16,'september',1998,NULL);
INSERT INTO users VALUES(3, 3, 'Bruno','54321', 'bruno@hotmal.com', 'Bruno', 'Miguel', 19, 'september', 1997, NULL);


/* Servers ------------------------------------------------
/**/
INSERT INTO servers(name, url) VALUES ('Pedro Azevedo', 'http://gnomo.fe.up.pt/~up201306026/ltw_helpoo');
INSERT INTO servers(name, url) VALUES ('Francisco Maria', 'http://gnomo.fe.up.pt/~up201306026/ltw');
INSERT INTO servers(name, url) VALUES ('Bruno Miguel', 'http://gnomo.fe.up.pt/~up201504781/LtwProjeto/Projeto');


/* Lists ----------------------------------------------
/**/
INSERT INTO lists VALUES(1, 'Ltw Project', 3);
INSERT INTO lists VALUES(2, 'Lcom Project', 3);
INSERT INTO lists VALUES(3, 'Aeda CI3', 3);
INSERT INTO lists VALUES(4, 'Rcom Report', 3);
INSERT INTO lists VALUES(5, 'Physics Exam', 3);
INSERT INTO lists VALUES(6, 'Rcom Exam', 3);

INSERT INTO lists VALUES(7, 'Ltw Project', 1);
INSERT INTO lists VALUES(8, 'Lcom Project', 1);
INSERT INTO lists VALUES(9, 'Aeda CI3', 1);
INSERT INTO lists VALUES(10, 'Rcom Report', 1);
INSERT INTO lists VALUES(11, 'Physics Exam', 1);
INSERT INTO lists VALUES(12, 'Rcom Exam', 1);

INSERT INTO lists VALUES(13, 'Algebra Test', 2);
INSERT INTO lists VALUES(14, 'Amat Test', 2);
INSERT INTO lists VALUES(15, 'Economy Test', 2);
INSERT INTO lists VALUES(16, 'Business Test', 2);


/* Tasks --------------------------------------------------
/**/
INSERT INTO tasks VALUES(1, 'Implement todolists page', 'Every User has several todo lists; there should be a page that will display them all', 0, 16, 12, 2017);
INSERT INTO tasks VALUES(2, 'Implement tasks page', 'Every todo list has several tasks; there should be a page that will display all the tasks of a list', 0, 20, 12, 2017);
INSERT INTO tasks VALUES(3, 'Implement Mouse and Keyboard Input', 'Platform should move using the keyboard and mouse', 0, 20, 12, 2017);
INSERT INTO tasks VALUES(4, 'Implement Colisions', 'Ball should come back after hiting a brick, a wall, or the platform', 0, 20, 12, 2017);
INSERT INTO tasks VALUES(5, 'Implement RTC', 'Implement the Rtc lab, cause we are gonna need the rtcs functions for the game over functionality', 0, 20, 12, 2017);
INSERT INTO tasks VALUES(6, 'Implement Game Over', 'Game should end after a minute or so', 0, 20, 12, 2017);
INSERT INTO tasks VALUES(7, 'Implement Css', 'Make css code to make the pages looks pretty', 0, 20, 12, 2017);
INSERT INTO tasks VALUES(8, 'Implement better php on the header', 'Make the header look like the one on the home page', 0, 25, 12, 2017);
INSERT INTO tasks VALUES(9, 'Fix the dumb hover bug', 'Theres a hover bug on the profile page that need fixing', 0, 30, 12, 2017);
INSERT INTO tasks VALUES(10, 'Make 2 practical exams', 'Practice for the practical part by doing 2 practical exams', 0, 3, 1, 2018);
INSERT INTO tasks VALUES(11, 'Make 4 theoretical exams', 'Practice for the practical part by doing 4 theoretical exams', 0, 19, 12, 2017);
INSERT INTO tasks VALUES(12, 'Make the experiences', 'Makes the 6 experiences', 0, 18, 12, 2017);
INSERT INTO tasks VALUES(13, 'Make the Ftp client', 'Implement the first part of the assignment', 0, 16, 12, 2017);
INSERT INTO tasks VALUES(14, 'Write the report', 'Write a report with the information from the part 1 and the experiences', 0, 21, 12, 2017);
INSERT INTO tasks VALUES(15, 'Study every chapter', 'Read the slides of the chapters', 0, 24, 12, 2017);
INSERT INTO tasks VALUES(16, 'Make exercises of every chapter', 'Practise with exercises', 0, 28, 12, 2017);
INSERT INTO tasks VALUES(17, 'Study all the pdfs', 'Read all the theoretical classes', 0, 20, 12, 2017);
INSERT INTO tasks VALUES(18, 'Make exercices of every content', 'Practise with exercises', 0, 26, 12, 2017);

INSERT INTO tasks VALUES(19, 'Study the slides', 'Read the slides', 0, 6, 1, 2018);
INSERT INTO tasks VALUES(20, 'Practise exercises', 'Do exercises', 0, 27, 12, 2017);
INSERT INTO tasks VALUES(21, 'Study the slides', 'Read the slides', 0, 6, 1, 2018);
INSERT INTO tasks VALUES(22, 'Practise exercises', 'Do exercises', 0, 27, 12, 2017);
INSERT INTO tasks VALUES(23, 'Study the slides', 'Read the slides', 0, 6, 1, 2018);
INSERT INTO tasks VALUES(24, 'Practise exercises', 'Do exercises', 0, 27, 12, 2017);
INSERT INTO tasks VALUES(25, 'Study the slides', 'Read the slides', 0, 6, 1, 2018);
INSERT INTO tasks VALUES(26, 'Practise exercises', 'Do exercises', 0, 27, 12, 2017);


/* TaskLists ----------------------------------------------
/**/
INSERT INTO taskLists VALUES(1, 1);
INSERT INTO taskLists VALUES(2, 1);

INSERT INTO taskLists VALUES(1, 7);
INSERT INTO taskLists VALUES(2, 7);

INSERT INTO taskLists VALUES(3, 2);
INSERT INTO taskLists VALUES(4, 2);
INSERT INTO taskLists VALUES(5, 2);
INSERT INTO taskLists VALUES(6, 2);

INSERT INTO taskLists VALUES(3, 8);
INSERT INTO taskLists VALUES(4, 8);
INSERT INTO taskLists VALUES(5, 8);
INSERT INTO taskLists VALUES(6, 8);

INSERT INTO taskLists VALUES(7, 1);
INSERT INTO taskLists VALUES(8, 1);
INSERT INTO taskLists VALUES(9, 1);

INSERT INTO taskLists VALUES(7, 7);
INSERT INTO taskLists VALUES(8, 7);
INSERT INTO taskLists VALUES(9, 7);

INSERT INTO taskLists VALUES(10, 3);
INSERT INTO taskLists VALUES(11, 3);

INSERT INTO taskLists VALUES(10, 9);
INSERT INTO taskLists VALUES(11, 9);

INSERT INTO taskLists VALUES(12, 4);
INSERT INTO taskLists VALUES(13, 4);
INSERT INTO taskLists VALUES(14, 4);

INSERT INTO taskLists VALUES(12, 10);
INSERT INTO taskLists VALUES(13, 10);
INSERT INTO taskLists VALUES(14, 10);

INSERT INTO taskLists VALUES(15, 5);
INSERT INTO taskLists VALUES(16, 5);

INSERT INTO taskLists VALUES(15, 11);
INSERT INTO taskLists VALUES(16, 11);

INSERT INTO taskLists VALUES(17, 6);
INSERT INTO taskLists VALUES(18, 6);

INSERT INTO taskLists VALUES(17, 12);
INSERT INTO taskLists VALUES(18, 12);


INSERT INTO taskLists VALUES(19, 13);
INSERT INTO taskLists VALUES(20, 13);

INSERT INTO taskLists VALUES(21, 14);
INSERT INTO taskLists VALUES(22, 14);

INSERT INTO taskLists VALUES(23, 15);
INSERT INTO taskLists VALUES(24, 15);

INSERT INTO taskLists VALUES(25, 16);
INSERT INTO taskLists VALUES(26, 16);


/* Projects -----------------------------------------------
/**/
INSERT INTO projects VALUES(1, 'Mieic', 3);
INSERT INTO projects VALUES(1, 'Mieic', 1);
INSERT INTO projects VALUES(2, 'Mieig', 2);


/* ListProjects -------------------------------------------
/**/
INSERT INTO listProjects VALUES(1, 1, 3);
INSERT INTO listProjects VALUES(2, 1, 3);
INSERT INTO listProjects VALUES(3, 1, 3);
INSERT INTO listProjects VALUES(4, 1, 3);
INSERT INTO listProjects VALUES(5, 1, 3);
INSERT INTO listProjects VALUES(6, 1, 3);
INSERT INTO listProjects VALUES(7, 1, 3);
INSERT INTO listProjects VALUES(8, 1, 3);
INSERT INTO listProjects VALUES(9, 1, 3);
INSERT INTO listProjects VALUES(10, 1, 3);
INSERT INTO listProjects VALUES(11, 1, 3);
INSERT INTO listProjects VALUES(12, 1, 3);

INSERT INTO listProjects VALUES(13, 2, 1);
INSERT INTO listProjects VALUES(14, 2, 1);
INSERT INTO listProjects VALUES(15, 2, 1);
INSERT INTO listProjects VALUES(16, 2, 1);


/* ProjectTaskUsers ---------------------------------------
/**/
INSERT INTO projectTaskUsers VALUES(1, 1, 3);
INSERT INTO projectTaskUsers VALUES(1, 2, 3);
INSERT INTO projectTaskUsers VALUES(1, 3, 3);
INSERT INTO projectTaskUsers VALUES(1, 4, 3);
INSERT INTO projectTaskUsers VALUES(1, 5, 1);
INSERT INTO projectTaskUsers VALUES(1, 6, 1);

INSERT INTO projectTaskUsers VALUES(1, 7, 1);
INSERT INTO projectTaskUsers VALUES(1, 8, 1);
INSERT INTO projectTaskUsers VALUES(1, 9, 1);
INSERT INTO projectTaskUsers VALUES(1, 10, 3);
INSERT INTO projectTaskUsers VALUES(1, 11, 1);
INSERT INTO projectTaskUsers VALUES(1, 12, 3);


INSERT INTO projectTaskUsers VALUES(1, 13, 1);
INSERT INTO projectTaskUsers VALUES(1, 14, 3);
INSERT INTO projectTaskUsers VALUES(1, 15, 1);
INSERT INTO projectTaskUsers VALUES(1, 16, 3);
INSERT INTO projectTaskUsers VALUES(1, 17, 1);
INSERT INTO projectTaskUsers VALUES(1, 18, 3);


INSERT INTO projectTaskUsers VALUES(2, 19, 2);
INSERT INTO projectTaskUsers VALUES(2, 20, 2);
INSERT INTO projectTaskUsers VALUES(2, 21, 2);
INSERT INTO projectTaskUsers VALUES(2, 22, 2);
INSERT INTO projectTaskUsers VALUES(2, 23, 2);
INSERT INTO projectTaskUsers VALUES(2, 24, 2);
INSERT INTO projectTaskUsers VALUES(2, 25, 2);
INSERT INTO projectTaskUsers VALUES(2, 26, 2);



COMMIT;
