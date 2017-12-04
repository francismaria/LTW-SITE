<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
 
/**
 * Allows changes in a list to-do database.
 */

class Database {
  private $database;
  private $base_path;
  
  public function __construct($sqlite_file_path) {
    try {
		
		
      $this->base_path = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
      $this->base_path = preg_replace(array('/database\/db.php/', '/templates\/[a-zA-Z0-9_-]+.php/', '/[a-zA-Z0-9_-]+.php/'), array('', '', ''), $this->base_path);
      $this->database = new PDO('sqlite:' . $sqlite_file_path);
      $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection to database failed: ' . $e->getMessage();
    }   
  }
  
/**
* To Add To Database
*/
  public function add_user($username, $password, $email, $first_name, $last_name, $bday, $bmonth, $byear, $img_name) {
    $statement = $this->do_query('SELECT * FROM users WHERE USERNAME = ? OR EMAIL = ?', array($nickname, $email));
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
* To Get Information from Database
*/ 
  public function get_user_from_id($user_id) {
    $statement = $this->database->prepare('SELECT * FROM users WHERE USER_ID = ?');
    $statement->execute(array($user_id));
	return $statement->fetch();
  }
  
  public function get_user_from_credentials($user, $password) {
    $statement = $this->database->prepare('SELECT * FROM users WHERE USERNAME = ? AND PASSWORD = ?');
    $statement->execute(array($user, $password));
	return $statement->fetch();
  }
  
/**
* To Remove Information from Database
*/  
  public function remove_user($user_id) {
    $this->do_query('DELETE FROM users WHERE user_id = ?', array($user_id));
  }
  
/**
* Update Information from Database
*/ 

  public function update_user_password($user_id, $password) {
    $this->do_query('UPDATE users SET PASSWORD = ? WHERE USER_ID = ?', 
                    array($password, $user_id));
  }

}