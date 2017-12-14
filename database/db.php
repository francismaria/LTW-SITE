<?php

    class Database {

        private $database;
        private $base_path;

        /**
         * @brief Database constructor.
         * @param $sqlite_file_path
         */
        public function __construct($sqlite_file_path) {
            try {
                $this->base_path = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
                $this->base_path = preg_replace(array('/database\/db.php/', '/templates\/[a-zA-Z0-9_-]+.php/', '/[a-zA-Z0-9_-]+.php/'), array('', '', ''), $this->base_path);

                $this->database = new PDO('sqlite:' . $sqlite_file_path);
                $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                echo 'Connection to database failed: ' . $e->getMessage();
            }
        }

        /**
         * @brief This member function add a new user to the database.
         * @param $username
         * @param $password
         * @param $email
         * @param $first_name
         * @param $last_name
         * @param $bday
         * @param $bmonth
         * @param $byear
         * @param $img_name
         */
        public function add_user($username, $password, $email, $first_name, $last_name, $bday, $bmonth, $byear, $img_name) {
            $statement = $this->do_query('SELECT * FROM users WHERE USERNAME = ? OR EMAIL = ?', array($username, $email));

            if (count($statement->fetchAll()) > 0) return;

            $this->database->beginTransaction();
            $this->database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $this->do_query('INSERT INTO users(USERNAME, PASSWORD, EMAIL, FIRST_NAME, LAST_NAME, BDAY, BMONTH, BYEAR, IMG_NAME) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)',
                array($username, $password, $email, $first_name, $last_name, $bday, $bmonth, $byear, $img_name));

            $user_id = $this->database->lastInsertId;

            $this->database->commit();
            return $user_id;
        }
		
		public function add_list($list_name, $user_id) {
            $statement = $this->database->prepare('INSERT INTO lists(list_name, user_id) VALUES (?,?)');
            $statement->execute(array($list_name, $user_id));
			$list_id = $this->database->lastInsertId();
			return $list_id;
        }
		
		public function add_task($task_name, $task_description, $list_id, $limit_day, $limit_month, $limit_year) {
            $statement = $this->database->prepare('INSERT INTO tasks(task_name, task_description, task_completed, limit_day, limit_month, limit_year) VALUES (?,?,?,?,?,?)');
            $task_completed = 0;
			$statement->execute(array($task_name, $task_description, $task_completed, $limit_day, $limit_month, $limit_year));
			$task_id = $this->database->lastInsertId();
			$statement = $this->database->prepare('INSERT INTO taskLists(task_id, list_id) VALUES (?,?)');
			$statement->execute(array($task_id, $list_id));
			return $task_id;
        }
		
		public function add_project($project_name, $user_id) {
            $statement = $this->database->prepare('INSERT INTO projects(project_name, user_id) VALUES (?,?)');
            $statement->execute(array($project_name, $user_id));
			$project_id = $this->database->lastInsertId();
			return $project_id;
        }
		
		public function add_list_to_project($list_id, $project_id) {
            $statement = $this->database->prepare('INSERT INTO listProjects(list_id, project_id, role) VALUES (?,?,?)');
			$role = "criador";
            $statement->execute(array($list_id, $project_id, $role));
        }
		
		public function add_user_to_task($project_id, $task_id, $user_id) {
            $statement = $this->database->prepare('INSERT INTO projectTaskUsers(project_id, task_id, user_id) VALUES (?,?,?)');
            $statement->execute(array($project_id, $task_id, $user_id));
        }
        /**
         * @brief Gets the user information from the database.
         * @param $user_id
         * @return mixed
         */
        public function get_user_from_id($user_id) {

            $statement = $this->database->prepare('SELECT * FROM users WHERE USER_ID = ?');
            $statement->execute(array($user_id));

            return $statement->fetch();
        }
		
		public function get_user_by_project_task_id($project_id, $task_id) {
			$statement = $this->database->prepare('SELECT * FROM projectTaskUsers WHERE project_id = ? AND task_id = ?');
            $statement->execute(array($project_id, $task_id));
            return $statement->fetch();
		}

        /**
         * @brief Gets user from its website credentials.
         * @param $user
         * @param $password
         * @return mixed
         */
        public function get_user_from_credentials($user, $password) {
            $statement = $this->database->prepare('SELECT * FROM users WHERE USERNAME = ? AND PASSWORD = ?');
            $statement->execute(array($user, $password));
            return $statement->fetch();
        }
		
		public function get_users() {
			$statement = $this->database->prepare('SELECT * FROM users');
			$statement->execute();
			return $statement->fetchAll();   
		  }
		  
		public function get_server_from_id($server_id) {
			$statement = $this->database->prepare('SELECT * FROM servers WHERE server_id = ?');
			$statement->execute(array($server_id));
			return $statement->fetch();
		}
  
		public function get_servers() {
			$statement = $this->database->prepare('SELECT * FROM servers');
			$statement->execute();
			return $statement->fetchAll();
		}
		
		public function get_projects_by_user_id($user_id) {
			$statement = $this->database->prepare('SELECT * FROM projects WHERE user_id = ?');
			$statement->execute(array($user_id));
			return $statement->fetchAll();
		}
		
		public function get_project_by_project_id($project_id) {
			$statement = $this->database->prepare('SELECT * FROM projects WHERE project_id = ?');
			$statement->execute(array($project_id));
			return $statement->fetch();
		}
		
		public function get_lists() {
			$statement = $this->database->prepare('SELECT * FROM lists');
			$statement->execute();
			return $statement->fetchAll();
		}
		
		public function get_list_id_from_list_name($list_name) {
			$statement = $this->database->prepare('SELECT * FROM lists WHERE list_name = ?');
			$statement->execute(array($list_name));
			return $statement->fetch();
		}
		
		public function get_lists_by_project_id($project_id) {
			$statement = $this->database->prepare('SELECT * FROM listProjects WHERE project_id = ?');
			$statement->execute(array($project_id));
			return $statement->fetchAll();
		}
		
		public function get_list_from_id($list_id) {
			$statement = $this->database->prepare('SELECT * FROM lists WHERE list_id = ?');
			$statement->execute(array($list_id));
			return $statement->fetch();
		}
		
		public function get_user_by_name($user_name) {
			$statement = $this->database->prepare('SELECT * FROM users WHERE USERNAME = ?');
			$statement->execute(array($user_name));
			return $statement->fetch();
		}
		
		public function get_tasks_from_user($user_id) {
			$statement = $this->database->prepare('SELECT * FROM projectTaskUsers WHERE user_id = ?');
			$statement->execute(array($user_id));
			return $statement->fetchAll();
		}
		
		public function get_project_id_from_project_name($project_name) {
			$statement = $this->database->prepare('SELECT * FROM projects WHERE project_name = ?');
			$statement->execute(array($project_name));
			return $statement->fetch();
		}
		/**
         * @brief Gets the tasks with a certain task_id from the database
         * @param &list_id
         * @return mixed
         */ 
		public function getTaskFromTaskId($task_id) 
        {   
            $statement = $this->database->prepare('SELECT * FROM tasks WHERE task_id= ?');
            $statement->execute(array($task_id));
            return $statement->fetch();
        }
        /**
         * @brief Removes user from the database.
         * @param $user_id
         */
        public function remove_user($user_id) {
            $statement = $this->database->prepare('DELETE FROM users WHERE USER_ID = ?');
			$statement->execute(array($user_id));
        }
		
		public function remove_server($server_id) {
			$statement = $this->database->prepare('DELETE FROM servers WHERE server_id = ?');
			$statement->execute(array($server_id));
		}
		
		public function remove_list($list_id) {
			$statement = $this->database->prepare('DELETE FROM lists WHERE list_id = ?');
			$statement->execute(array($list_id));
		}
		
		public function remove_task($task_id) {
			$statement = $this->database->prepare('DELETE FROM tasks WHERE task_id = ?');
			$statement->execute(array($task_id));
			$statement = $this->database->prepare('DELETE FROM taskLists WHERE task_id = ?');
			$statement->execute(array($task_id));
		}
		
		public function remove_project($project_id) {
			$statement = $this->database->prepare('DELETE FROM projects WHERE project_id = ?');
			$statement->execute(array($project_id));
		}
		
		public function remove_user_from_project($task_id, $project_id) {
			$statement = $this->database->prepare('DELETE FROM projectTaskUsers WHERE project_id = ? AND task_id = ?');
			$statement->execute(array($project_id,$task_id));
		}
        /**
         * @brief Updates user password.
         * @param $user_id
         * @param $password
         */
        public function update_user_password($user_id, $password) {
            $statement = $this->database->prepare('UPDATE users SET PASSWORD = ? WHERE USER_ID = ?');
            $statement->execute(array($password, $user_id));
        }

        /**
         * @brief Updates user information.
         * @param $username
         * @param $firstname
         * @param $lastname
         * @param $email
         */
        public function update_user_more($username, $firstname, $lastname, $email) {
            $statement = $this->database->prepare('UPDATE users SET FIRST_NAME = ?, LAST_NAME = ?, EMAIL = ? WHERE USERNAME = ?');
            $statement->execute(array($firstname, $lastname, $email, $username));
        }
		
		public function update_user_role($user_id, $role) {
			$statement = $this->database->prepare('UPDATE users SET ROLE = ? WHERE USER_ID = ?');
			$statement->execute(array($role, $user_id));
		}
		
		public function update_user_to_task($project_id, $task_id, $user_id) {
            $statement = $this->database->prepare('UPDATE projectTaskUsers SET user_id = ? WHERE project_id = ? AND task_id = ?');
            $statement->execute(array($user_id, $project_id, $task_id));
        }
        /**
         * @brief Gets the lists of a the user with user_id from the database
         * @param &user_id
         * @return mixed
         */

        public function getListsFromUserId($user_id) 
        {   
            //global $db;
            // echo $user_id;
            $statement = $this->database->prepare('SELECT * FROM lists WHERE user_id= ?');
            $statement->execute(array($user_id));
            return $statement->fetchAll();
        }


          /**
         * @brief Gets the taskLists with a certain list_id from the database
         * @param &list_id
         * @return mixed
         */
         
        public function getTasksListsFromListsId($list_id) 
        {
            $stmt = $this->database->prepare('SELECT * FROM taskLists WHERE list_id = ?');
            $stmt->execute(array($list_id));
            return $stmt->fetchAll();
        } 


        

    }

?>