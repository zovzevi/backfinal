<?php
$user = 'u10000';
$pass = 'WERFef535t';

try {
    $db_conn = new PDO('mysql:host=localhost;dbname=u10000', $user, $pass,
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	
} catch (PDOException $e) {
	die($e->getMessage());
}