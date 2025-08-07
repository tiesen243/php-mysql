<?php

$DB_NAME = $_ENV['DB_NAME'];
$DB_USER = $_ENV['DB_USER'];
$DB_PASSWORD = $_ENV['DB_PASSWORD'];
$DB_HOST = $_ENV['DB_HOST'] ?? '127.0.0.1';

try {
  $dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4";
  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];

  $db = new PDO($dsn, $DB_USER, $DB_PASSWORD, $options);
} catch (PDOException $e) {
  die('Database connection failed: ' . $e->getMessage());
}

return $db;
