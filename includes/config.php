<?php
if (($_SERVER['SERVER_ADDR']) == '142.4.215.154')
	$HOST = 'localhost';
else
	$HOST = "142.4.215.154:3306";
	
    
	
	
	try {
		$db = new PDO("mysql:host=$HOST;dbname=c1eagleCircuitsDB;charset=utf8", 'c1eagleCircuits', '7wh0clQH');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
    
    $blogWordLimit = 200;
?>