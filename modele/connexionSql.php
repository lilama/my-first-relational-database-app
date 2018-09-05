<?php
	
	$username = "root";
	$password = "root";
	
	try {
		$bdd = new PDO('mysql:host=localhost:8989;dbname=cogip;charset=utf8', $username, $password);	
	} catch (Exception $e) {
		die('Erreur: ' . $e->getMessage());
	}	
?>