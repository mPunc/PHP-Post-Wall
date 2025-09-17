<?php
require_once "auth.php";
session_start();
requireAdmin();
require_once "db_connection.php";

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  $query = "DELETE FROM posts WHERE id = ?";
  $prepare_query = $connection->prepare($query);
  $prepare_query->bind_param("i", $id);
  $prepare_query->execute();
}

header("Location: ../admin_posts.php");
exit;

?>
