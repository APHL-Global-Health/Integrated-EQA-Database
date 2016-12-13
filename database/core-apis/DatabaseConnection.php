<?php

namespace database\core\mysql;

use mysqli;

/**
*  DatabaseConnection class used to open a database connection to the server
*
* The Content Provider for the database associated
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*
*/
class DatabaseConnection {
	
	private $database_host;
	private $database_user;
	private $user_password;
	private $database_name;
	
	/**
	* Initializes everything
	*/
	public function __construct($database_host, $database_user, $user_password, $database_name) {
		$this->set_database_host($database_host);
		$this->set_database_user ($database_user);
		$this->set_user_password ( $user_password);
		$this->set_database_name ( $database_name);
	}
	
	/**
	* Open a database connection to the server
	*/
	public function open_database_connection() {
		return new mysqli ( 
				$this->get_database_host(),
				$this->get_database_user(),
				$this->get_user_password(),
				$this->get_database_name() 
		);
	}
	
	
	/**
	* @returns database host
	*/	
	public function get_database_host(){ return $this->database_host;}
	
	/**
	* @param database host
	* sets the database host 
	* @returns null
	*/
	public function set_database_host($database_host){
		$this->database_host = $database_host;
	}
	
	/**
	* @returns database user
	*/
	public function get_database_user(){return $this->database_user;}
	
	/**
	* @param database user
	* sets the database user 
	* @returns null
	*/
	public function set_database_user($database_user){$this->database_user = $database_user;}
	
	/**
	* @returns user password
	*/
	public function get_user_password(){return $this->user_password;}
	
	/**
	* @param user password
	* sets the user password
	* @returns null
	*/
	public function set_user_password($user_password){$this->user_password = $user_password;}
	
	
	/**
	* 
	* @return the database name
	*/
	public function get_database_name(){return $this->database_name;}
	
	/**
	* @param database name 
	* sets the database name
	* @returns null
	*/
	public function set_database_name($database_name){$this->database_name = $database_name;}
	
	public function __destruct() {
	
	}
}

?>
