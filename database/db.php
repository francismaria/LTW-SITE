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

        /**
         * @brief Gets the lists of a the user with user_id from the database
         * @param &user_id
         * @return mixed
         */

        public function getListsFromUserId($user_id) {
            global $dbh;
            $stmt = $this->database->prepare('SELECT * FROM todolists WHERE USER_ID = ?');
            $stmt->execute(array($user_id));
            return $stmt->fetch();
          }
    }

?>