<?php
  $db_host = "127.0.0.1";
  $db_name = "phpreview_exo3";
  $db_user = "root";
  $db_password = "root";

  try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
  }
?>