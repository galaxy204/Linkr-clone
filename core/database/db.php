<?php 
require_once ('config.php');

function connect($config) 
{
	try {
		$conn = new PDO('mysql:host=' . $config['host'] . '; dbname=' . $config['dbname'],
						$config['user_name'],
						$config['password']);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;

	} catch (PDOException $e) {
		return false;
	}
}

function query($conn, $query, $bindings = NULL)
{
	try {
		$stmt = $conn->prepare($query);
		$stmt->execute($bindings);
		$results = $stmt->fetchAll();

		return ($results)
				? $results
				: false;

	} catch (PDOException $e) {
		return false;
	}
}