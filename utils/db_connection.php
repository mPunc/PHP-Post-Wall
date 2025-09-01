<?php
  $servernameDB = "localhost";
  $usernameDB = "root";
  $passwordDB = "";
  $databaseDB = "postwall";

  $connection = new mysqli($servernameDB, $usernameDB, $passwordDB, $databaseDB);

  if ($connection->connect_error) {
    header("Location: error.php");
    die();
  }
?>