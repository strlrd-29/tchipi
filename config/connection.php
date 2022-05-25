<?php
require_once 'dbconfig.php';

try {
    $connection = new PDO("mysql:host=$server;dbname=$db", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
};
