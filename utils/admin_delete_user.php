<?php
require_once "auth.php";
session_start();
requireAdmin();
require_once "db_connection.php";

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  // Prevent deleting yourself or another admin
  $query = "SELECT role FROM users WHERE id = ?";
  $prepare_query = $connection->prepare($query);
  $prepare_query->bind_param("i", $id);
  $prepare_query->execute();
  $user = $prepare_query->get_result()->fetch_assoc();

  if ($user && $user['role'] !== 'admin' && $id !== $_SESSION['user_id']) {
    $query = "DELETE FROM users WHERE id = ?";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("i", $id);
    $prepare_query->execute();
  }
}

header("Location: ../admin_users.php");
exit;

?>
