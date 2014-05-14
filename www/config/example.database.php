<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

/**
 *	SQL Databases
 */
define("DB_PDO", true);
define("DB_DRIVER", "mysql");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PWD", "root");
define("DB_DATABASE", "accesos_unad_jap");
define("DB_PORT", 3306);
define("DB_PREFIX", "");
define("DB_SOCKET", "");;

/**
 *	SQLite Databases
 */
define("DB_SQLITE_FILENAME", "mydatabase.db");
define("DB_SQLITE_MODE", 0666);
	
/**
 *	NoSQL Databases
 */
define("DB_NOSQL_HOST", "localhost");
define("DB_NOSQL_PORT", 27017);
define("DB_NOSQL_USER", ""); 
define("DB_NOSQL_PWD", "");
define("DB_NOSQL_DATABASE", "");