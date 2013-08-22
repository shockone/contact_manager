<?php
echo 'Hello, world!';
$host = '127.0.0.1';
$dbname = 'db';
$port = 3307;
$user = 'priscila';
$password = 'wzpGsWHM';
$DBH = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);

foreach ($DBH->query('SHOW TABLES') as $row) {
	var_export($row);
}