<?php
$dsn = "mysql:host=localhost;dbname=cadastro";
$dbuser = "root";
$dbpass = "";

try {
  $pdo = new PDO($dsn, $dbuser, $dbpass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro na conexão..: " . $e->getMessage());
}