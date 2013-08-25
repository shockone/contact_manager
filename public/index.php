<?php
define('ROOT_DIRECTORY', __DIR__);
echo ROOT_DIRECTORY;

$host = '127.0.0.1';
$dbName = 'db';
$port = 3306;
$user = 'priscila';
$password = 'wzpGsWHM';
$DBH = new PDO("mysql:host=$host;port=$port;dbname=$dbName", $user, $password);

foreach ($DBH->query('SHOW TABLES') as $row) {
    var_export($row);
}