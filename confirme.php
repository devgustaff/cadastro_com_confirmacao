<?php
require_once "config.php";

$cod = $_GET["cod"];

if (!empty($cod)) {
  $pdo->query("UPDATE usuario SET status = '1' WHERE MD5(id) = '$cod'");

  echo "Email confirmado com succeso.";
}