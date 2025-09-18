<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
  header("Location: ../index.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  require_once "db_connection.php";

  $post_id = (int)$_POST['post_id'];
  $user_id = $_SESSION['user_id'];
  $content = trim($_POST['content']);

  if ($content !== "") {
    $query = "INSERT INTO comments(post_id, user_id, content) VALUES (?, ?, ?)";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("iis", $post_id, $user_id, $content);
    $prepare_query->execute();
    $prepare_query->close();

    # updating +1 comment_count
    $update_query = "UPDATE posts SET comment_count = comment_count + 1 WHERE id = ?";
    $prepare_query = $connection->prepare($update_query);
    $prepare_query->bind_param("i", $post_id);
    $prepare_query->execute();
    $prepare_query->close();
  }

  $connection->close();

  header("Location: ../view_post.php?id=" . $post_id);
  exit;
}
else {
  header("Location: ../error.php");
  exit;
}
?>