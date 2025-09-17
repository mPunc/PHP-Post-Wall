<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
  header("Location: ../index.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  require_once "db_connection.php";
  
  if (isset($_POST["id"]) && $_POST["user_id"] == $_SESSION["user_id"]) {
    $id = intval($_POST["id"]);
    
    $query = "DELETE FROM posts WHERE id = ?";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("i", $id);
    $prepare_query->execute();
    $connection->close();
    header("Location: ../my_profile.php");
    exit;
  }
  $connection->close();
  header("Location: ../index.php");
  exit;
}

?>
