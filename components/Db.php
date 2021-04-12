<?php

class Db
{
//        private static $host = "localhost";
//        private static $dbname = "tasks_db";
//        private static $user = "root";
//        private static $password = "";

		public static function getConnection()
		{
			$paramsPath = ROOT . '/config/db_params.php';
			$params = include($paramsPath);

//            private static String $dsn = "mysql::" . $host . "=localhost;" . $dbname . "=tasks_db";
//            try {
//                $conn = new PDO($dsn, $user, $password);
//                // set the PDO error mode to exception
//                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                echo "Connected successfully";
//            } catch(PDOException $e) {
//                echo "Connection failed: " . $e->getMessage();
//            }
			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password']);

			return $db;
		}
}
